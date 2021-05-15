<template>
  <div>
    <div v-if="errors" class="error my-1 px-4 white--text py-2 rounded">
      {{ errors }}
    </div>
    <!-- loading -->
    <v-overlay
      :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
      :opacity="0.1"
      :value="overlay"
    >
      <v-progress-circular indeterminate size="90">
        <span
          class="caption"
          :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
          >{{ $t("loading") }}</span
        >
      </v-progress-circular>
    </v-overlay>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      overlay: true,
      // App url.
      appURL: process.env.MIX_APP_URL,
      // Base url.
      baseURL: process.env.MIX_BASE_URL,
      errors: false,
    };
  },
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
    if (localStorage.getItem("user_id") !== null) {
      axios
        .post(this.baseURL + "api/logout/" + localStorage.getItem("user_id"))
        .then(() => {
          // Clear localStorage.
          localStorage.removeItem("user_id");
          localStorage.removeItem("user_username");
          localStorage.removeItem("user_firstname");
          localStorage.removeItem("user_lastname");
          localStorage.removeItem("user_email");
          localStorage.removeItem("user_language");
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
          this.setAvatar(null);
          this.setApiToken(null);
          this.setRole(null);
          this.setAbilities(null);
          // Redirect to home route.
          this.$router.push(`${this.baseURL}${this.$i18n.locale}/home`);
        })
        .catch((errors) => {
          // Returns errors.
          this.overlay = false;
          this.errors = this.$t("errors.logout.wrong");
        })
        .finally(() => {});
    } else {
      this.overlay = false;
      this.errors = this.$t("errors.logout.null");
    }
  },
};
</script>

<style>
</style>