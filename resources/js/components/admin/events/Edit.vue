<template>
  <form id="myForm" @submit.prevent>
    <v-card max-width="800px" class="mx-auto">
      <v-card-title class="title greybg primary--text">
        <div>{{ $t("admin.edit.title") }}</div>
      </v-card-title>
      <v-card-text>
        <input type="hidden" id="formId" v-model="form.id" />
        <input type="hidden" id="formUserId" v-model="form.user_id" />
        <v-text-field
          class="mx-4 my-4 primary--text"
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
          v-model="form.description"
        ></v-textarea
        ><img
          class="mx-4 mb-4 primary--text"
          width="200"
          :src="appURL + baseURL + 'storage/avatar/event/' + event.avatar"
        />
        <v-spacer></v-spacer
        ><input
          class="mx-4 my-4"
          type="file"
          id="file"
          ref="file"
          v-on:change="handleFileUpload()"
        />
      </v-card-text>
      <v-divider class="mt-2"></v-divider>
      <v-card-actions>
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
      file: "",
      // App url.
      appURL: process.env.MIX_APP_URL,
      // Base url.
      baseURL: process.env.MIX_BASE_URL,
      apiToken: localStorage.getItem("user_api_token"),
    };
  },
  methods: {
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
        .finally(() => {
          this.overlay = false;
        });
    },
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
    },
    submit() {
      /* 
      const id = document.getElementById("formId").value;
      const user_id = document.getElementById("formUserId").value;
      const name = document.getElementById("formName").value;
      const description = document.getElementById("formText").value; */

      const formData = new FormData(); /* 
      formData.append("id", id);
      formData.append("user_id", user_id);
      formData.append("name", name);
      formData.append("description", description); */
      formData.append("upload", this.file);

      const config = {
        headers: {
          "Content-Type":
            "multipart/form-data; charset=utf-8; boundary=" +
            Math.random().toString().substr(2),
          Authorization: "Bearer " + this.apiToken,
        },
      };
      axios
        .post(
          this.baseURL + "api/events/" + this.id + "/avatar",
          formData,
          config
        )
        .then(function () {
          console.log("SUCCESS!!");
        })
        .catch(function () {
          console.log("FAILURE!!");
        });
    },
  },
  mounted() {
    this.fetchAPI();
  },
};
</script>

<style>
</style>