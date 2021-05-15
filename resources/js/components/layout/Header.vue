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
            :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
            style="margin-bottom: 0.175rem"
          ></v-icon
          ><span
            class="app_title"
            :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
          >
            {{ appName }}</span
          >
        </v-toolbar-title>
      </div>
      <v-spacer></v-spacer>
      <div
        :title="
          $vuetify.theme.dark
            ? $t('theme.switcher.light-title')
            : $t('theme.switcher.dark-title')
        "
        style="margin-top: 1.32rem"
      >
        <v-switch
          inset
          v-model="themeSwitch"
          :prepend-icon="
            $vuetify.theme.dark
              ? 'mdi-white-balance-sunny'
              : 'mdi-weather-night'
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
              <v-avatar size="30">
                <img
                  v-if="getUserFields.avatar != null"
                  alt="Avatar"
                  :src="appURL + baseURL + getUserFields.avatar"
                /><v-icon v-else>mdi-account-circle</v-icon>
              </v-avatar>
            </v-btn>
          </template>
          <v-list>
            <v-list-item
              v-for="(item, index) in getAccountMenu"
              :key="index"
              :to="'/' + $i18n.locale + '/' + item.path"
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
import { mapGetters, mapActions } from "vuex";
import { setHtmlDirectionPerLocale, setHtmlLang } from "../../utils/html-i18n";
export default {
  data: () => ({
    // App name.
    appName: process.env.MIX_APP_NAME,
    // App url.
    appURL: process.env.MIX_APP_URL,
    // Base url.
    baseURL: process.env.MIX_BASE_URL,
    // Sidebar.
    drawer: false,
    // Locale switch title.
    localeSwitcherTitle: "lang.switcher.title",
    // Available locales.
    locales: process.env.MIX_VUE_APP_I18N_SUPPORTED_LOCALE.split(","),
    // Account menu title.
    accountMenuTitle: "account-menu.title",
    language: null,
    defaultTheme: process.env.MIX_VUE_DEFAULT_THEME,
    userTheme: null,
    themeSwitch: true,
    avatar: null,
  }),
  // Get locale and account menu contents.
  computed: mapGetters({
    getLang: "getLang",
    getAccountMenu: "getAccountMenu",
    getUserFields: "user/getUserFields",
  }),
  methods: {
    ...mapActions({
      setLanguage: "user/setLanguage",
      setTheme: "user/setTheme",
      setAvatar: "user/setAvatar",
    }),
    // Theme switch.
    themeSwitcher: function () {
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
      this.setTheme(this.$vuetify.theme);
      console.log("themeSwitcher", this.getUserFields.theme);
    },
    // Locale switch.
    localeSwitcher: function (locale) {
      if (this.$i18n.locale !== locale) {
        this.$i18n.locale = locale;
        const to = this.$router.resolve({ params: { locale } });
        this.$router.push(to.location);
      }
    },
  },
  mounted() {
    // Set Html lang attribute in DOM.
    this.$watch(
      "$i18n.locale",
      (newLocale, oldLocale) => {
        if (newLocale === oldLocale) {
          return;
        }
        console.log("new lang");
        setHtmlDirectionPerLocale(newLocale);
        setHtmlLang(newLocale);
      },
      { immediate: true }
    );

    // Set Avatar path in store.
    this.avatar = localStorage.getItem("user_avatar");
    !!this.avatar ? this.setAvatar(this.avatar) : null;

    // TODO Set locale in store.
    this.language = localStorage.getItem("user_language");
    !!this.language ? this.setLanguage(this.language) : null;

    // TODO Set theme in store.
    if (this.getUserFields.theme !== null) {
      this.$vuetify.theme = this.getUserFields.theme;
    }

    //this.setTheme(this.theme);

    /*   
    if (localStorage.getItem("user_theme") === null) {
      this.theme = process.env.MIX_VUE_DEFAULT_THEME;
    } else {
      this.theme = localStorage.getItem("user_theme");
    }
    if (this.theme === "light") {
      this.$vuetify.theme.light = true;
      this.themeSwitch = true;
    } else if (this.theme === "dark") {
      this.$vuetify.theme.dark = true;
      this.themeSwitch = false;
    } */
  },
};
</script>

<style>
</style>