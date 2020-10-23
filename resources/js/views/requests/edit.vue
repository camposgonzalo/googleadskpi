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
                            v-bind:request="request"
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                        ></AdRequestComponent>
                    </el-card>
                    <!-- step2    -->
                    <el-card class="box-card" v-if="active == 'Palabra Clave'">
                        <KeywordRequestComponent
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
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                            v-bind:type="'Negativa'"
                        ></KeywordRequestComponent>
                    </el-card>

                    <!--end /div-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
    </div>
</template>

<script>
const AdRequestComponent = () => import("../../components/AdRequestComponent");
const KeywordRequestComponent = () =>
    import("../../components/KeywordRequestComponent");
export default {
    props: ["requestId"],
    components: {
        AdRequestComponent,
        KeywordRequestComponent
    },
    data() {
        return {
            groups: ["group1", "group2"],
            campaigns: ["campaign1", "campaign2"],
            resource: "ads-request",
            records: [],
            errors: {},
            active: "Anuncio",
            levels: ["Campaña", "Anuncio", "Palabra Clave", "Palabra Negativa"],
            formAd: {},
            request: {}
        };
    },
    created() {
        // alert(this.requestId);
        this.getRecord();
    },
    methods: {
        getRecord() {
            this.$http
                .get(`/${this.resource}/record/${this.requestId}`)
                .then(response => {
                    this.request = response.data;
                    this.active = response.data.level;
                    console.log(this.request);
                    // console.log(response);
                    // this.formAd = response.data.ad;
                    // console.log(this.formAd);
                });
        }
    }
};
</script>
