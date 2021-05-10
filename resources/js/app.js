import Vue from "vue";
import Vuelidate from "vuelidate";
import vuetify from "./plugins/vuetify";
import i18n from "./plugins/vue-i18n";
import router from "./router/routes";
import store from "./store/vuex";
import App from "./App.vue";

require("./bootstrap");

Vue.use(Vuelidate);
Vue.config.productionTip = false;

// document.title = process.env.MIX_APP_NAME;
// console.log(i18n.locale);
// console.log(process.env.MIX_VUE_APP_I18N_SUPPORTED_LOCALE);

const app = new Vue({
    el: "#app",
    vuetify,
    router,
    i18n,
    store,
    render: h => h(App)
});
