<template>
  <div>
    <v-navigation-drawer v-model="drawer" app temporary
      ><v-app-bar outlined
        ><v-app-bar-nav-icon
          class="primary--text"
          @click="drawer = !drawer"
        ></v-app-bar-nav-icon>
        <div class="rounded-sm mx-2" :class="bgLogo">
          <v-toolbar-title
            class="ml-2 mr-3 primary--text"
            style="font-family: monospace"
          >
            <v-icon class="primary--text mr-0" style="margin-bottom: 0.175rem"
              >mdi-minidisc</v-icon
            >
            {{ appName }}</v-toolbar-title
          >
        </div>
      </v-app-bar>
      <v-spacer></v-spacer>
      <v-list nav dense>
        <v-list-item-group>
          <v-list-item
            v-for="(item, index) in getMenu"
            :key="index"
            class="primary--text"
            :to="item.path"
          >
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-title>{{ $t(item.title) }}</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data: () => ({
    appName: process.env.MIX_APP_NAME,
    bgLogo: "darken-3",
    drawer: false,
    themeSwitcherTitle: "theme.switcher.light-title",
    themeSwitcherIcon: "mdi-weather-sunny",
    localeSwitcherTitle: "lang.switcher.title",
    locales: process.env.MIX_VUE_APP_I18N_SUPPORTED_LOCALE.split(","),
    accountMenuTitle: "account-menu.title",
  }),
  computed: mapGetters(["getMenu", "getLang", "getAccountMenu"]),
  methods: {
    themeSwitcher: function () {
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
      this.changeBgLogo();
      this.changeThemeSwitcherTitle();
      this.changeThemeSwitcherIcon();
    },
    changeBgLogo: function () {
      if (this.bgLogo === "darken-3") {
        this.bgLogo = "lighten-4";
      } else this.bgLogo = "darken-3";
    },
    changeThemeSwitcherTitle: function () {
      if (this.themeSwitcherTitle === "theme.switcher.light-title") {
        this.themeSwitcherTitle = "theme.switcher.dark-title";
      } else this.themeSwitcherTitle = "theme.switcher.light-title";
    },
    changeThemeSwitcherIcon: function () {
      if (this.themeSwitcherIcon === "mdi-weather-sunny") {
        this.themeSwitcherIcon = "mdi-weather-night";
      } else this.themeSwitcherIcon = "mdi-weather-sunny";
    },
    localeSwitcher: function (locale) {
      if (this.$i18n.locale !== locale) {
        this.$i18n.locale = locale;
        const to = this.$router.resolve({ params: { locale } });
        this.$router.push(to.location);
      }
      document.querySelector("html").setAttribute("lang", locale);
    },
  },
  beforeCreate() {
    document.querySelector("html").setAttribute("lang", this.$i18n.locale);
  },
  created() {
    this.$vuetify.theme.dark = true;
  },
};
</script>

<style>
</style>