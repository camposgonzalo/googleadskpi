<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">
                            Detalles de facturación
                        </h4>
                        <div class="media-body align-self-center">
                            <p class="mb-0 text-muted font-14">
                                BALANCE MENSUAL :
                                {{ monthNames[detailId.substring(4, 6) - 1] }}
                            </p>
                        </div>
                        <div class="media-body align-self-center">
                            <p class="mb-0 text-muted font-14">
                                Comprobante : #{{ detailId }}
                            </p>
                        </div>
                        <div class="media-body align-self-center">
                            <p class="mb-0 text-muted font-14">
                                Cliente : {{ user.name }}
                            </p>
                        </div>
                        <div class="media-body align-self-center">
                            <p class="mb-0 text-muted font-14">
                                Correo : {{ user.email }}
                            </p>
                        </div>
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
                                        <td>
                                            {{
                                                index == "Pago" ||
                                                index == "Consumo"
                                                    ? row.monto / 10
                                                    : 0
                                            }}
                                        </td>
                                        <td>{{ row.igv }}</td>
                                        <td>
                                            {{
                                                row.monto +
                                                    row.igv +
                                                    (index == "Pago" ||
                                                    index == "Consumo"
                                                        ? row.monto / 10
                                                        : 0)
                                            }}
                                        </td>
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
                                            item.records,
                                            item.costs
                                        )"
                                        :key="index"
                                    >
                                        <td>
                                            {{ index }}
                                        </td>
                                        <td>{{ row.monto }}</td>
                                        <td>
                                            {{
                                                index == "Pago" ||
                                                index == "Consumo"
                                                    ? row.monto / 10
                                                    : 0
                                            }}
                                        </td>
                                        <td>{{ row.igv }}</td>
                                        <td>
                                            {{
                                                row.monto +
                                                    row.igv +
                                                    (index == "Pago" ||
                                                    index == "Consumo"
                                                        ? row.monto / 10
                                                        : 0)
                                            }}
                                        </td>
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
export default {
    props: ["detailId"],
    data() {
        return {
            monthNames: [
                "ENERO",
                "FEBRERO",
                "MARZO",
                "ABRIL",
                "MAYO",
                "JUNIO",
                "JULIO",
                "AGOSTO",
                "SETIEMBRE",
                "OCTUBRE",
                "NOVIEMBRE",
                "DICIEMBRE"
            ],
            resource: "ads-billing",
            records: [],
            costs: [],
            modalForm: false,
            data: {},
            resume: {},
            campaigns: {},
            user: {}
        };
    },
    created() {
        this.getRecords();
        this.getUser();
    },
    methods: {
        getUser() {
            this.$http
                .get(
                    `/ads-user/record/${this.detailId.substring(
                        6,
                        this.detailId.length
                    )}`
                )
                .then(response => {
                    this.user = response.data;
                });
        },
        getRecords() {
            this.$http
                .get(
                    `/${this.resource}/user/${this.detailId.substring(
                        6,
                        this.detailId.length
                    )}/period/${this.detailId.substring(0, 6)}/records`
                )
                .then(response => {
                    this.records = response.data.bills;
                    this.costs = response.data.costs;
                    this.resume = this.formatResume(
                        response.data.bills,
                        response.data.costs
                    );
                    this.campaigns = this.formatCampaigns();
                });
        },
        formatResume(records, costs) {
            let dict = {};
            records.map(r => {
                if (!dict[r.type])
                    dict[r.type] = {
                        monto: 0,
                        igv: 0
                    };
                if (r.campaign.apply_billing)
                    dict[r.type].igv += (r.amount * 18) / 100;
                dict[r.type].monto += r.amount;
            });
            costs.map(r => {
                if (!dict["Consumo"])
                    dict["Consumo"] = {
                        monto: 0,
                        igv: 0
                    };
                if (r.campaign.apply_billing)
                    dict["Consumo"].igv += (r.cost * 18) / 100;
                dict["Consumo"].monto += parseFloat(r.cost);
            });
            return dict;
        },
        formatCampaigns() {
            let dict = {};
            this.records.map(r => {
                if (!dict[r.campaign_id])
                    dict[r.campaign_id] = {
                        campaign: r.campaign,
                        records: [],
                        costs: []
                    };
                dict[r.campaign_id].records.push(r);
            });
            this.costs.map(c => {
                if (!dict[c.campaign.id])
                    dict[c.campaign.id] = {
                        campaign: c,
                        records: [],
                        costs: []
                    };
                dict[c.campaign.id].costs.push(c);
            });
            return dict;
        }
    }
};
</script>
