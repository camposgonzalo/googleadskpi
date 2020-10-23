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
                            class="float-right"
                            style="margin-top: 12px;"
                            @click="update"
                            >Actualizar confguración</el-button
                        >
                    </div>

                    <!--end /div-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
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
            record: {},
            locations: [],
            schedules: [
                { day: "Lunes", start: 0, end: 0, selected: false },
                { day: "Martes", start: 0, end: 0, selected: false },
                { day: "Miercoles", start: 0, end: 0, selected: false },
                { day: "Jueves", start: 0, end: 0, selected: false },
                { day: "Viernes", start: 0, end: 0, selected: false },
                { day: "Sabado", start: 0, end: 0, selected: false },
                { day: "Domingo", start: 0, end: 0, selected: false }
            ],
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
            this.saveRequest();
        },
        save() {
            this.$http
                .post(`/${this.resource}`, this.form)
                .then(response => {
                    this.saveRequest();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.$message.error("Sucedió un error.");
                });
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
                    this.record = response.data;
                    this.formRequest.campaign_id = response.data.id;
                    this.initData();
                });
        },
        initData() {
            this.form = this.record;
            this.schedules = JSON.parse(this.record.ad_schedule);
            this.locations = JSON.parse(this.record.locations);
        }
    }
};
</script>
