<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Campañas disponibles
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
                    <div v-if="loading" class="loader"></div>
                    <div v-if="!loading" class="table-responsive browser_users">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">Estado</th>
                                    <th class="border-top-0">Nombre</th>
                                    <th class="border-top-0">Consumo</th>
                                    <th class="border-top-0">Clics</th>
                                    <th class="border-top-0">Impresiones</th>
                                    <th class="border-top-0">CTR</th>
                                    <th
                                        v-if="currentUser.role == 'admin'"
                                        class="border-top-0"
                                    >
                                        Usuario
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(row, index) in records"
                                    :key="index + 'R'"
                                >
                                    <td>
                                        <el-switch v-model="row.active">
                                        </el-switch>
                                    </td>
                                    <td>
                                        {{ row.name }}
                                        <el-popover
                                            placement="right"
                                            width="200"
                                            trigger="click"
                                        >
                                            <el-row>
                                                <a
                                                    :href="
                                                        `/ads-campaign/details/${row.campaign_id}`
                                                    "
                                                    size="mini"
                                                    plain
                                                    >- Ver reporte</a
                                                >
                                            </el-row>

                                            <el-row>
                                                <a
                                                    :href="
                                                        `/ads-campaign/configuration/${row.campaign_id}`
                                                    "
                                                    size="mini"
                                                    plain
                                                    >- Editar configuracion</a
                                                >
                                            </el-row>
                                            <el-row v-if="row.active">
                                                <a
                                                    @click="deactivate(row)"
                                                    size="mini"
                                                    plain
                                                    >- pausar</a
                                                >
                                            </el-row>
                                            <el-row v-if="!row.active">
                                                <a
                                                    @click="activate(row)"
                                                    size="mini"
                                                    plain
                                                    >- activar</a
                                                >
                                            </el-row>
                                            <el-button
                                                size="mini"
                                                slot="reference"
                                                icon="el-icon-menu"
                                                circle
                                            ></el-button>
                                        </el-popover>
                                    </td>
                                    <td>
                                        {{ row.currency }}
                                        {{
                                            row.mode == "Administrado"
                                                ? row.cost * 1.5 * 3.5
                                                : row.cost * 3.5
                                        }}
                                    </td>
                                    <td>{{ row.clicks }}</td>
                                    <td>{{ row.impressions }}</td>
                                    <td>{{ row.ctr }}</td>
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
                        href="/ads-campaign/create"
                        class="btn btn-sm btn-gradient-primary float-right"
                        onclick="update()"
                        >Nueva Campaña</a
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
            resource: "ads-campaign",
            records: [],
            users: [],
            user: null,
            userPlaceHolder: "Seleccionar Cliente"
        };
    },
    created() {
        if (this.currentUser.role == "user") this.getRecords();
        else this.getUsers();
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
                this.records = response.data.data;
                this.loading = false;
            });
        },
        viewInformation(id) {
            location.href;
        },
        activate(row) {
            this.$http
                .get(`/${this.resource}/${row.id}/activate`)
                .then(response => {
                    row.active = true;
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                })
                .catch(error => {
                    this.$message.error("Sucedió un error.");
                });
        },
        deactivate(row) {
            this.$http
                .get(`/${this.resource}/${row.id}/deactivate`)
                .then(response => {
                    row.active = false;
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                })
                .catch(error => {
                    this.$message.error("Sucedió un error.");
                });
        }
    }
};
</script>
