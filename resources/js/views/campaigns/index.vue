<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">
                        Campañas disponibles
                    </h4>
                    <div class="table-responsive browser_users">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <!--<th class="border-top-0">Id</th>-->
                                    <th class="border-top-0">Estado</th>

                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Status</th>

                                    <th class="border-top-0">ServingStatus</th>
                                    <th class="border-top-0">AdvertisingChannelType</th>
                                    <th class="border-top-0">AdvertisingChannelSubType</th>
                                </tr>
                                <!--end tr-->
                            </thead>
                            <tbody>
                                <tr v-for="(row, index) in records" :key="index + 'R'">
                                    <!--<td>
                                        {{ row.id}}
                                    </td>-->
                                    <td>
                                        <el-switch  v-model="row.status_2">
                                        </el-switch>

                                        <el-popover
                                            placement="right"
                                            width="200"
                                            trigger="click">
                                            <el-row>
                                                <a :href="`/ads-campaign/information/${row.id}`" size="mini" plain>Información</a>
                                            </el-row>

                                            <el-button size="mini" slot="reference" icon="el-icon-menu" circle></el-button>
                                        </el-popover>
                                    </td>
                                    <td>
                                        {{row.name}}
                                    </td>
                                    <td>{{ row.status }}</td>

                                    <td> {{ row.servingStatus}}</td>
                                    <td> {{ row.advertisingChannelType}}</td>
                                    <td> {{ row.advertisingChannelSubType}}</td>

                                </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                    <!--end /div-->
                    <br>
                    <a href="/ads-campaign/create"  class="btn btn-sm btn-gradient-primary float-right" onclick="update()">Nueva Campaña</a>
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
            value1:true
        }
    },
    created(){
        this.getRecords()
    },
    methods:{
        getRecords()
        {
            this.$http.get(`/${this.resource}/records`)
                    .then(response => {
                        this.records = response.data.data
                    })
        },
        viewInformation(id)
        {
            location.href
        }
    }

}
</script>
