<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Mi Cuenta
                    </h4>

                    <div class="row">
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <div slot="header" class="clearfix">
                                    <span>Cuenta</span>
                                </div>
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.description}">
                                            <label class="control-label">Nombres<span class="text-danger">*</span></label>
                                            <el-input v-model="form.description" dusk="description"></el-input>
                                            <small class="form-control-feedback" v-if="errors.description" v-text="errors.description[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.description}">
                                            <label class="control-label">Email<span class="text-danger">*</span></label>
                                            <el-input v-model="form.description" dusk="description"></el-input>
                                            <small class="form-control-feedback" v-if="errors.description" v-text="errors.description[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.description}">
                                            <label class="control-label">Contraseña<span class="text-danger">*</span></label>
                                            <el-input v-model="form.description" dusk="description"></el-input>
                                            <small class="form-control-feedback" v-if="errors.description" v-text="errors.description[0]"></small>
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
                                        <div class="form-group" :class="{'has-danger': errors.description}">
                                            <el-checkbox v-model="form.checked">Activar Facturación</el-checkbox>
                                            <small class="form-control-feedback" v-if="errors.description" v-text="errors.description[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.description}">
                                            <label class="control-label">Ruc</label>
                                            <el-input v-model="form.description" dusk="description"></el-input>
                                            <small class="form-control-feedback" v-if="errors.description" v-text="errors.description[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.description}">
                                            <label class="control-label">Razon Social</label>
                                            <el-input v-model="form.description" dusk="description"></el-input>
                                            <small class="form-control-feedback" v-if="errors.description" v-text="errors.description[0]"></small>
                                        </div>
                                    </div>
                                </form>
                            </el-card>
                        </div>
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
export default {
    props:{

    },
    data(){
        return{
            resource: 'ads-campaign',
            records: [],
            value1:true,
            errors:[],
            form: {}
        }
    },
    created(){
        //this.getRecords()
    },
    methods:{
        getRecords()
        {
            this.$http.get(`/${this.resource}/records`)
                    .then(response => {
                        this.records = response.data.data
                    })
        }
    }

}
</script>
