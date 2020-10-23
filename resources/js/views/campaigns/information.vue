<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Información de la Campaña
                    </h4>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Nombre de la Campaña : {{ record.name }}
                        </p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">{{ record.url }}</p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Contacto :{{ record.phone }}
                        </p>
                    </div>

                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Objetivo de la campaña: {{ record.objective }}
                        </p>
                    </div>
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Modo: {{ record.mode }}
                        </p>
                    </div>
                    <br />
                    <br />
                    <div class="media-body align-self-center">
                        <p class="mb-0 text-muted font-14">
                            Servicio Facturado
                        </p>
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
    props: ["campaignId"],
    data() {
        return {
            resource: "ads-campaign",
            record: {}
        };
    },
    created() {
        this.getRecord();
    },
    methods: {
        getRecord() {
            this.$http
                .get(`/${this.resource}/record/${this.campaignId}`)
                .then(response => {
                    this.record = response.data;
                });
        }
    }
};
</script>
