<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Solicitudes
                    </h4>
                    <div v-if="currentUser.role == 'admin'">
                        Cliente
                        <el-select
                            v-model="user"
                            @change="setUser"
                            :placeholder="userPlaceHolder"
                        >
                            <el-option
                                v-for="option in users"
                                v-bind:key="option.id"
                                :value="option"
                                >{{ option.name }}</el-option
                            >
                        </el-select>
                    </div>
                    <br />
                    <div v-if="loading" class="loader"></div>
                    <div v-if="!loading" class="table-responsive browser_users">
                        Filtrar
                        <el-select
                            v-model="state"
                            cleareable
                            @change="filterTable"
                            clearable
                            placeholder="Estado"
                        >
                            <el-option
                                v-for="(option, index) in states"
                                v-bind:key="index"
                                :value="option"
                                >{{ option }}</el-option
                            >
                        </el-select>
                        <el-select
                            v-model="type"
                            @change="filterTable"
                            clearable
                            placeholder="Tipo"
                        >
                            <el-option
                                v-for="(option, index) in types"
                                v-bind:key="index"
                                :value="option"
                                >{{ option }}</el-option
                            >
                        </el-select>
                        <el-select
                            v-model="level"
                            @change="filterTable"
                            clearable
                            placeholder="Nivel"
                        >
                            <el-option
                                v-for="(option, index) in levels"
                                v-bind:key="index"
                                :value="option"
                                >{{ option }}</el-option
                            >
                        </el-select>
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th
                                        class="border-top-0"
                                        v-for="(th, index) in headers"
                                        v-bind:key="index"
                                    >
                                        {{ th }}
                                    </th>
                                </tr>
                                <!--end tr-->
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(row, index) in filterRecords"
                                    :key="index + 'R'"
                                >
                                    <td>
                                        <el-popover
                                            placement="right"
                                            width="200"
                                            trigger="click"
                                        >
                                            <el-row>
                                                <a
                                                    :href="
                                                        `/ads-request/edit/${row.id}`
                                                    "
                                                    size="mini"
                                                    plain
                                                    >- Ver</a
                                                >
                                            </el-row>
                                            <el-row
                                                v-if="
                                                    currentUser.role ==
                                                        'admin' ||
                                                        (currentUser.role ==
                                                            'user' &&
                                                            row.state !=
                                                                'Aprobado')
                                                "
                                            >
                                                <a
                                                    :href="
                                                        `/ads-request/edit/${row.id}`
                                                    "
                                                    size="mini"
                                                    plain
                                                    >- Editar</a
                                                >
                                            </el-row>
                                            <el-row
                                                v-if="
                                                    currentUser.role ==
                                                        'admin' ||
                                                        (currentUser.role ==
                                                            'user' &&
                                                            row.state ==
                                                                'Borrador')
                                                "
                                            >
                                                <a size="mini" plain
                                                    >- Eliminar</a
                                                >
                                            </el-row>

                                            <el-button
                                                size="mini"
                                                slot="reference"
                                                icon="el-icon-menu"
                                                circle
                                            ></el-button>
                                        </el-popover>
                                        {{ row.state }}
                                    </td>
                                    <td>
                                        {{ row.type }}
                                    </td>
                                    <td>{{ row.level }}</td>
                                    <td>{{ row.created_at }}</td>
                                    <td v-if="currentUser.role == 'admin'">
                                        {{ row.user.name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                    <!--end /div-->
                    <br />
                    <a
                        href="/ads-request/create/Anuncio"
                        class="btn btn-sm btn-gradient-primary float-right"
                        onclick="update()"
                        >Crear Nueva Solicitud</a
                    >
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
</template>

<script>
export default {
    props: ["currentUser"],
    data() {
        return {
            loading: false,
            resource: "ads-request",
            records: [],
            filterRecords: [],
            value1: true,
            states: ["Borrador", "Pendiente", "Aprobado", "Rechazado"],
            headers: ["Estado", "Tipo", "Nivel", "Fecha"],
            types: ["Crear", "Modifcar"],
            levels: ["Campaña", "Anuncio", "Palabra Clave", "Palabra Negativa"],
            state: "",
            type: "",
            level: "",
            users: [],
            user: null
        };
    },
    created() {
        if (this.currentUser.role == "user") this.getRecords();
        else this.getUsers();
        if (this.currentUser.role == "admin") this.headers.push("Usuario");
    },
    methods: {
        setUser() {
            this.$http
                .get(
                    `ads-user/${this.currentUser.id}/set/account_id/${this.user.account_id}`
                )
                .then(response => {
                    this.userPlaceHolder = this.user.name;
                    this.getRecords();
                });

            // this.$http
            //     .get(`/ads-config/clientCustomerId/set/${this.user.id}`)
            //     .then(response => {
            //         this.loading = true;
            //         this.userPlaceHolder = this.user.name;
            //         this.getRecords();
            //     });
            // this.getRecords();
        },
        getUsers() {
            this.$http.get(`/ads-user/users`).then(response => {
                this.users = response.data;
            });
        },
        getRecords() {
            // let url = `/${this.resource}/records`;
            this.loading = true;
            let url = `/${this.resource}/user/${this.currentUser.id}/records`;
            if (this.currentUser.role == "admin")
                url = `/${this.resource}/user/${this.user.id}/records`;
            this.$http.get(url).then(response => {
                this.records = response.data;
                this.filterRecords = response.data;
                this.loading = false;
            });
        },
        viewInformation(id) {
            location.href;
        },
        filterTable() {
            this.filterRecords = this.records;
            if (this.state != "")
                this.filterRecords = this.filterRecords.filter(
                    record => record.state == this.state
                );
            if (this.type != "")
                this.filterRecords = this.filterRecords.filter(
                    record => record.type == this.type
                );
            if (this.level != "")
                this.filterRecords = this.filterRecords.filter(
                    record => record.level == this.level
                );
        }
    }
};
</script>
