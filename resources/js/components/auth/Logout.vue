<template></template>

<script>
import { mapActions } from "vuex";
export default {
  methods: {
    ...mapActions({
      setId: "user/setId",
      setUsername: "user/setUsername",
      setFirstname: "user/setFirstname",
      setLastname: "user/setLastname",
      setEmail: "user/setEmail",
      setLanguage: "user/setLanguage",
      setTheme: "user/setTheme",
      setThemeSwitch: "user/setThemeSwitch",
      setAvatar: "user/setAvatar",
      setApiToken: "user/setApiToken",
      setRole: "user/setRole",
      setAbilities: "user/setAbilities",
    }),
  },
  mounted() {
    axios
      .post("/api/logout/" + localStorage.getItem("user_id"))
      .then(() => {})
      .catch((errors) => {
        console.log(errors);
      })
      .finally(() => {
        this.theme = process.env.MIX_VUE_DEFAULT_THEME;
        if (this.theme === "light") {
          this.$vuetify.theme.light = true;
        }
        if (this.theme === "dark") {
          this.$vuetify.theme.dark = true;
        }
        localStorage.removeItem("user_id");
        localStorage.removeItem("user_username");
        localStorage.removeItem("user_firstname");
        localStorage.removeItem("user_lastname");
        localStorage.removeItem("user_email");
        localStorage.removeItem("user_language");
        localStorage.removeItem("user_theme");
        localStorage.removeItem("user_avatar");
        localStorage.removeItem("user_api_token");
        localStorage.removeItem("user_role");
        localStorage.removeItem("user_abilities");
        this.setId(null);
        this.setUsername(null);
        this.setFirstname(null);
        this.setLastname(null);
        this.setEmail(null);
        this.setLanguage(null);
        this.setTheme(null);
        this.setAvatar(null);
        this.setApiToken(null);
        this.setRole(null);
        this.setAbilities(null);
        this.$router.push(`/${this.$i18n.locale}/home`);
      });
  },
};
</script>

<style>
</style>