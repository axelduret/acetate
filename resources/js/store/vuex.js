import Vue from "vue";
import Vuex from "vuex";
import user from "./modules/user";
import comment from "./modules/comment";
import menu from "./modules/menu";
import accountMenu from "./modules/account";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        user,
        comment,
        menu,
        accountMenu
    }
});
