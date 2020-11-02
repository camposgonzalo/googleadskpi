<template>
    <div>
        <Form v-if="modalForm" v-on:cerrar="modalForm = !modalForm"></Form>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">
                            Resumen de facturación
                        </h4>
                        <div class="table-responsive browser_users">
                            <div v-if="role == 'admin'">
                                Buscar:
                                <el-select
                                    v-model="userSearch"
                                    filterable
                                    remote
                                    reserve-keyword
                                    clearable=""
                                    placeholder="Usuario"
                                    :remote-method="remoteMethod"
                                    :loading="loading"
                                    @change="filterTable"
                                >
                                    <el-option
                                        v-for="item in filterUsers"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value"
                                    >
                                    </el-option>
                                </el-select>
                                <el-button
                                    class="float-right"
                                    style="margin-top: 12px;"
                                    @click="modalForm = !modalForm"
                                    >Crear cargos o Abonos</el-button
                                >
                            </div>
                            <div v-if="role == 'user'">
                                <el-button
                                    class="float-right"
                                    style="margin-top: 12px;"
                                    >Realizar nuevo pago</el-button
                                >
                            </div>
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Periodo</th>
                                        <th class="border-top-0">Abonos</th>
                                        <th class="border-top-0">Cargos</th>
                                        <th class="border-top-0">Balance</th>
                                        <th
                                            v-if="role == 'admin'"
                                            class="border-top-0"
                                        >
                                            Usuarios
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(row, index) in filterRecords"
                                        :key="index + 'R'"
                                    >
                                        <td>
                                            {{ row.periodo }}
                                        </td>
                                        <td>{{ row.abono }}</td>
                                        <td>{{ row.cargo }}</td>
                                        <td>{{ row.cargo - row.abono }}</td>
                                        <td v-if="role == 'admin'">
                                            {{ row.user.name }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const Form = () => import("./form");
export default {
    props: ["currentUser"],
    components: {
        Form
    },
    data() {
        return {
            resource: "ads-billing",
            modalForm: false,
            filterRecords: [],
            records: [],
            users: [],
            filterUsers: [],
            userSearch: "",
            loading: false,
            role: this.currentUser.role
        };
    },
    created() {
        this.getRecords();
    },
    methods: {
        getRecords() {
            if (this.role == "admin") {
                this.$http
                    .get(`/${this.resource}/records/group/users`)
                    .then(response => {
                        Object.values(response.data).map(r => {
                            this.records = this.records.concat(
                                this.formatData(r)
                            );
                            this.filterRecords = this.records;
                        });
                    });
                this.$http.get(`/ads-user/records`).then(response => {
                    this.users = response.data.map(r => {
                        r.value = r.name;
                        return r;
                    });
                    this.filterUsers = this.users;
                });
            } else
                this.$http
                    .get(
                        `/${this.resource}/user/${this.currentUser.id}/records`
                    )
                    .then(response => {
                        this.records = this.formatData(response.data);
                        this.filterRecords = this.records;
                    });
        },
        formatData(records) {
            let dict = {};
            records.map(r => {
                let periodo = r.created_at.split(" ")[0];
                if (!dict[periodo])
                    dict[periodo] = {
                        periodo: periodo,
                        abono: 0,
                        cargo: 0,
                        user: r.user
                    };
                if (r.type == "Pago" || r.type == "Credito")
                    dict[periodo].abono += r.amount;
                else if (r.type == "Asesoria") dict[periodo].cargo += r.amount;
            });
            return Object.values(dict);
        },
        cerrar() {
            this.modalForm = false;
            this.getRecords();
        },
        filterTable() {
            this.filterRecords = this.records;
            if (this.userSearch != "")
                this.filterRecords = this.filterRecords.filter(
                    record => record.user.name == this.userSearch
                );
        },
        remoteMethod(query) {
            if (query !== "") {
                this.loading = true;
                setTimeout(() => {
                    this.loading = false;
                    this.filterUsers = this.users.filter(item => {
                        return (
                            item.name
                                .toLowerCase()
                                .indexOf(query.toLowerCase()) > -1
                        );
                    });
                }, 200);
            } else {
                this.filterUsers = [];
            }
        }
    }
};
</script>
