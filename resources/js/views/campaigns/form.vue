<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Nueva Campaña
                    </h4>
                    <el-card class="box-card" v-show="active == 1">
                        <form autocomplete="off">
                            <fieldset class="border p-2">
                                <legend class="w-auto">
                                    información de la campaña
                                </legend>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div
                                                class="form-group"
                                                :class="{
                                                    'has-danger': errors.name
                                                }"
                                            >
                                                <label class="control-label"
                                                    >Nombre<span
                                                        class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <el-input
                                                    v-model="form.name"
                                                    dusk="name"
                                                ></el-input>
                                                <small
                                                    class="form-control-feedback"
                                                    v-if="errors.name"
                                                    v-text="errors.name[0]"
                                                ></small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div
                                                class="form-group"
                                                :class="{
                                                    'has-danger': errors.name
                                                }"
                                            >
                                                <label class="control-label"
                                                    >¿Desea factura?
                                                </label>
                                                <el-radio
                                                    v-model="form.apply_billing"
                                                    :label="true"
                                                    >Si</el-radio
                                                >
                                                <el-radio
                                                    v-model="form.apply_billing"
                                                    :label="false"
                                                    >No</el-radio
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div
                                                class="form-group"
                                                :class="{
                                                    'has-danger': errors.domain
                                                }"
                                            >
                                                <label class="control-label"
                                                    >Dominio<span
                                                        class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <el-input
                                                    v-model="form.url"
                                                    dusk="url"
                                                ></el-input>
                                                <small
                                                    class="form-control-feedback"
                                                    v-if="errors.url"
                                                    v-text="errors.url[0]"
                                                ></small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div
                                                class="form-group"
                                                :class="{
                                                    'has-danger': errors.phone
                                                }"
                                            >
                                                <label class="control-label"
                                                    >Telefono de contacto<span
                                                        class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <el-input
                                                    v-model="form.phone"
                                                    dusk="phone"
                                                ></el-input>
                                                <small
                                                    class="form-control-feedback"
                                                    v-if="errors.phone"
                                                    v-text="errors.phone[0]"
                                                ></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <el-select
                                                        v-model="form.mode"
                                                        placeholder="Modo"
                                                    >
                                                        <el-option
                                                            v-for="item in modes"
                                                            :key="item"
                                                            :value="item"
                                                        >
                                                        </el-option>
                                                    </el-select>
                                                    <small
                                                        class="form-control-feedback"
                                                        v-if="errors.phone"
                                                        v-text="errors.phone[0]"
                                                    ></small>
                                                </div>
                                                <div class="col-md-6">
                                                    <el-select
                                                        v-model="form.type"
                                                        placeholder="Tipo de campaña"
                                                    >
                                                        <el-option
                                                            v-for="item in types"
                                                            :key="item"
                                                            :value="item"
                                                        >
                                                        </el-option>
                                                    </el-select>
                                                    <small
                                                        class="form-control-feedback"
                                                        v-if="errors.phone"
                                                        v-text="errors.phone[0]"
                                                    ></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label"
                                                    >Objetivo de la campaña
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div
                                                class="col-md-4"
                                                style="text-align: center;"
                                                v-for="item in objectives"
                                                :key="item.value"
                                            >
                                                <div
                                                    class="form-group"
                                                    :class="{
                                                        'has-danger':
                                                            errors.name
                                                    }"
                                                >
                                                    <div>
                                                        <img
                                                            :src="item.img"
                                                            height="100px"
                                                            width="150px"
                                                            alt=""
                                                        />
                                                    </div>
                                                    <div>
                                                        <el-radio
                                                            v-model="
                                                                form.objective
                                                            "
                                                            :label="item.value"
                                                            >{{
                                                                item.value
                                                            }}</el-radio
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- </form>
                            </el-card> -->
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </el-card>
                    <!-- step2    -->
                    <el-card class="box-card" v-show="active == 2">
                        <Configuration
                            v-bind:locations="locations"
                            v-bind:schedules="schedules"
                            v-bind:form="form"
                        ></Configuration>
                    </el-card>

                    <el-button
                        class="float-right"
                        style="margin-top: 12px;"
                        @click="next"
                        >{{ buttonText }}</el-button
                    >
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
    components: {
        Configuration
    },
    data() {
        return {
            buttonText: "Continuar ->",
            formUbication: {},
            departments: [],
            locations: [],
            countrys: [
                {
                    value: "Pais1",
                    departments: [{ value: "D1.1" }, { value: "D2.1" }]
                },
                {
                    value: "Pais2",
                    departments: [{ value: "D2.1" }, { value: "D2.2" }]
                }
            ],
            state1: "",
            num: 1,
            resource: "ads-campaign",
            modes: ["Administrado", "No Administrado"],
            types: ["Libre", "Fijo"],
            schedules: [
                { day: "Lunes", start: 0, end: 0, selected: false },
                { day: "Martes", start: 0, end: 0, selected: false },
                { day: "Miercoles", start: 0, end: 0, selected: false },
                { day: "Jueves", start: 0, end: 0, selected: false },
                { day: "Viernes", start: 0, end: 0, selected: false },
                { day: "Sabado", start: 0, end: 0, selected: false },
                { day: "Domingo", start: 0, end: 0, selected: false }
            ],
            checkList: [],
            objectives: [
                {
                    img:
                        "https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png",
                    value: "llamadas"
                },
                {
                    img:
                        "https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png",
                    value: "trafico"
                },
                {
                    img:
                        "https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png",
                    value: "ventas"
                }
            ],
            records: [],
            value1: true,
            errors: {},
            form: {
                objective: "llamadas",
                apply_billing: false,
                type: null,
                mode: null,
                daily_cost: 0,
                monthly_cost: 0
            },
            active: 1,
            formRequest: {
                type: "Crear",
                level: "Campaña",
                state: "Pendiente"
            }
        };
    },
    created() {
        //this.getRecords()
    },
    methods: {
        handleSelectCountry(item) {
            this.departments = item.departments;
        },

        queryCountrySearch(queryString, cb) {
            var countrys = this.countrys;
            var results = queryString
                ? countrys.filter(this.createFilter(queryString))
                : countrys;
            // call callback function to return suggestions
            cb(results);
        },
        queryDepartmentSearch(queryString, cb) {
            var departments = this.departments;
            var results = queryString
                ? departments.filter(this.createFilter(queryString))
                : departments;
            // call callback function to return suggestions
            cb(results);
        },
        createFilter(queryString) {
            return link => {
                return (
                    link.value
                        .toLowerCase()
                        .indexOf(queryString.toLowerCase()) === 0
                );
            };
        },
        next() {
            if (this.buttonText == "Crear campaña ->") {
                this.form.locations = JSON.stringify(this.locations);
                this.form.ad_schedule = JSON.stringify(this.schedules);
                this.save();
            } else {
                this.active++, (this.buttonText = "Crear campaña ->");
            }
        },
        initForm() {
            this.form = {
                objective: "llamadas",
                apply_billing: false,
                type: null,
                mode: null,
                daily_cost: 0,
                monthly_cost: 0
            };
        },
        getRecords() {
            this.$http.get(`/${this.resource}/records`).then(response => {
                this.records = response.data.data;
            });
        },
        save() {
            this.$http
                .post(`/${this.resource}`, this.form)
                .then(response => {
                    console.log(response);
                    this.formRequest.campaign_id = response.data.record.id;
                    this.initForm();
                    this.saveRequest();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
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
                    window.location.href = "/ads-request/create";
                })
                .catch(error => {
                    this.$message.error("Sucedió un error.");
                });
        }
    }
};
</script>
