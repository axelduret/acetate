const state = {
    menu: [
        {
            title: "menu.home.title",
            path: "home",
            icon: "mdi-home"
        },
        {
            title: "menu.account.title",
            path: "account",
            icon: "mdi-account"
        }
    ]
};
const getters = {
    getMenu: state => state.menu
};
const actions = {};
const mutations = {};

export default {
    state,
    getters,
    actions,
    mutations
};
