<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">
                            Detalles de facturación
                        </h4>
                        <div class="table-responsive browser_users">
                            <h4>Resumen</h4>
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Detalle</th>
                                        <th class="border-top-0">Monto</th>
                                        <th class="border-top-0">Mant</th>
                                        <th class="border-top-0">IGV</th>
                                        <th class="border-top-0">SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(row, index) in resume"
                                        :key="index + 'R'"
                                    >
                                        <td>
                                            {{ index }}
                                        </td>
                                        <td>{{ row.monto }}</td>
                                        <td>{{ row.cargo }}</td>
                                        <td>{{ row.cargp }}</td>
                                        <td>{{ row.ctr }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--  -->
                        <h4>Resumen por campaña</h4>
                        <div
                            class="table-responsive browser_users"
                            v-for="(item, index) in campaigns"
                            :key="index"
                        >
                            <h4>Campaña: {{ item.campaign.name }}</h4>
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Detalle</th>
                                        <th class="border-top-0">Monto</th>
                                        <th class="border-top-0">Mant</th>
                                        <th class="border-top-0">IGV</th>
                                        <th class="border-top-0">SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(row, index) in formatResume(
                                            item.records
                                        )"
                                        :key="index"
                                    >
                                        <td>
                                            {{ index }}
                                        </td>
                                        <td>{{ row.monto }}</td>
                                        <td>{{ row.cargo }}</td>
                                        <td>{{ row.cargp }}</td>
                                        <td>{{ row.ctr }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--  -->
                        <!-- <div
                            class="col-md-12"
                            v-for="(item, index) in form.keyword"
                            :key="index"
                        >
                            <el-input
                                :placeholder="item"
                                v-model="form.keyword[index]"
                                class="input-with-select"
                            >
                                <el-button
                                    slot="append"
                                    icon="el-icon-delete"
                                    @click="form.keyword.splice(index, 1)"
                                ></el-button>
                            </el-input>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const Form = () => import("./form");
export default {
    props: {},
    components: {
        Form
    },
    data() {
        return {
            resource: "ads-billing",
            records: [],
            modalForm: false,
            data: {},
            resume: {},
            campaigns: {}
        };
    },
    created() {
        this.getRecords();
    },
    methods: {
        getRecords() {
            this.$http.get(`/${this.resource}/records`).then(response => {
                this.records = response.data;
                console.log(this.records);
                this.resume = this.formatResume(response.data);
                this.campaigns = this.formatCampaigns();
            });
        },
        formatResume(records) {
            let dict = {};
            records.map(r => {
                if (!dict[r.type])
                    dict[r.type] = {
                        monto: 0
                    };
                dict[r.type].monto += r.amount;
            });
            return dict;
        },
        formatCampaigns() {
            let dict = {};
            this.records.map(r => {
                if (!dict[r.campaign_id])
                    dict[r.campaign_id] = {
                        campaign: r.campaign,
                        records: []
                    };
                dict[r.campaign_id].records.push(r);
            });
            console.log(dict);
            return dict;
        }
    }
};
</script>
