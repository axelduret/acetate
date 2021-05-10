<template>
  <div>
    <v-app-bar app outlined
      ><v-app-bar-nav-icon
        :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
        @click.stop="$emit('toggle-drawer')"
      ></v-app-bar-nav-icon>
      <div
        class="rounded-sm mx-2"
        :class="$vuetify.theme.dark ? 'darken-3' : 'lighten-4'"
      >
        <v-toolbar-title
          :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
          style="font-family: monospace"
        >
          <v-icon
            class="flaticon-music-disc-with-white-curve-details mr-0"
            :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
            style="margin-bottom: 0.175rem"
          ></v-icon>
          {{ appName }}</v-toolbar-title
        >
      </div>
      <v-spacer></v-spacer>
      <div
        :title="
          $vuetify.theme.dark
            ? $t('theme.switcher.light-title')
            : $t('theme.switcher.dark-title')
        "
        :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
        style="margin-top: 1.32rem"
      >
        <v-switch
          inset
          v-model="themeSwitch"
          :prepend-icon="
            $vuetify.theme.dark ? 'mdi-weather-sunny' : 'mdi-weather-night'
          "
          @click="themeSwitcher"
        ></v-switch>
      </div>
      <div :title="$t(localeSwitcherTitle)">
        <v-menu bottom offset-y>
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
              icon
              v-bind="attrs"
              v-on="on"
            >
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
            <v-btn
              :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
              icon
              v-bind="attrs"
              v-on="on"
            >
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
    // App name.
    appName: process.env.MIX_APP_NAME,
    // Sidebar.
    drawer: false,
    // Theme switch active.
    themeSwitch: true,
    // Locale switch title.
    localeSwitcherTitle: "lang.switcher.title",
    // Available locales.
    locales: process.env.MIX_VUE_APP_I18N_SUPPORTED_LOCALE.split(","),
    // Account menu title.
    accountMenuTitle: "account-menu.title",
  }),
  // Get locale and account menu contents.
  computed: mapGetters(["getLang", "getAccountMenu"]),
  methods: {
    // Set default theme.
    defaultTheme: function () {
      const defaultTheme = process.env.MIX_VUE_DEFAULT_THEME;
      if (defaultTheme === "light") {
        this.$vuetify.theme.light = true;
        this.themeSwitch = true;
      }
      if (defaultTheme === "dark") {
        this.$vuetify.theme.dark = true;
        this.themeSwitch = false;
      }
    },
    // Theme switch.
    themeSwitcher: function () {
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
    },
    // Locale switch.
    localeSwitcher: function (locale) {
      if (this.$i18n.locale !== locale) {
        this.$i18n.locale = locale;
        const to = this.$router.resolve({ params: { locale } });
        this.$router.push(to.location);
      }
      // Set html lang attribute.
      document.querySelector("html").setAttribute("lang", locale);
    },
  },
  beforeCreate() {
    // Set html lang attribute.
    document.querySelector("html").setAttribute("lang", this.$i18n.locale);
  },
  created() {
    // Set default theme.
    this.defaultTheme();
  },
};
</script>

<style>
</style>