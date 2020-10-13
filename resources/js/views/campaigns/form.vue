<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Nueva Campaña
                    </h4>

                    <div class="row">
                        <div class="col-md-6">
                            <el-card class="box-card">
                                <form autocomplete="off">
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.name}">
                                            <label class="control-label">Nombre<span class="text-danger">*</span></label>
                                            <el-input v-model="form.name" dusk="name"></el-input>
                                            <small class="form-control-feedback" v-if="errors.name" v-text="errors.name[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.description}">
                                            <label class="control-label">Descripcion<span class="text-danger">*</span></label>
                                            <el-input v-model="form.description" dusk="description"></el-input>
                                            <small class="form-control-feedback" v-if="errors.description" v-text="errors.description[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.objective}">
                                            <label class="control-label">Objetivo<span class="text-danger">*</span></label>
                                            <el-input v-model="form.objective" dusk="objective"></el-input>
                                            <small class="form-control-feedback" v-if="errors.objective" v-text="errors.objective[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.url}">
                                            <label class="control-label">Url<span class="text-danger">*</span></label>
                                            <el-input v-model="form.url" dusk="url"></el-input>
                                            <small class="form-control-feedback" v-if="errors.url" v-text="errors.url[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="{'has-danger': errors.phone}">
                                            <label class="control-label">Telefono<span class="text-danger">*</span></label>
                                            <el-input v-model="form.phone" dusk="phone"></el-input>
                                            <small class="form-control-feedback" v-if="errors.phone" v-text="errors.phone[0]"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button"  class="btn btn-sm btn-gradient-primary float-right" @click="save">Guardar</button>
                                            <br>
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
        initForm()
        {
            this.form = {

            }
        },
        getRecords()
        {
            this.$http.get(`/${this.resource}/records`)
                    .then(response => {
                        this.records = response.data.data
                    })
        },
        save()
        {
            this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        this.initForm()
                        this.$message({
                            message: response.data.message,
                            type: 'success'
                        });
                    })
                    .catch(()=>{
                        this.$message.error('Sucedió un error.');
                    })
        }
    }

}
</script>
