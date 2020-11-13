<template>
    <form autocomplete="off">
        <fieldset class="border p-2">
            <legend class="w-auto">
                Confguración de la campaña
            </legend>
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <fieldset class="border p-2">
                            <legend class="w-auto">
                                Ingrese su presupuesto mensual
                            </legend>
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"
                                            >Calculadora de costos
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <el-input v-model="form.monthly_cost"
                                            ><template slot="prepend"
                                                >Mensual</template
                                            ></el-input
                                        >
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <el-input v-model="form.daily_cost"
                                            ><template slot="prepend"
                                                >Diario</template
                                            ></el-input
                                        >
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"
                                            >Total a pagar:
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ubigeo" class="control-label"
                                >Ubicación</label
                            >
                            <br />
                            <el-cascader
                                v-model="form.locations"
                                :value="locations"
                                :options="all_locations"
                                :props="props"
                                filterable
                                clearable
                                class="w-100"
                            ></el-cascader>
                            <!-- <small class="form-control-feedback" v-if="errors.location_id" v-text="errors.location_id[0]"></small> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form autocomplete="off">
                        <fieldset class="border p-2">
                            <legend class="w-auto">
                                Programación de anuncios
                            </legend>
                            <el-checkbox-group v-model="checkList">
                                <div
                                    class="row"
                                    v-for="(item, index) in schedules"
                                    :key="index"
                                    @change="item.selected = !item.selected"
                                >
                                    <div class="col-md-3">
                                        <el-checkbox
                                            :label="item"
                                            :checked="item.selected"
                                            >{{ item.day }}</el-checkbox
                                        >
                                    </div>
                                    <div class="col-md-6">
                                        <el-time-picker
                                            is-range
                                            v-model="item.range"
                                            range-separator="A"
                                            start-placeholder="Hora inicio"
                                            end-placeholder="Hora fin"
                                            format="HH:mm A"
                                            value-format="HH:mm A"
                                            :disabled="!item.selected"
                                        >
                                        </el-time-picker>
                                    </div>
                                </div>
                            </el-checkbox-group>
                        </fieldset>
                    </form>
                    <br />
                    <div class="row" v-if="showGoogleId">
                        <div class="col-md-12">
                            <el-input v-model="form.campaign_id"
                                ><template slot="prepend"
                                    >Google Id</template
                                ></el-input
                            >
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</template>
<script>
export default {
    props: ["locations", "schedules", "form", "showGoogleId"],
    data() {
        return {
            checkList: [],
            props: { multiple: true },
            formUbication: {},
            departments: [],
            countrys: [
                {
                    value: "Pais1",
                    departments: [{ value: "D1.1" }, { value: "D2.1" }]
                },
                {
                    value: "Pais2",
                    departments: [{ value: "D2.1" }, { value: "D2.2" }]
                }
            ],
            current_locations: [],
            countries: [],
            all_departments: [],
            all_provinces: [],
            all_districts: [],
            all_locations: [],
            resource: "ads-campaign"
        };
    },
    created() {
        console.log(this.schedules);
        this.$http.get(`/tables/locations`).then(response => {
            this.countries = response.data.countries;
            this.all_departments = response.data.departments;
            this.all_provinces = response.data.provinces;
            this.all_districts = response.data.districts;
            this.all_locations = response.data.locations;
        });
    },
    methods: {
        handleSelectCountry(item) {
            this.departments = item.departments;
        },
        saveLocation() {
            this.locations.push(this.formUbication);
            this.formUbication = {};
        },
        queryCountrySearch(queryString, cb) {
            var countrys = this.countrys;
            var results = queryString
                ? countrys.filter(this.createFilter(queryString))
                : countrys;
            cb(results);
        },
        queryDepartmentSearch(queryString, cb) {
            var departments = this.departments;
            var results = queryString
                ? departments.filter(this.createFilter(queryString))
                : departments;
            cb(results);
        },
        createFilter(queryString) {
            return link => {
                return (
                    link.value
                        .toLowerCase()
                        .indexOf(queryString.toLowerCase()) === 0
                );
            };
        }
    }
};
</script>
