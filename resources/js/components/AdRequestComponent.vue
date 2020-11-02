<template>
    <form autocomplete="off">
        <fieldset class="border p-2">
            <legend class="w-auto">
                Vista Solicitud de anuncio
            </legend>

            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div
                            class="form-group"
                            :class="{
                                'has-danger': errors.title_one
                            }"
                        >
                            <label class="control-label"
                                >Titulo 1<span class="text-danger"
                                    >*</span
                                ></label
                            >
                            <el-input
                                v-model="form.title_one"
                                dusk="title_one"
                            ></el-input>
                            <small
                                class="form-control-feedback"
                                v-if="errors.title_one"
                                v-text="errors.title_one[0]"
                            ></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div
                            class="form-group"
                            :class="{
                                'has-danger': errors.title_two
                            }"
                        >
                            <label class="control-label"
                                >Titulo 2<span class="text-danger"
                                    >*</span
                                ></label
                            >
                            <el-input
                                v-model="form.title_two"
                                dusk="title_two"
                            ></el-input>
                            <small
                                class="form-control-feedback"
                                v-if="errors.title_two"
                                v-text="errors.title_two[0]"
                            ></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div
                            class="form-group"
                            :class="{
                                'has-danger': errors.description
                            }"
                        >
                            <label class="control-label"
                                >Descripción del anuncios<span
                                    class="text-danger"
                                    >*</span
                                ></label
                            >
                            <el-input
                                v-model="form.description"
                                dusk="description"
                            ></el-input>
                            <small
                                class="form-control-feedback"
                                v-if="errors.description"
                                v-text="errors.description[0]"
                            ></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div
                            class="form-group"
                            :class="{
                                'has-danger': errors.url
                            }"
                        >
                            <label class="control-label"
                                >Enlace<span class="text-danger">*</span></label
                            >
                            <el-input v-model="form.url" dusk="url"></el-input>
                            <small
                                class="form-control-feedback"
                                v-if="errors.url"
                                v-text="errors.url[0]"
                            ></small>
                        </div>
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
                    <br />
                    <div class="col-md-12">
                        <el-input
                            type="textarea"
                            :rows="12"
                            placeholder="Please input"
                            v-model="textarea"
                        >
                        </el-input>
                    </div>
                </div>
                <div
                    v-if="showButtons"
                    class="col-md-12"
                    style="display: flex; justify-content: flex-end"
                >
                    <el-button v-if="showDraftButton" @click="saveDraft"
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
    props: ["groups", "campaigns", "form", "showButtons", "currentUser"],
    data() {
        return {
            textarea: "",
            resource: "ads-request",
            records: [],
            errors: {},
            formRequest: {
                type: "Crear",
                level: "Anuncio",
                user_id: this.currentUser.id
            },
            showDraftButton: true
        };
    },
    created() {
        console.log(this.currentUser);
        console.log(this.form);
    },
    methods: {
        initForm() {
            this.form = {};
        },
        saveDraft() {
            this.formRequest.state = "Borrador";
            this.formRequest.request = JSON.stringify(this.form);
            this.saveAd();
        },
        savePending() {
            this.formRequest.state = "Pendiente";
            this.saveAd();
        },
        saveAd() {
            this.$http
                .post(`/${this.resource}/ad`, this.form)
                .then(response => {
                    this.formRequest.ad_id = response.data.record.id;
                    this.initForm();
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
                    this.$message({
                        message: response.data.message,
                        type: "success"
                    });
                })
                .catch(error => {
                    console.log(error);
                    this.$message.error("Sucedió un error.");
                });
        }
    }
};
</script>
