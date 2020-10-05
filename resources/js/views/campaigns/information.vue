<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Información de la Campaña
                    </h4>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14"> Nombre de la Campaña : {{ form.name}} </p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14"> {{ form.url}}</p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14"> {{ form.phone}}</p>
                    </div>

                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14"> Objetivo de la campaña: {{ form.objective}}</p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14"> Modo: Administrado</p>
                    </div>
                    <br>
                    <br>
                     <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14"> Servicio Facturado</p>
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
    props:['campaignId'],
    data(){
        return{
            resource: 'ads-campaign',
            form:{}
        }
    },
    created(){
        this.getRecord()
    },
    methods:{
        getRecord()
        {
            /*this.$http.get(`/${this.resource}/record`)
                    .then(response => {
                        this.records = response.data.data
                    })*/
            this.form.name = "Campaña 1"
            this.form.url = "www.demo.com"
            this.form.phone = "999-999-333"
            this.form.objective = 'Más llamadas'


        }
    }

}
</script>
