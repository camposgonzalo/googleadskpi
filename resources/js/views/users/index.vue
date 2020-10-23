<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Usuarios
                    </h4>
                    <div class="table-responsive browser_users">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">Estado</th>
                                    <th class="border-top-0">Usuario</th>
                                    <th class="border-top-0">Correo</th>
                                    <th class="border-top-0">Telefono</th>
                                    <th class="border-top-0">Editar</th>
                                </tr>
                                <!--end tr-->
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(row, index) in records"
                                    :key="index + 'R'"
                                >
                                    <td>
                                        <el-switch v-model="row.state">
                                        </el-switch>
                                    </td>
                                    <td>
                                        {{ row.name }}
                                    </td>
                                    <td>{{ row.email }}</td>
                                    <td>{{ row.phone }}</td>
                                    <td>
                                        <el-popover
                                            placement="right"
                                            width="200"
                                            trigger="click"
                                        >
                                            <el-row>
                                                <a size="mini" plain
                                                    >- editar</a
                                                >
                                            </el-row>
                                            <el-row>
                                                <a size="mini" plain
                                                    >- desactivar</a
                                                >
                                            </el-row>
                                            <el-row>
                                                <a size="mini" plain
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
    props: {},
    data() {
        return {
            resource: "ads-user",
            records: [],
            value1: true
        };
    },
    created() {
        this.getRecords();
    },
    methods: {
        getRecords() {
            this.$http.get(`/${this.resource}/records`).then(response => {
                this.records = response.data;
                console.log(response.data);
            });
        },
        viewInformation(id) {
            location.href;
        }
    }
};
</script>
