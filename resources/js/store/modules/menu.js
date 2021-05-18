const state = {
    menu: [
        {
            title: "menu.home.title",
            path: "home",
            icon: "mdi-home"
        },
        {
            title: "menu.events.title",
            path: "events",
            icon: "mdi-calendar-clock"
        },
        {
            title: "menu.post_events.title",
            path: "admin/events/post",
            icon: "mdi-calendar-plus"
        },
        {
            title: "menu.people.title",
            path: "people",
            icon: "mdi-calendar-account"
        },
        {
            title: "menu.venues.title",
            path: "venues",
            icon: "mdi-office-building-marker"
        },
        {
            title: "menu.users.title",
            path: "users",
            icon: "mdi-account-group"
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
