<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Nueva Solicitud
                    </h4>
                    <el-select
                        v-model="active"
                        @change="requestSelected"
                        placeholder="Nivel"
                    >
                        <el-option
                            v-for="(item, index) in levels"
                            :key="index"
                            :value="item"
                        >
                        </el-option>
                    </el-select>
                    <br />
                    <br />
                    <el-card class="box-card" v-if="active == 'Anuncio'">
                        <AdRequestComponent
                            v-bind:form="form"
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                            v-bind:showButtons="true"
                        ></AdRequestComponent>
                    </el-card>
                    <!-- step2    -->
                    <el-card class="box-card" v-if="active == 'Palabra Clave'">
                        <KeywordRequestComponent
                            v-bind:form="form"
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                            v-bind:type="'Clave'"
                            v-bind:showButtons="true"
                        ></KeywordRequestComponent>
                    </el-card>
                    <!-- step3   -->
                    <el-card
                        class="box-card"
                        v-if="active == 'Palabra Negativa'"
                    >
                        <KeywordRequestComponent
                            v-bind:form="form"
                            v-bind:groups="groups"
                            v-bind:campaigns="campaigns"
                            v-bind:type="'Negativa'"
                            v-bind:showButtons="true"
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
    props: ["requestLevel"],
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
            active: this.requestLevel,
            levels: ["Campaña", "Anuncio", "Palabra Clave", "Palabra Negativa"],
            form: {
                keyword: []
            }
        };
    },
    created() {},
    methods: {
        requestSelected() {
            this.form = {
                keyword: []
            };
            if (this.active == "Campaña")
                window.location.href = "/ads-campaign/create";
        }
    }
};
</script>
