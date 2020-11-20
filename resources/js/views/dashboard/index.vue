<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div v-if="currentUser.role == 'admin'">
                                Cliente
                                <el-select
                                    v-model="user"
                                    @change="setUser"
                                    :placeholder="userPlaceHolder"
                                >
                                    <el-option
                                        v-for="option in users"
                                        v-bind:key="option.id"
                                        :value="option"
                                        >{{ option.name }}</el-option
                                    >
                                </el-select>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p
                                    class="text-dark font-weight-semibold font-14"
                                >
                                    Campañas activas
                                </p>
                                <h3 class="my-3">
                                    {{ totalValues.campaigns }}
                                </h3>
                                <p class="mb-0 text-truncate">
                                    <span class="text-success"
                                        ><i class="mdi mdi-trending-up"></i
                                        >1.5%</span
                                    >
                                    Nuevas Campañas Hoy
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
            <div class="col-lg-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p
                                    class="text-dark font-weight-semibold font-14"
                                >
                                    Total Clicks
                                </p>
                                <h3 class="my-3">{{ totalValues.clicks }}</h3>
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
            <div class="col-lg-4">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p
                                    class="text-dark font-weight-semibold font-14"
                                >
                                    Total de Impresiones
                                </p>
                                <h3 class="my-3">
                                    {{ totalValues.impressions }}
                                </h3>
                                <p class="mb-0 text-truncate">
                                    <span class="text-success"
                                        ><i class="mdi mdi-trending-up"></i
                                        >2.5%</span
                                    >
                                    Nuevas Impresiones Hoy
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
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Audience Overview</h4>
                        <div class="">
                            <apexchart
                                type="line"
                                height="350"
                                :options="chartOptions"
                                :series="series"
                            ></apexchart>
                        </div>
                    </div>
                    <!--end card-body-->
                    <div class="card-body bg-light chart-report-card">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-4">
                                <div class="media">
                                    <i
                                        class="dripicons-user-group report-main-icon bg-card text-dark mr-2"
                                    ></i>
                                    <div
                                        class="media-body align-self-center text-truncate"
                                    >
                                        <h4
                                            class="mt-0 mb-0 font-weight-semibold text-dark font-24"
                                        >
                                            140k
                                            <span
                                                class="text-success font-12 font-weight-normal"
                                                ><i
                                                    class="mdi mdi-arrow-up mr-1"
                                                ></i
                                                >21%</span
                                            >
                                        </h4>
                                        <p
                                            class="text-dark font-weight-semibold mb-0 font-14"
                                        >
                                            Users
                                        </p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div class="media">
                                    <i
                                        class="dripicons-rocket report-main-icon bg-card text-dark mr-2"
                                    ></i>
                                    <div
                                        class="media-body align-self-center text-truncate"
                                    >
                                        <h4
                                            class="mt-0 mb-0 font-weight-semibold text-dark font-24"
                                        >
                                            2154
                                            <span
                                                class="text-success font-12 font-weight-normal"
                                                ><i
                                                    class="mdi mdi-arrow-up mr-1"
                                                ></i
                                                >21%</span
                                            >
                                        </h4>
                                        <p
                                            class="text-dark font-weight-semibold mb-0 font-14"
                                        >
                                            Page views
                                        </p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div class="media">
                                    <i
                                        class="dripicons-preview report-main-icon bg-card text-dark mr-2"
                                    ></i>
                                    <div
                                        class="media-body align-self-center text-truncate"
                                    >
                                        <h4
                                            class="mt-0 mb-0 font-weight-semibold text-dark font-24"
                                        >
                                            183k
                                            <span
                                                class="text-success font-12 font-weight-normal"
                                                ><i
                                                    class="mdi mdi-arrow-up mr-1"
                                                ></i
                                                >21%</span
                                            >
                                        </h4>
                                        <p
                                            class="text-dark font-weight-semibold mb-0 font-14"
                                        >
                                            Impressions
                                        </p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Sessions Device</h4>
                        <apexchart
                            type="pie"
                            width="380"
                            :options="chartOptionsPie"
                            :series="seriesPie"
                        ></apexchart>
                        <div class="table-responsive mt-4">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Device</th>
                                        <th>Sassions</th>
                                        <th>Day</th>
                                        <th>Week</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Dasktops</th>
                                        <td>1843</td>
                                        <td>-3</td>
                                        <td>-12</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tablets</th>
                                        <td>2543</td>
                                        <td>-5</td>
                                        <td>-2</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobiles</th>
                                        <td>3654</td>
                                        <td>-5</td>
                                        <td>-6</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end /table-->
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body bg-light chart-report-card">
                        <div class="row d-flex justify-content-center">
                            <a
                                href="https://www.youtube.com/"
                                target="_blank"
                                class="btn btn-sm btn-gradient-primary float-right"
                                onclick="update()"
                                >Visitar Blog</a
                            >
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["currentUser"],
    data() {
        return {
            userPlaceHolder: "Seleccionar Cliente",
            users: [],
            user: null,
            resource: "ads-dashboard",
            records: [],
            totalValues: {
                campaigns: 0,
                clicks: 0,
                impressions: 0
            },
            series: [
                {
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }
            ],
            chartOptions: {
                chart: {
                    height: 350,
                    type: "line",
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: "straight"
                },
                title: {
                    text: "Product Trends by Month",
                    align: "left"
                },
                grid: {
                    row: {
                        colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                        opacity: 0.5
                    }
                },
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep"
                    ]
                }
            },
            seriesPie: [44, 55, 13, 43, 22],
            chartOptionsPie: {
                chart: {
                    width: 380,
                    type: "pie"
                },
                labels: [
                    "UNKNOWN",
                    "DESKTOP",
                    "HIGH_END_MOBILE",
                    "TABLET",
                    "CONNECTED_TV"
                ],
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: "bottom"
                            }
                        }
                    }
                ]
            }
        };
    },
    created() {
        if (this.currentUser.role == "user") this.getRecords();
        else this.getUsers();
    },
    methods: {
        setUser() {
            this.$http
                .get(
                    `ads-user/${this.currentUser.id}/set/account_id/${this.user.account_id}`
                )
                .then(response => {
                    this.userPlaceHolder = this.user.name;
                    this.getRecords();
                });
            // this.getRecords();
        },
        getUsers() {
            this.$http.get(`/ads-user/users`).then(response => {
                this.users = response.data;
            });
        },
        getRecords() {
            // let url = `/${this.resource}/records`;
            let url = `/${this.resource}/user/${this.currentUser.id}/records`;
            if (this.currentUser.role == "admin")
                url = `/${this.resource}/user/${this.user.id}/records`;
            this.$http.get(url).then(response => {
                this.records = response.data.data;
                let campaignsId = [];
                this.records.map(r => {
                    this.totalValues.clicks += Number(r.clicks);
                    this.totalValues.impressions += Number(r.impressions);
                    this.totalValues.campaigns++;
                    // if (campaignsId.indexOf(r.id) < 0) {
                    //     campaignsId.push(r.id);
                    //     this.totalValues.campaigns++;
                    // }
                });
            });
        }
    }
};
</script>
