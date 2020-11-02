<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content">
                            <h2>
                                <el-popover
                                    placement="right"
                                    width="200"
                                    trigger="click"
                                >
                                    <el-row>
                                        <a
                                            :href="
                                                `/ads-campaign/information/${record.id}`
                                            "
                                            size="mini"
                                            plain
                                            >- Ver informacion</a
                                        >
                                    </el-row>
                                    <el-row>
                                        <a
                                            :href="
                                                `/ads-campaign/configuration/${record.id}`
                                            "
                                            size="mini"
                                            plain
                                            >- Ver configuracion</a
                                        >
                                    </el-row>
                                    <el-button
                                        size="mini"
                                        slot="reference"
                                        icon="el-icon-menu"
                                        circle
                                    ></el-button> </el-popover
                                >Campaña: {{ record.name }}
                            </h2>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-3">
                                <div class="row d-flex justify-content-center">
                                    <h4 class="header-title mt-0">
                                        Mostrar datos desde :
                                    </h4>
                                    <el-date-picker
                                        v-model="startDate"
                                        type="date"
                                        placeholder="Pick a day"
                                    >
                                    </el-date-picker>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row d-flex justify-content-center">
                                    <h4 class="header-title mt-0">hasta :</h4>

                                    <el-date-picker
                                        v-model="startDate"
                                        type="date"
                                        placeholder="Pick a day"
                                    >
                                    </el-date-picker>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>

        <div class="row">
            <Kpi
                v-bind:value="record.clicks"
                v-bind:title="'Total de clics'"
            ></Kpi>
            <Kpi
                v-bind:value="record.impressions"
                v-bind:title="'Total de impresiones'"
            ></Kpi>
            <Kpi v-bind:value="record.ctr" v-bind:title="'CTR'"></Kpi>
            <Kpi
                v-bind:value="`${record.currency} ${record.cost}`"
                v-bind:title="'Consumo'"
            ></Kpi>
        </div>
        <div class="row">
            <div class="col-lg-4">
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Sessions Device</h4>
                        <!-- <apexchart type="pie" width="380" :options="chartOptionsPie" :series="seriesPie"></apexchart> -->
                        <apexchart
                            type="bar"
                            height="350"
                            :options="chartOptionsBar"
                            :series="seriesBar"
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
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">
                            <el-popover
                                placement="right"
                                width="200"
                                trigger="click"
                            >
                                <el-row>
                                    <a
                                        :href="`/ads-request/create/Anuncio`"
                                        size="mini"
                                        plain
                                        >- Crear nuevo</a
                                    >
                                </el-row>
                                <el-button
                                    size="mini"
                                    slot="reference"
                                    icon="el-icon-more"
                                    circle
                                ></el-button>
                            </el-popover>
                            Anuncios
                        </h4>
                        <div class="table-responsive browser_users">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <!--<th class="border-top-0">Id</th>-->
                                        <th class="border-top-0">Estado</th>
                                        <th class="border-top-0">Anuncio</th>
                                        <th class="border-top-0">Grupo</th>
                                        <th class="border-top-0">Clics</th>
                                        <th class="border-top-0">
                                            Impr
                                        </th>
                                        <th class="border-top-0">CTR</th>
                                        <th class="border-top-0">Consumo</th>

                                        <!-- <th class="border-top-0">AdvertisingChannelSubType</th>-->
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(row, index) in ads"
                                        :key="index + 'R'"
                                    >
                                        <td>
                                            {{ row.status }}
                                        </td>
                                        <td>
                                            {{ row.headline1 }}
                                            <br />
                                            {{ row.headline2 }}
                                        </td>
                                        <td>{{ row.adGroup }}</td>
                                        <td>{{ row.clicks }}</td>
                                        <td>{{ row.impressions }}</td>
                                        <td>{{ row.ctr }}</td>
                                        <td>
                                            {{ row.currency }} {{ row.cost }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <!--end /div-->
                        <br />
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">
                            <el-popover
                                placement="right"
                                width="200"
                                trigger="click"
                            >
                                <el-row>
                                    <a
                                        :href="
                                            `/ads-request/create/Palabra%20Clave`
                                        "
                                        size="mini"
                                        plain
                                        >- Crear nuevo</a
                                    >
                                </el-row>

                                <el-button
                                    size="mini"
                                    slot="reference"
                                    icon="el-icon-more"
                                    circle
                                ></el-button>
                            </el-popover>
                            Palabras Claves
                        </h4>
                        <div class="table-responsive browser_users">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <!--<th class="border-top-0">Id</th>-->
                                        <th class="border-top-0">Palabra</th>
                                        <th class="border-top-0">Grupo</th>
                                        <th class="border-top-0">Clic</th>
                                        <th class="border-top-0">
                                            Impr
                                        </th>
                                        <th class="border-top-0">CTR</th>

                                        <!-- <th class="border-top-0">AdvertisingChannelSubType</th>-->
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(row, index) in keywords"
                                        :key="index + 'R'"
                                    >
                                        <td>
                                            <el-popover
                                                placement="right"
                                                width="200"
                                                trigger="click"
                                            >
                                                <el-row>
                                                    <a size="mini" plain
                                                        >- Ver reporte</a
                                                    >
                                                </el-row>
                                                <el-row>
                                                    <a size="mini" plain
                                                        >- Ver configuracion</a
                                                    >
                                                </el-row>
                                                <el-button
                                                    size="mini"
                                                    slot="reference"
                                                    icon="el-icon-menu"
                                                    circle
                                                ></el-button>
                                            </el-popover>
                                            {{ row.text }}
                                        </td>
                                        <!-- <td>
                                            {{ row.text }}
                                        </td> -->
                                        <td>{{ row.adGroup }}</td>
                                        <td>{{ row.clicks }}</td>
                                        <td>{{ row.impressions }}</td>
                                        <td>{{ row.ctr }}</td>

                                        <!--<td> {{ row.advertisingChannelSubType}}</td>-->
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <!--end /div-->
                        <br />
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">
                            Terminos de busqueda
                        </h4>
                        <div class="table-responsive browser_users">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <!--<th class="border-top-0">Id</th>-->
                                        <th class="border-top-0">Palabra</th>
                                        <th class="border-top-0">Grupo</th>
                                        <th class="border-top-0">Clic</th>
                                        <th class="border-top-0">
                                            Impr
                                        </th>
                                        <th class="border-top-0">CTR</th>

                                        <!-- <th class="border-top-0">AdvertisingChannelSubType</th>-->
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(row, index) in searchTerms"
                                        :key="index + 'R'"
                                    >
                                        <td>
                                            <el-popover
                                                placement="right"
                                                width="200"
                                                trigger="click"
                                            >
                                                <el-row>
                                                    <a size="mini" plain
                                                        >- Ver reporte</a
                                                    >
                                                </el-row>
                                                <el-row>
                                                    <a size="mini" plain
                                                        >- Ver configuracion</a
                                                    >
                                                </el-row>
                                                <el-button
                                                    size="mini"
                                                    slot="reference"
                                                    icon="el-icon-menu"
                                                    circle
                                                ></el-button>
                                            </el-popover>
                                            {{ row.searchTerm }}
                                        </td>
                                        <td>{{ row.adGroup }}</td>
                                        <td>{{ row.clicks }}</td>
                                        <td>{{ row.impressions }}</td>
                                        <td>{{ row.ctr }}</td>
                                        <!--<td> {{ row.advertisingChannelSubType}}</td>-->
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <!--end /div-->
                        <br />
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
    </div>
</template>

<script>
const Kpi = () => import("../../components/KpiComponent");
export default {
    props: ["campaignId"],
    components: {
        Kpi
    },
    data() {
        return {
            startDate: null,
            resource: "ads-campaign",
            records: [],
            keywords: [],
            searchTerms: [],
            ads: [],
            record: {},
            form: {},
            totalValues: {
                ctr: 0,
                clicks: 0,
                impressions: 0,
                cost: 0
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
            },
            seriesBar: [
                {
                    name: "Net Profit",
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                },
                {
                    name: "Revenue",
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                },
                {
                    name: "Free Cash Flow",
                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                }
            ],
            chartOptionsBar: {
                chart: {
                    type: "bar",
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "55%",
                        endingShape: "rounded"
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"]
                },
                xaxis: {
                    categories: [
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct"
                    ]
                },
                yaxis: {
                    title: {
                        text: "$ (thousands)"
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "$ " + val + " thousands";
                        }
                    }
                }
            }
        };
    },
    created() {
        this.getRecord();
    },
    methods: {
        getRecord() {
            this.$http
                .get(`/${this.resource}/api/record/${this.campaignId}`)
                .then(response => {
                    this.record = response.data.data;
                });
            this.$http
                .get(`/${this.resource}/record/${this.campaignId}/keywords`)
                .then(response => {
                    console.log(response);
                    this.keywords = response.data.data;
                });
            this.$http
                .get(`/${this.resource}/record/${this.campaignId}/ads`)
                .then(response => {
                    console.log(response);
                    this.ads = response.data.data;
                });
            this.$http
                .get(`/${this.resource}/record/${this.campaignId}/search_terms`)
                .then(response => {
                    console.log(response);
                    this.searchTerms = response.data.data;
                });
        }
    }
};
</script>
