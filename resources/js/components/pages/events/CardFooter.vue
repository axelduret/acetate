<template>
  <v-row class="pt-3">
    <!-- more info button -->
    <v-col class="ml-4 my-auto col-auto">
      <v-btn text color="info accent-4" @click="showEvent(Id)">{{
        $t("page.events.more_info")
      }}</v-btn>
    </v-col>
    <v-col class="mx-4 my-auto col-auto ml-auto">
      <!-- comments count -->
      <span class="orange--text mr-3">
        <v-icon
          class="orange--text mr-1"
          dark
          small
          style="margin-bottom: 0.05rem"
        >
          mdi-comment </v-icon
        ><span class="subtitle-2">{{ Comments }} </span>
      </span>
      <!-- likes count -->
      <span class="pink--text">
        <v-icon
          class="pink--text mr-1"
          dark
          small
          style="margin-bottom: 0.05rem"
        >
          mdi-heart </v-icon
        ><span class="subtitle-2">{{ Likes }}</span>
      </span>
    </v-col>
  </v-row>
</template>

<script>
export default {
  props: {
    Id: Number,
    Comments: Number,
    Likes: Number,
  },
  data() {
    return {
      // App url.
      appURL: process.env.MIX_APP_URL,
      // Base url.
      baseURL: process.env.MIX_BASE_URL,
    };
  },
  methods: {
    showEvent: function (id) {
      const path = "events/" + id;
      this.$router.push(`${this.baseURL}${this.$i18n.locale}/${path}`);
    },
  },
};
</script>

<style>
</style>