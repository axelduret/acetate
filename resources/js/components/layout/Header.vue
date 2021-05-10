<template>
  <div>
    <v-app-bar app outlined
      ><v-app-bar-nav-icon
        class="primary--text"
        @click.stop="$emit('toggle-drawer')"
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
      <v-spacer></v-spacer>
      <div :title="$t(themeSwitcherTitle)" style="margin-top: 1.32rem">
        <v-switch
          inset
          :prepend-icon="themeSwitcherIcon"
          @click="themeSwitcher"
        ></v-switch>
      </div>
      <div :title="$t(localeSwitcherTitle)">
        <v-menu bottom offset-y>
          <template v-slot:activator="{ on, attrs }">
            <v-btn class="primary--text" icon v-bind="attrs" v-on="on">
              <v-icon>mdi-web</v-icon>
            </v-btn>
          </template>
          <v-list>
            <v-list-item-group v-model="$i18n.locale" mandatory>
              <v-list-item
                v-for="(locale, index) in locales"
                :value="locale"
                :key="index"
                @click="localeSwitcher(locale)"
              >
                <v-list-item-title>{{
                  $t("lang." + locale)
                }}</v-list-item-title>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-menu>
      </div>
      <div :title="$t(accountMenuTitle)">
        <v-menu bottom offset-y>
          <template v-slot:activator="{ on, attrs }">
            <v-btn class="primary--text" icon v-bind="attrs" v-on="on">
              <v-icon>mdi-account-circle</v-icon>
            </v-btn>
          </template>
          <v-list>
            <v-list-item
              v-for="(item, index) in getAccountMenu"
              :key="index"
              :to="item.path"
            >
              <v-list-item-title>{{ $t(item.title) }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </div>
    </v-app-bar>
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