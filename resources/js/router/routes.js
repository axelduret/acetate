import Vue from "vue";
import VueRouter from "vue-router";
import i18n from "../plugins/vue-i18n";

function loadPage(component) {
    return () => import(`../components/${component}.vue`);
}

Vue.use(VueRouter);

const routes = [
    {
        path: "/:locale",
        component: {
            template: "<router-view></router-view>"
        },
        beforeEnter: (to, from, next) => {
            const locale = to.params.locale;
            const supported_locales = process.env.MIX_VUE_APP_I18N_SUPPORTED_LOCALE.split(
                ","
            );
            if (!supported_locales.includes(locale))
                return next(
                    process.env.MIX_VUE_APP_I18N_DEFAULT_LOCALE + "/home"
                );
            if (i18n.locale !== locale) {
                i18n.locale = locale;
            }
            return next();
        },
        children: [
            {
                path: "home",
                name: "Home",
                component: loadPage("pages/Home"),
                meta: {
                    title: "main.title"
                }
            },
            {
                path: "events",
                name: "Events",
                component: loadPage("pages/Events")
            },
            {
                path: "events/:id",
                name: "Event",
                props: true,
                component: loadPage("pages/Event")
            },
            {
                path: "people",
                name: "People",
                component: loadPage("pages/People")
            },
            {
                path: "venues",
                name: "Venues",
                component: loadPage("pages/Venues")
            },
            {
                path: "users",
                name: "Users",
                component: loadPage("pages/Users")
            },
            {
                path: "register",
                name: "Register",
                component: loadPage("pages/Register")
            },
            {
                path: "login",
                name: "Login",
                component: loadPage("pages/Login")
            },
            {
                path: "dashboard",
                name: "Dashboard",
                component: loadPage("pages/Dashboard")
            },
            {
                path: "*",
                component: loadPage("errors/NotFound")
            }
        ]
    },
    {
        path: "*",
        redirect() {
            return process.env.MIX_VUE_APP_I18N_LOCALE + "/home";
        }
    }
];

const router = new VueRouter({
    mode: "history",
    base: process.env.MIX_BASE_URL,
    routes
});

export default router;
