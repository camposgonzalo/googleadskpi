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
                        <div class="col-md-6">
                            <el-autocomplete
                                class="inline-input"
                                v-model="formUbication.country"
                                :fetch-suggestions="queryCountrySearch"
                                placeholder="Ubicacion"
                                @select="handleSelectCountry"
                            ></el-autocomplete>
                        </div>
                        <div class="col-md-6">
                            <el-autocomplete
                                v-if="formUbication.country"
                                class="inline-input"
                                v-model="formUbication.department"
                                :fetch-suggestions="queryDepartmentSearch"
                                placeholder="Ubicacion"
                                ><el-button
                                    slot="append"
                                    icon="el-icon-plus"
                                    @click="saveLocation"
                                ></el-button
                            ></el-autocomplete>
                        </div>
                    </div>
                    <br />
                    <div
                        class="row"
                        v-for="(item, index) in locations"
                        :key="index"
                    >
                        <div class="col-md-6">
                            <label class="control-label"
                                >{{ item.country }}-{{ item.department }}
                            </label>
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
                                    <div class="col-md-4">
                                        <el-checkbox :label="item">{{
                                            item.day
                                        }}</el-checkbox>
                                    </div>
                                    <div class="col-md-4">
                                        <el-input-number
                                            v-model="item.start"
                                            controls-position="right"
                                            :min="0"
                                            :max="24"
                                            :disabled="!item.selected"
                                        ></el-input-number>
                                    </div>
                                    <div class="col-md-4">
                                        <el-input-number
                                            v-model="item.end"
                                            controls-position="right"
                                            :min="0"
                                            :max="24"
                                            :disabled="!item.selected"
                                        ></el-input-number>
                                    </div>
                                </div>
                            </el-checkbox-group>
                        </fieldset>
                    </form>
                </div>
            </div>
        </fieldset>
    </form>
</template>
<script>
export default {
    props: ["locations", "schedules", "form"],
    data() {
        return {
            checkList: [],
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
            resource: "ads-campaign"
        };
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
            // call callback function to return suggestions
            cb(results);
        },
        queryDepartmentSearch(queryString, cb) {
            var departments = this.departments;
            var results = queryString
                ? departments.filter(this.createFilter(queryString))
                : departments;
            // call callback function to return suggestions
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
        // getRecords() {
        //     this.$http.get(`/${this.resource}/records`).then(response => {
        //         this.records = response.data.data;
        //     });
        // },
        // save() {
        //     console.log(this.form);
        // }
    }
};
</script>
