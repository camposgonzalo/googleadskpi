<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Nuevo Usuario
                    </h4>

                    <div class="row">
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <div slot="header" class="clearfix">
                                    <span>Cuenta</span>
                                </div>
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.name
                                            }"
                                        >
                                            <label class="control-label"
                                                >Nombres<span
                                                    class="text-danger"
                                                    >*</span
                                                ></label
                                            >
                                            <el-input
                                                v-model="form.name"
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
                                                'has-danger': errors.email
                                            }"
                                        >
                                            <label class="control-label"
                                                >Email<span class="text-danger"
                                                    >*</span
                                                ></label
                                            >
                                            <el-input
                                                v-model="form.email"
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.email"
                                                v-text="errors.email[0]"
                                            ></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.password
                                            }"
                                        >
                                            <label class="control-label"
                                                >Contraseña<span
                                                    class="text-danger"
                                                    >*</span
                                                ></label
                                            >
                                            <el-input
                                                v-model="form.password"
                                                show-password
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.password"
                                                v-text="errors.password[0]"
                                            ></small>
                                        </div>
                                    </div>
                                </form>
                            </el-card>
                        </div>
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <div slot="header" class="clearfix">
                                    <span>Facturación</span>
                                </div>
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger':
                                                    errors.apply_billing
                                            }"
                                        >
                                            <el-checkbox
                                                v-model="form.apply_billing"
                                                >Activar
                                                Facturación</el-checkbox
                                            >
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.apply_billing"
                                                v-text="errors.apply_billing[0]"
                                            ></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.ruc
                                            }"
                                        >
                                            <label class="control-label"
                                                >Ruc</label
                                            >
                                            <el-input
                                                v-model="form.ruc"
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.ruc"
                                                v-text="errors.ruc[0]"
                                            ></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger':
                                                    errors.business_name
                                            }"
                                        >
                                            <label class="control-label"
                                                >Razon Social</label
                                            >
                                            <el-input
                                                v-model="form.business_name"
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.business_name"
                                                v-text="errors.business_name[0]"
                                            ></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger': errors.account_id
                                            }"
                                        >
                                            <label class="control-label"
                                                >Google Account Id</label
                                            >
                                            <el-input
                                                v-model="form.account_id"
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.account_id"
                                                v-text="errors.account_id[0]"
                                            ></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="form-group"
                                            :class="{
                                                'has-danger':
                                                    errors.account_name
                                            }"
                                        >
                                            <label class="control-label"
                                                >Google Account Name</label
                                            >
                                            <el-input
                                                v-model="form.account_name"
                                            ></el-input>
                                            <small
                                                class="form-control-feedback"
                                                v-if="errors.account_name"
                                                v-text="errors.account_name[0]"
                                            ></small>
                                        </div>
                                    </div>
                                </form>
                            </el-card>
                        </div>
                    </div>
                    <el-button
                        class="float-left"
                        style="margin-top: 12px;"
                        @click="cancel()"
                        >Cancelar</el-button
                    >
                    <el-button
                        class="float-right"
                        style="margin-top: 12px;"
                        @click="save"
                        >Guardar</el-button
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {},
    data() {
        return {
            resource: "ads-user",
            errors: [],
            form: {}
        };
    },
    created() {
        this.initForm();
    },
    methods: {
        initForm() {
            this.form = {
                role: "user"
            };
            this.errors = [];
        },
        save() {
            this.$http
                .post(`/${this.resource}`, this.form)
                .then(response => {
                    this.initForm();
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                    this.$message.error("Sucedió un error.");
                });
        },
        cancel() {
            window.location.href = `/${this.resource}`;
        }
    }
};
</script>
