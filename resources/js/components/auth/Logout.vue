<template></template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  methods: {
    // Vuex setters.
    ...mapActions({
      setId: "user/setId",
      setUsername: "user/setUsername",
      setFirstname: "user/setFirstname",
      setLastname: "user/setLastname",
      setEmail: "user/setEmail",
      setLanguage: "user/setLanguage",
      setTheme: "user/setTheme",
      setAvatar: "user/setAvatar",
      setApiToken: "user/setApiToken",
      setRole: "user/setRole",
      setAbilities: "user/setAbilities",
    }),
  },
  computed: mapGetters({
    getUserFields: "user/getUserFields",
  }),
  // Logout request.
  mounted() {
    axios
      .post("/api/logout/" + localStorage.getItem("user_id"))
      .then(() => {})
      .catch((errors) => {
        // Log errors.
        console.log(errors);
      })
      .finally(() => {
        // Set default theme.
        this.theme = process.env.MIX_VUE_DEFAULT_THEME;
        if (this.theme === "light") {
          this.$vuetify.theme.dark = false;
        } else if (this.theme === "dark") {
          this.$vuetify.theme.dark = true;
        }
        // Clear localStorage.
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
        // Clear vuex store.
        this.setId(null);
        this.setUsername(null);
        this.setFirstname(null);
        this.setLastname(null);
        this.setEmail(null);
        this.setLanguage(null);
        this.setTheme(this.theme);
        this.setAvatar(null);
        this.setApiToken(null);
        this.setRole(null);
        this.setAbilities(null);
        console.log("logout", this.getUserFields.theme);
        // Redirect to home route.
        this.$router.push(`/${this.$i18n.locale}/home`);
      });
  },
};
</script>

<style>
</style>