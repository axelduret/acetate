const state = {
    accountMenu: [
        {
            title: "account-menu.login.title",
            path: "login"
        },
        {
            title: "account-menu.register.title",
            path: "register"
        },
        {
            title: "account-menu.logout.title",
            path: "logout"
        },
        {
            title: "account-menu.dashboard.title",
            path: "dashboard"
        }
    ]
};
const getters = {
    getAccountMenu: state => state.accountMenu
};
const actions = {};
const mutations = {};

export default {
    state,
    getters,
    actions,
    mutations
};
