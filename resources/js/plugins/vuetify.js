import Vue from "vue";
import Vuetify from "vuetify";
import colors from "vuetify/lib/util/colors";

Vue.use(Vuetify, {
    iconfont: "mdi"
});

export default new Vuetify({
    theme: {
        themes: {
            light: {
                primary: "#455A64",
                secondary: colors.purple.lighten3,
                accent: colors.shades.black,
                error: colors.red.accent3
            },
            dark: {
                primary: "#ECEFF1",
                secondary: colors.purple.lighten3,
                accent: colors.shades.white,
                error: colors.red.accent3
            }
        }
    }
});
