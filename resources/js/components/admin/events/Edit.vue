<template>
  <form id="myForm" @submit.prevent class="mt-4">
    <v-card max-width="800px" class="mx-auto">
      <v-card-title class="title greybg primary--text">
        <div>{{ $t("admin.edit.title") }}</div>
      </v-card-title>
      <v-card-text>
        <input type="hidden" id="formId" v-model="form.id" />
        <input type="hidden" id="formUserId" v-model="form.user_id" />
        <v-text-field
          class="mx-4 px-2 my-4 primary--text"
          type="text"
          id="formName"
          v-model="form.name"
          clearable
          required
          counter="100"
          label="Name"
        ></v-text-field>
        <v-textarea
          class="mx-4 my-4 primary--text"
          outlined
          id="formText"
          height="400"
          clearable
          auto-grow
          v-model="form.description"
        ></v-textarea>
      </v-card-text>
      <v-divider class="mt-2"></v-divider>
      <v-card-actions>
        <v-btn class="primary--text" text @click="historyBack()">cancel</v-btn>
        <v-spacer></v-spacer>
        <v-btn
          @click="submit"
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
</template>

<script>
export default {
  props: { id: String },
  data() {
    return {
      event: "",
      form: {
        id: this.id,
        name: "",
        description: "",
        user_id: localStorage.getItem("user_id"),
      },
      // App url.
      appURL: process.env.MIX_APP_URL,
      // Base url.
      baseURL: process.env.MIX_BASE_URL,
      apiToken: localStorage.getItem("user_api_token"),
      errors: false,
    };
  },
  methods: {
    // PATCH
    submit() {
      if (!this.errors) {
        const config = {
          headers: {
            Authorization: "Bearer " + this.apiToken,
          },
        };
        axios
          .patch(this.baseURL + "api/events/" + this.id, this.form, config)
          .then(
            function () {
              this.historyBack();
            }.bind(this)
          )
          .catch(function (error) {
            console.log(error);
          });
      }
    },
    // GET
    fetchAPI() {
      axios
        .request({
          url: this.id,
          method: "get",
          baseURL: this.baseURL + "api/events/",
          headers: {
            Authorization: "Bearer " + this.apiToken,
          },
        })
        .then((response) => {
          this.event = response.data.data.event;
          this.form.name = this.event.name;
          this.form.description = this.event.description;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {});
    },
    historyBack() {
      this.$router.go(-1);
    },
  },
  mounted() {
    this.fetchAPI();
  },
};
</script>

<style>
</style>