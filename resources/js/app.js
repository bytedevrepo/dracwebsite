require('./bootstrap');
import Vue from 'vue'
import router from "./router";
Vue.prototype.$asset_url = window.ASSET_URL;
window.Vue = require('vue').default;
Vue.component("container", require("./App.vue").default);
const app = new Vue({
    router,
    el: '#app',
});
