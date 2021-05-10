import Vue from "vue";
import Vuelidate from "vuelidate";
import vuetify from "./plugins/vuetify";
import i18n from "./plugins/vue-i18n";
import router from "./router/routes";
import store from "./store/vuex";
import moment from "moment";
import App from "./App.vue";

require("./bootstrap");

var truncateFilter = function(text, length, clamp) {
    clamp = clamp || "...";
    var node = document.createElement("div");
    node.innerHTML = text;
    var content = node.textContent;
    return content.length > length ? content.slice(0, length) + clamp : content;
};

var subStringFilter = function(text, length) {
    var node = document.createElement("div");
    node.innerHTML = text;
    var content = node.textContent;
    return content.slice(length);
};

var dateFilter = function(value) {
    if (value) {
        const formattedDay = moment(String(value))
            .locale(i18n.locale)
            .format("dddd");
        const formattedDate = moment(String(value))
            .locale(i18n.locale)
            .format("LL");
        return (
            formattedDay.charAt(0).toUpperCase() +
            formattedDay.slice(1) +
            " " +
            formattedDate
        );
    }
};

var multipleDateFilter = function(value) {
    if (value) {
        return moment(String(value))
            .locale(i18n.locale)
            .format("LL");
    }
};

var timeFilter = function(value) {
    if (value) {
        console.log(value);
        return moment(String(value), "hh:mm:ss")
            .locale(i18n.locale)
            .format("LT");
    }
};

Vue.filter("truncate", truncateFilter);
Vue.filter("subStr", subStringFilter);
Vue.filter("formatDate", dateFilter);
Vue.filter("formatMultipleDates", multipleDateFilter);
Vue.filter("formatTime", timeFilter);

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
