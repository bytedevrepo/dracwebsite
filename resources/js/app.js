require('./bootstrap');
import Vue from 'vue'
import router from "./router";

window.Vue = require('vue').default;
Vue.component("container", require("./App.vue").default);
const app = new Vue({
    router,
    el: '#app',
});
