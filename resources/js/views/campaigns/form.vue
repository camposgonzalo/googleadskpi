<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Nueva Campaña
                    </h4>
                    <el-steps :active="active" finish-status="success">
                        <el-step
                            title="Step 1"
                            description="información de la campaña"
                        ></el-step>
                        <el-step
                            title="Step 2"
                            description="Confguración de la campaña"
                        ></el-step>
                    </el-steps>

                    <div class="row" v-show="active == 1">
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.name
                                            }"
                                        >
                                            <label class="control-label"
                                                >Nombre<span class="text-danger"
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
                                                v-model="form.domain"
                                                dusk="domain"
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.domain"
                                                v-text="errors.domain[0]"
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
                                    </div>
                                </form>
                            </el-card>
                        </div>
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.name
                                            }"
                                        >
                                            <label class="control-label"
                                                >Objetivo de la campaña
                                            </label>
                                            <br />

                                            <el-radio-group
                                                v-model="form.objective"
                                            >
                                                <el-radio
                                                    v-for="item in objectives"
                                                    :label="item"
                                                    :key="item"
                                                    :value="item"
                                                >
                                                </el-radio>
                                            </el-radio-group>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.name"
                                                v-text="errors.name[0]"
                                            ></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-gradient-primary float-right"
                                                @click="save"
                                            >
                                                Continuar
                                            </button>
                                            <br />
                                        </div>
                                    </div>
                                </form>
                            </el-card>
                        </div>
                    </div>
                    <div class="row" v-show="active == 2">
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.name
                                            }"
                                        >
                                            <label class="control-label"
                                                >Nombre<span class="text-danger"
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
                                                v-model="form.domain"
                                                dusk="domain"
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.domain"
                                                v-text="errors.domain[0]"
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
                                    </div>
                                </form>
                            </el-card>
                        </div>
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.name
                                            }"
                                        >
                                            <label class="control-label"
                                                >Objetivo de la campaña
                                            </label>
                                            <br />
                                            <el-radio-group
                                                v-model="form.objective"
                                            >
                                                <el-radio
                                                    v-for="item in objectives"
                                                    :label="item"
                                                    :key="item"
                                                    :value="item"
                                                >
                                                </el-radio>
                                            </el-radio-group>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.name"
                                                v-text="errors.name[0]"
                                            ></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-gradient-primary float-right"
                                                @click="save"
                                            >
                                                Continuar
                                            </button>
                                            <br />
                                        </div>
                                    </div>
                                </form>
                            </el-card>
                        </div>
                    </div>
                    <el-button style="margin-top: 12px;" @click="next"
                        >Next step</el-button
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
export default {
    props: {},
    data() {
        return {
            resource: "ads-campaign",
            modes: ["Administrado", "No Administrado"],
            types: ["Libre", "Fijo"],
            objectives: ["llamadas", "trafico", "ventas"],
            records: [],
            value1: true,
            errors: [],
            form: {
                apply_billing: false,
                type: null,
                mode: null
            },
            active: 1
        };
    },
    created() {
        //this.getRecords()
        console.log(this.form);
    },
    methods: {
        next() {
            if (this.active++ > 1) this.active = 1;
        },
        initForm() {
            this.form = {
                apply_billing: false,
                type: null,
                mode: null
            };
        },
        getRecords() {
            this.$http.get(`/${this.resource}/records`).then(response => {
                this.records = response.data.data;
            });
        },
        save() {
            console.log(this.form);
            // this.$http
            //     .post(`/${this.resource}`, this.form)
            //     .then(response => {
            //         this.initForm();
            //         this.$message({
            //             message: response.data.message,
            //             type: "success"
            //         });
            //     })
            //     .catch(() => {
            //         this.$message.error("Sucedió un error.");
            //     });
        }
    }
};
</script>
