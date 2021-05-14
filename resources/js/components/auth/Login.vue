<template>
  <v-container>
    <v-row justify="center" class="mt-4">
      <v-col sm="7">
        <form @submit.prevent>
          <v-card>
            <v-card-text>
              <v-text-field
                v-model.trim="formData.email"
                type="email"
                autocomplete="on"
                :label="$t('form.label.email')"
              ></v-text-field>
              <v-text-field
                v-model="formData.password"
                :label="$t('form.label.password')"
                autocomplete="on"
                :append-icon="showPw ? 'mdi-eye-off' : 'mdi-eye'"
                :type="showPw ? 'text' : 'password'"
                @click:append="showPw = !showPw"
              ></v-text-field
              ><!-- 
            <div
              v-if="success"
              class="success my-1 px-4 white--text py-2 rounded"
            >
              {{ success.message }}
            </div>
            <div
              v-if="role"
              class="my-1 px-4 py-2 rounded"
              :class="
                $vuetify.theme.dark
                  ? 'info appBackground--text'
                  : 'info white--text'
              "
            >
              Role : {{ role }}
            </div> -->
              <div
                v-if="errors"
                class="error my-1 px-4 white--text py-2 rounded"
              >
                {{ $t("errors.login.message") }}
              </div>
            </v-card-text>
            <v-divider class="mt-2"></v-divider>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                @click="login"
                text
                color="info accent-4"
                class="mr-4"
                type="submit"
              >
                submit
              </v-btn>
            </v-card-actions>
          </v-card>
        </form>
      </v-col>
    </v-row></v-container
  >
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      formData: {
        email: "",
        password: "",
      },
      passwordConfirm: "",
      showPw: false,
      errors: false,
    };
  },
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
    login() {
      axios
        .post("/api/login", this.formData)
        .then((response) => {
          this.errors = false;
          this.userId = response.data.data.user.id;
          this.username = response.data.data.user.username;
          this.firstname = response.data.data.user.firstname;
          this.lastname = response.data.data.user.lastname;
          this.email = response.data.data.user.email;
          this.language = response.data.data.user.language;
          this.theme = response.data.data.user.theme;
          this.avatar = response.data.data.user.avatar;
          this.token = response.data.data.user.api_token;
          this.role = response.data.data.user.role[0].name;
          this.abilities = response.data.data.user.abilities;
        })
        .catch((errors) => {
          this.errors = true; // errors.response.data
        })
        .finally(() => {
          if (this.theme === "light") {
            this.$vuetify.theme.light = true;
          }
          if (this.theme === "dark") {
            this.$vuetify.theme.dark = true;
          }
          localStorage.setItem("user_id", this.userId);
          localStorage.setItem("user_username", this.username);
          localStorage.setItem("user_firstname", this.firstname);
          localStorage.setItem("user_lastname", this.lastname);
          localStorage.setItem("user_email", this.email);
          localStorage.setItem("user_language", this.language);
          localStorage.setItem("user_theme", this.theme);
          localStorage.setItem("user_avatar", this.avatar);
          localStorage.setItem("user_api_token", this.token);
          localStorage.setItem("user_role", this.role);
          localStorage.setItem("user_abilities", this.abilities);
          this.setId(this.userId);
          this.setUsername(this.username);
          this.setFirstname(this.firstname);
          this.setLastname(this.lastname);
          this.setEmail(this.email);
          this.setLanguage(this.language);
          this.setTheme(this.theme);
          this.setTheme(this.themeSwitch);
          this.setAvatar(this.avatar);
          this.setApiToken(this.token);
          this.setRole(this.role);
          this.setAbilities(this.abilities);
          this.$router.push(`/${this.$i18n.locale}/dashboard`);
        });
    },
  },
};
</script>
  
<style>
</style>