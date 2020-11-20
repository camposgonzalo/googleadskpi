<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Editar Solicitud
                    </h4>
                    <el-card class="box-card" v-if="active == 'Anuncio'">
                        <AdRequestComponent
                            v-bind:currentUser="request.user"
                            v-bind:form="form"
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                        ></AdRequestComponent>
                    </el-card>
                    <!-- step2    -->
                    <el-card class="box-card" v-if="active == 'Palabra Clave'">
                        <KeywordRequestComponent
                            v-bind:currentUser="request.user"
                            v-bind:form="form"
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                            v-bind:type="'Clave'"
                        ></KeywordRequestComponent>
                    </el-card>
                    <!-- step3   -->
                    <el-card
                        class="box-card"
                        v-if="active == 'Palabra Negativa'"
                    >
                        <KeywordRequestComponent
                            v-bind:currentUser="request.user"
                            v-bind:form="form"
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                            v-bind:type="'Negativa'"
                        ></KeywordRequestComponent>
                    </el-card>
                    <el-card class="box-card" v-if="active == 'Campaña'">
                        <Configuration
                            v-bind:locations="locations"
                            v-bind:schedules="schedules"
                            v-bind:form="form"
                            v-bind:showGoogleId="showGoogleId"
                        ></Configuration>
                    </el-card>
                    <div>
                        <el-button
                            class="float-left"
                            style="margin-top: 12px;"
                            @click="cancel()"
                            >Cancelar</el-button
                        >
                        <div v-if="request.state == 'Borrador'">
                            <el-button
                                class="float-right"
                                style="margin-top: 12px;"
                                @click="savePending"
                                >Enviar solicitud</el-button
                            >
                            <el-button
                                class="float-right"
                                style="margin-top: 12px;"
                                @click="saveDraft"
                                >Guardar como borrador</el-button
                            >
                        </div>
                        <div
                            v-if="
                                request.state == 'Pendiente' &&
                                    this.currentUser.role == 'admin'
                            "
                        >
                            <el-button
                                class="float-right"
                                style="margin-top: 12px;"
                                @click="updateRequest('Rechazado')"
                                >Rechazar</el-button
                            >
                            <el-button
                                class="float-right"
                                style="margin-top: 12px;"
                                @click="updateRequest('Aprobado')"
                                :disabled="
                                    this.active == 'Campaña'
                                        ? form.campaign_id == null
                                        : false
                                "
                                >Aprobar</el-button
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const AdRequestComponent = () => import("../../components/AdRequestComponent");
const KeywordRequestComponent = () =>
    import("../../components/KeywordRequestComponent");
const Configuration = () =>
    import("../../components/CampaignConfigurationComponent");
export default {
    props: ["requestId", "currentUser"],
    components: {
        AdRequestComponent,
        KeywordRequestComponent,
        Configuration
    },
    data() {
        return {
            groups: [],
            campaigns: [],
            resource: "ads-request",
            record: {},
            errors: {},
            active: "Anuncio",
            levels: ["Campaña", "Anuncio", "Palabra Clave", "Palabra Negativa"],
            request: {},
            schedules: [],
            locations: [],
            form: {},
            showGoogleId: false
        };
    },
    created() {
        this.getRecord();
        this.getRecords();
    },
    methods: {
        getRecord() {
            this.$http
                .get(`/${this.resource}/record/${this.requestId}`)
                .then(response => {
                    this.request = response.data;
                    this.active = response.data.level;
                    if (this.active == "Campaña") this.initCampaignData();
                    else if (this.active == "Anuncio") this.initAdData();
                    else this.initKeyWord();
                });
        },
        getRecords() {
            this.$http.get(`/${this.resource}/groups`).then(response => {
                response.data.data.map(r => this.groups.push(r.name));
            });
            if (this.currentUser.role == "admin") {
                this.$http.get(`/ads-campaign/local/records`).then(response => {
                    response.data.map(r => this.campaigns.push(r.name));
                });
            } else
                this.$http
                    .get(
                        `/ads-campaign/local/user/${this.currentUser.id}/records`
                    )
                    .then(response => {
                        response.data.map(r => this.campaigns.push(r.name));
                    });
        },
        initCampaignData() {
            if (this.request.type == "Crear") this.showGoogleId = true;
            this.form = this.request.campaign;
            this.form.locations = JSON.parse(this.form.locations);
            this.schedules = JSON.parse(this.request.campaign.ad_schedule);
            this.locations = JSON.parse(this.request.campaign.locations);
        },
        initAdData() {
            if (this.request.state == "Borrador")
                this.form = JSON.parse(this.request.request);
            else if (this.request.state == "Pendiente")
                this.form = this.request.ad;
            else this.form = this.request.ad;
        },
        initKeyWord() {
            if (this.request.state == "Borrador") {
                this.form = JSON.parse(this.request.request);
                this.form.keyword = JSON.parse(this.form.keyword);
            } else if (this.request.state == "Pendiente") {
                this.form = this.request.keyword;
                this.form.keyword = JSON.parse(this.form.keyword);
            } else {
                this.form = this.request.keyword;
                this.form.keyword = JSON.parse(this.form.keyword);
            }
        },
        updateRequest(state) {
            this.request.state = state;
            switch (this.active) {
                case "Campaña":
                    this.saveCampaign();
                    break;
                case "Anuncio":
                    this.saveAd();
                    break;
                case "Palabra Clave":
                    this.saveKeyword();
                    break;
                case "Palabra Negativa":
                    this.saveKeyword();
                    break;
            }
        },
        saveDraft() {
            this.request.state = "Borrador";
            this.request.request = JSON.stringify(this.form);
            this.saveRequest();
        },
        savePending() {
            this.request.state = "Pendiente";
            if (this.active == "Anuncio") this.saveAd();
            else this.saveKeyword();
        },
        saveKeyword(type) {
            this.form.type = this.active.split(" ")[1];
            this.form.keyword = JSON.stringify(this.form.keyword);
            this.request.request = JSON.stringify(this.form);
            this.$http
                .post(`/${this.resource}/keyword`, this.form)
                .then(response => {
                    this.request.keyword_id = response.data.record.id;
                    this.form.keyword = JSON.parse(this.form.keyword);
                    this.saveRequest();
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.$message.error("Sucedió un error.");
                });
        },
        saveCampaign() {
            if (this.request.state == "Aprobado") this.form.active = true;
            this.$http
                .post(`/ads-campaign`, this.form)
                .then(response => {
                    this.saveRequest();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.$message.error("Sucedió un error.");
                });
        },
        saveAd() {
            this.$http
                .post(`/${this.resource}/ad`, this.form)
                .then(response => {
                    this.request.ad_id = response.data.record.id;
                    this.saveRequest();
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.$message.error("Sucedió un error.");
                });
        },
        saveRequest() {
            this.$http
                .post(`/${this.resource}`, this.request)
                .then(response => {
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                    this.cancel();
                })
                .catch(error => {
                    this.$message.error("Sucedió un error.");
                });
        },
        cancel() {
            window.location.href = `/${this.resource}`;
        }
    }
};
</script>
