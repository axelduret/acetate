import Vue from "vue";
import Vuelidate from "vuelidate";
import vuetify from "./plugins/vuetify";
import i18n from "./plugins/vue-i18n";
import router from "./router/routes";
import store from "./store/vuex";
import App from "./App.vue";
import {
    truncateFilter,
    subStringFilter,
    dateFilter,
    multipleDateFilter,
    timeFilter
} from "./utils/filters";

// Laravel required.
require("./bootstrap");

Vue.config.productionTip = false;

// Validation.
Vue.use(Vuelidate);

// Custom filters.
Vue.filter("truncate", truncateFilter);
Vue.filter("subStr", subStringFilter);
Vue.filter("formatDate", dateFilter);
Vue.filter("formatMultipleDates", multipleDateFilter);
Vue.filter("formatTime", timeFilter);

// VueJs rendering.
const app = new Vue({
    el: "#app",
    vuetify,
    router,
    i18n,
    store,
    render: h => h(App)
});
