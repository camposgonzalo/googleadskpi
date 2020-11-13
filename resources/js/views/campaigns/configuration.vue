<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <Configuration
                            v-bind:locations="locations"
                            v-bind:schedules="schedules"
                            v-bind:form="form"
                        ></Configuration>
                        <el-button
                            class="float-left"
                            style="margin-top: 12px;"
                            @click="cancel()"
                            >Cancelar</el-button
                        >
                        <el-button
                            class="float-right"
                            style="margin-top: 12px;"
                            @click="update"
                            >Actualizar configuración</el-button
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const Configuration = () =>
    import("../../components/CampaignConfigurationComponent");
export default {
    props: ["campaignId"],
    components: {
        Configuration
    },
    data() {
        return {
            resource: "ads-campaign",
            locations: [],
            schedules: [],
            form: {},
            formRequest: {
                type: "Modificar",
                level: "Campaña",
                state: "Pendiente"
            }
        };
    },
    created() {
        this.getRecord();
    },
    methods: {
        update() {
            this.form.locations = JSON.stringify(this.locations);
            this.form.ad_schedule = JSON.stringify(this.schedules);
            this.formRequest.request = JSON.stringify(this.form);
            this.saveRequest();
        },
        saveRequest() {
            this.$http
                .post(`/ads-request`, this.formRequest)
                .then(response => {
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                })
                .catch(error => {
                    this.$message.error("Sucedió un error.");
                });
        },
        getRecord() {
            this.$http
                .get(`/${this.resource}/record/${this.campaignId}`)
                .then(response => {
                    this.formRequest.campaign_id = response.data.id;
                    this.initData(response.data);
                });
        },
        initData(record) {
            this.form = record;
            this.schedules = JSON.parse(record.ad_schedule);
            this.locations = JSON.parse(record.locations);
        },
        cancel() {
            window.location.href = `/${this.resource}`;
        }
    }
};
</script>
