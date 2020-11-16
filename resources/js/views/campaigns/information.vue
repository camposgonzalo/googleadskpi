<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Información de la Campaña
                    </h4>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Nombre de la Campaña : {{ record.name }}
                        </p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">{{ record.url }}</p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Contacto :{{ record.phone }}
                        </p>
                    </div>

                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Objetivo de la campaña: {{ record.objective }}
                        </p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Modo: {{ record.mode }}
                        </p>
                    </div>
                    <br />
                    <br />
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Servicio Facturado
                        </p>
                    </div>
                    <!--end /div-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <div class="col-lg-12" v-if="currentUser.role == 'admin'">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Información de la Campaña para Administrador
                    </h4>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Presupuesto :
                            {{
                                record.type == "Libre"
                                    ? record.total_cost * 1.1
                                    : record.total_cost * 9.9
                            }}
                        </p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Diario :
                            {{
                                record.mode == "Administrado"
                                    ? record.daily_cost / 1.5
                                    : record.daily_cost
                            }}
                        </p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Modo {{ record.mode }}
                        </p>
                    </div>

                    <div class="media-body align-self-center">
                        <div class="col-md-6">
                            <el-input v-model="record.account_id"
                                ><template slot="prepend"
                                    >ID de cuenta</template
                                ></el-input
                            >
                        </div>
                    </div>
                    <br />
                    <div class="media-body align-self-center">
                        <div class="col-md-6">
                            <el-input v-model="record.campaign_id"
                                ><template slot="prepend"
                                    >ID de campaña</template
                                ></el-input
                            >
                        </div>
                    </div>
                    <br />
                    <div class="media-body align-self-center">
                        <div class="col-md-6">
                            <el-input v-model="record.group_id"
                                ><template slot="prepend"
                                    >ID de grupo</template
                                ></el-input
                            >
                        </div>
                    </div>
                    <br />
                    <div class="media-body align-self-center">
                        <div class="col-md-6">
                            <el-input v-model="record.account_name"
                                ><template slot="prepend"
                                    >Nombre de cuenta</template
                                ></el-input
                            >
                        </div>
                    </div>
                    <br />
                    <div class="media-body align-self-center">
                        <div class="col-md-6">
                            <el-input v-model="record.campaign_name"
                                ><template slot="prepend"
                                    >Nombre de campaña</template
                                ></el-input
                            >
                        </div>
                    </div>
                    <br />
                    <div class="media-body align-self-center">
                        <div class="col-md-6">
                            <el-input v-model="record.group_name"
                                ><template slot="prepend"
                                    >Nombre de grupo</template
                                ></el-input
                            >
                        </div>
                    </div>
                    <!--end /div-->
                    <el-button
                        class="float-left"
                        style="margin-top: 12px;"
                        @click="update()"
                        >Actualizar</el-button
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
    props: ["campaignId", "currentUser"],
    data() {
        return {
            resource: "ads-campaign",
            record: {}
        };
    },
    created() {
        this.getRecord();
    },
    methods: {
        getRecord() {
            this.$http
                .get(`/${this.resource}/record/${this.campaignId}`)
                .then(response => {
                    this.record = response.data;
                });
        },
        update() {
            this.$http.post(`/${this.resource}`, this.record).then(response => {
                this.$message({
                    message: response.data.message,
                    type: "success"
                });
            });
        }
    }
};
</script>
