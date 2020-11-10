/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';

import Axios from 'axios'

import lang from 'element-ui/lib/locale/lang/es'
import locale from 'element-ui/lib/locale'
locale.use(lang)

import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts)

Vue.component('apexchart', VueApexCharts)

//Vue.use(ElementUI)
Vue.use(ElementUI, { size: 'small' })
Vue.prototype.$eventHub = new Vue()
Vue.prototype.$http = Axios

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('campaigns-index', require('./views/campaigns/index.vue').default);
Vue.component('campaigns-information', require('./views/campaigns/information.vue').default);
Vue.component('campaigns-configuration', require('./views/campaigns/configuration.vue').default);
Vue.component('campaigns-details', require('./views/campaigns/details.vue').default);
Vue.component('campaigns-form', require('./views/campaigns/form.vue').default);


Vue.component('dashboard-index', require('./views/dashboard/index.vue').default);
Vue.component('account-index', require('./views/account/index.vue').default);
Vue.component('requests-index', require('./views/requests/index.vue').default);
Vue.component('users-index', require('./views/users/index.vue').default);
Vue.component('users-form', require('./views/users/form.vue').default);
Vue.component('requests-form', require('./views/requests/form.vue').default);
Vue.component('requests-edit', require('./views/requests/edit.vue').default);
Vue.component('requests-modify', require('./views/requests/modify.vue').default);
Vue.component('billings-index', require('./views/billings/index.vue').default);
Vue.component('billings-details', require('./views/billings/details.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#main-wrapper',
});
