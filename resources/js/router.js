import Vue from "vue";
import VueRouter from "vue-router";
import HomePage from "./pages/HomePage";
import Page from "./pages/Page";

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {name: "Home", path: "", components: {default: HomePage}},
        {name: "Page", path: "/:slug", components: {default: Page}},
    ]
});
