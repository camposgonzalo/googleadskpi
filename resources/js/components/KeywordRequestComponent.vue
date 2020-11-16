<template>
    <form autocomplete="off">
        <fieldset class="border p-2">
            <legend class="w-auto">
                Vista Solicitud de Palabras {{ type }}s
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
                                >Ingresar palabra {{ type
                                }}<span class="text-danger">*</span></label
                            >
                            <el-input
                                placeholder="Please input"
                                v-model="keyword"
                                class="input-with-select"
                            >
                                <el-button
                                    slot="append"
                                    icon="el-icon-plus"
                                    @click="addKeyword"
                                ></el-button>
                            </el-input>
                            <small
                                class="form-control-feedback"
                                v-if="errors.keyword"
                                v-text="errors.keyword[0]"
                            ></small>
                        </div>
                    </div>
                    <div
                        class="col-md-12"
                        v-for="(item, index) in keywords"
                        :key="index"
                    >
                        <el-input
                            :placeholder="item"
                            v-model="keywords[index]"
                            class="input-with-select"
                        >
                            <el-button
                                slot="append"
                                icon="el-icon-delete"
                                @click="keywords.splice(index, 1)"
                            ></el-button>
                        </el-input>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <el-select
                                    v-model="form.group"
                                    placeholder="Grupo"
                                >
                                    <el-option
                                        v-for="item in groups"
                                        :key="item"
                                        :value="item"
                                    >
                                    </el-option>
                                </el-select>
                                <small
                                    class="form-control-feedback"
                                    v-if="errors.group"
                                    v-text="errors.group[0]"
                                ></small>
                            </div>
                            <div class="col-md-6">
                                <el-select
                                    v-model="form.campaign"
                                    placeholder="Campaña"
                                >
                                    <el-option
                                        v-for="item in campaigns"
                                        :key="item"
                                        :value="item"
                                    >
                                    </el-option>
                                </el-select>
                                <small
                                    class="form-control-feedback"
                                    v-if="errors.campaign"
                                    v-text="errors.campaign[0]"
                                ></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    v-if="showButtons"
                    class="col-md-12"
                    style="display: flex; justify-content: flex-end"
                >
                    <el-button @click="saveDraft"
                        >Guardar como borrador</el-button
                    >
                    <el-button @click="savePending">Enviar solicitud</el-button>
                </div>
            </div>
        </fieldset>
    </form>
</template>
<script>
export default {
    props: [
        "type",
        "groups",
        "campaigns",
        "form",
        "showButtons",
        "currentUser"
    ],
    data() {
        return {
            keyword: "",
            keywords: this.form.keyword,
            formRequest: {
                type: "Crear",
                level: `Palabra ${this.type}`,
                user_id: this.currentUser.id
            },
            resource: "ads-request",
            records: [],
            errors: {}
        };
    },
    created() {},
    methods: {
        addKeyword() {
            if (this.keyword != "") {
                this.keywords.push(this.keyword);
            }
            this.keyword = "";
        },
        initForm() {
            this.keywords = [];
            this.form = {
                keyword: []
            };
            this.errors = {};
            this.formRequest = {
                type: "Crear",
                level: `Palabra ${this.type}`,
                user_id: this.currentUser.id
            };
        },
        getRecords() {
            this.$http.get(`/${this.resource}/records`).then(response => {
                this.records = response.data.data;
            });
        },
        saveDraft() {
            this.formRequest.state = "Borrador";
            this.saveKeyword();
        },
        savePending() {
            this.formRequest.state = "Pendiente";
            this.saveKeyword();
        },
        saveKeyword() {
            this.form.type = this.type;
            this.form.keyword = JSON.stringify(this.keywords);
            this.formRequest.request = JSON.stringify(this.form);
            this.$http
                .post(`/${this.resource}/keyword`, this.form)
                .then(response => {
                    this.formRequest.keyword_id = response.data.record.id;
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
                .post(`/${this.resource}`, this.formRequest)
                .then(response => {
                    this.initForm();
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                    this.cerrar();
                })
                .catch(error => {
                    this.$message.error("Sucedió un error.");
                });
        },
        cerrar() {
            this.$emit("cerrar");
        }
    }
};
</script>
