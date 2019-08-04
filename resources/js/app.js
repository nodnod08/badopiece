/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require("./bootstrap");

window.Vue = require('vue');
window.axios = require('axios').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('printers-component', require('./components/PrintersComponent.vue').default);
// Vue.component('cartridges-component', require('./components/CartridgesComponent.vue').default);
// Vue.component('view-component', require('./components/ViewComponent.vue').default);
// Vue.component('subscribe-component', require('./components/SubscribeComponent.vue').default);
// Vue.component('cart-component', require('./components/CartComponent.vue').default);

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate, {
    events: 'blur'
});

Vue.config.productionTip = false;

import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;

import VueApexCharts from 'vue-apexcharts';
Vue.use(VueApexCharts);
Vue.component('apexchart', VueApexCharts);

import DatePicker from 'vuejs-datepicker';
Vue.component('DatePicker', DatePicker);
import moment from 'moment';
Vue.component(moment);
import _ from 'lodash';
Vue.component(_);

// import vueFilePond from 'vue-filepond';
// Vue.use('file-pond', vueFilePond);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
