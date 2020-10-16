<template>
    <div class="col-md-4 col-lg-3">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p
                                    class="text-dark font-weight-semibold font-14"
                                >
                                    {{title}}
                                </p>
                                <h3 class="my-3">{{value}}</h3>
                                <p class="mb-0 text-truncate">
                                    <span class="text-success"
                                        ><i class="mdi mdi-trending-up"></i
                                        >8.5%</span
                                    >
                                    Nuevos Clicks Hoy
                                </p>
                            </div>
                            <div class="align-self-center">
                                <i
                                    class="dripicons-user-group report-main-icon bg-soft-purple text-purple"
                                ></i>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
</template>

<script>
    export default {
        props: ['value','title'],
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>