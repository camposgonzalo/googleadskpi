<template>
    <div class="modal center">
        <div class="row">
            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <el-card class="box-card">
                            <form autocomplete="off">
                                <fieldset class="border p-2">
                                    <legend class="w-auto">
                                        Crear cargos o Abonos
                                    </legend>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div
                                                    class="form-group"
                                                    :class="{
                                                        'has-danger':
                                                            errors.name
                                                    }"
                                                >
                                                    <label class="control-label"
                                                        >Buscar Usuario<span
                                                            class="text-danger"
                                                            >*</span
                                                        ></label
                                                    >
                                                    <el-select
                                                        v-model="form.user_id"
                                                        placeholder="Seleccionar campaña"
                                                    >
                                                        <el-option
                                                            v-for="item in users"
                                                            :key="item.id"
                                                            :value="item.id"
                                                            :label="item.name"
                                                        >
                                                        </el-option>
                                                    </el-select>
                                                    <small
                                                        class="form-control-feedback"
                                                        v-if="errors.user_id"
                                                        v-text="
                                                            errors.user_id[0]
                                                        "
                                                    ></small>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label
                                                            class="control-label"
                                                            >Seleccionar
                                                            campaña<span
                                                                class="text-danger"
                                                                >*</span
                                                            ></label
                                                        >
                                                        <el-select
                                                            v-model="
                                                                form.campaign_id
                                                            "
                                                            placeholder="Seleccionar campaña"
                                                        >
                                                            <el-option
                                                                v-for="item in campaigns"
                                                                :key="item.id"
                                                                :value="item.id"
                                                                :label="
                                                                    item.name
                                                                "
                                                            >
                                                            </el-option>
                                                        </el-select>
                                                        <small
                                                            class="form-control-feedback"
                                                            v-if="
                                                                errors.campaign_id
                                                            "
                                                            v-text="
                                                                errors
                                                                    .campaign_id[0]
                                                            "
                                                        ></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="col-md-12">
                                                <div
                                                    class="form-group"
                                                    :class="{
                                                        'has-danger':
                                                            errors.domain
                                                    }"
                                                >
                                                    <label class="control-label"
                                                        >Ingresar Monto<span
                                                            class="text-danger"
                                                            >*</span
                                                        ></label
                                                    >
                                                    <el-input
                                                        v-model="form.amount"
                                                        dusk="url"
                                                    ></el-input>
                                                    <small
                                                        class="form-control-feedback"
                                                        v-if="errors.amount"
                                                        v-text="
                                                            errors.amount[0]
                                                        "
                                                    ></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <br />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <el-select
                                                                v-model="
                                                                    form.type
                                                                "
                                                                placeholder="Tipo de item"
                                                            >
                                                                <el-option
                                                                    v-for="item in types"
                                                                    :key="item"
                                                                    :value="
                                                                        item
                                                                    "
                                                                >
                                                                </el-option>
                                                            </el-select>
                                                            <small
                                                                class="form-control-feedback"
                                                                v-if="
                                                                    errors.type
                                                                "
                                                                v-text="
                                                                    errors
                                                                        .type[0]
                                                                "
                                                            ></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-12"
                                            style="display: flex; justify-content: flex-end"
                                        >
                                            <el-button @click="save"
                                                >Guardar y crear
                                            </el-button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </el-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            errors: [],
            form: {},
            types: ["Pago", "Credito", "Asesoria"],
            resource: "ads-billing",
            campaigns: [],
            users: []
        };
    },
    async created() {
        this.getCampaigns();
        this.getUsers();
    },
    methods: {
        initForm() {
            this.form = {};
            this.errors = {};
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
                    this.cerrar();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                    this.$message.error("Sucedió un error.");
                });
        },
        getCampaigns() {
            this.$http.get(`/ads-campaign/records`).then(response => {
                this.campaigns = response.data;
                console.log(this.campaigns);
            });
        },
        getUsers() {
            this.$http.get(`/ads-user/records`).then(response => {
                this.users = response.data;
                console.log("user");
                console.log(this.users);
            });
        },
        cerrar() {
            this.$emit("cerrar");
        }
    }
};
</script>

<style scoped>
.modal {
    width: 100%;
    background: rgba(0, 0, 0, 0.5);
    position: absolute;
    z-index: 99;
    color: #eb484a;
    margin: auto;
    height: 100vh;
    box-sizing: border-box;
    display: block;
}

.center {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
</style>
