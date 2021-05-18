<template>
  <div>
    <!-- Dialog -->
    <v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-title class="title greybg primary--text">
          New Comment
        </v-card-title>

        <div
          v-if="errors"
          class="error mx-4 mt-4 px-4 white--text py-2 rounded"
        >
          {{ $t("errors.comment.message") }}
        </div>
        <v-textarea
          class="mx-4 my-4 primary--text"
          outlined
          v-model.trim="formData.text"
        ></v-textarea>
        <!-- 
        <v-divider></v-divider> -->
        <v-card-actions>
          <v-btn class="primary--text" text @click="closeDialog()"
            >cancel</v-btn
          >
          <v-spacer></v-spacer>
          <v-btn color="info" text @click="postComment()">submit</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  props: {
    Id: Number,
  },
  data() {
    return {
      dialog: false,
      formData: {
        text: "",
        user_id: localStorage.getItem("user_id"),
      },
      appURL: process.env.MIX_APP_URL,
      baseURL: process.env.MIX_BASE_URL,
      apiToken: localStorage.getItem("user_api_token"),
      errors: false,
    };
  },
  methods: {
    postComment() {
      axios
        .post(
          this.baseURL + "api/events/" + this.Id + "/comments",
          this.formData,
          {
            headers: {
              Authorization: "Bearer " + this.apiToken,
            },
          }
        )
        .then(
          function (response) {
            this.$emit("refreshComments");
            this.formData.text = "";
            this.errors = false;
            this.dialog = false;
          }.bind(this)
        )
        .catch((errors) => {
          // Returns errors.
          this.errors = true; // errors.response.data
        });
    },
    closeDialog() {
      this.formData.text = "";
      this.errors = false;
      this.dialog = false;
    },
  },
};
</script>

<style>
</style>