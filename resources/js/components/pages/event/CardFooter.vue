<template>
  <v-row class="pt-3">
    <!-- post a comment -->
    <v-col class="my-auto mx-auto col-auto">
      <v-btn outlined color="info accent-4" @click="postComment(Id)">{{
        $t("page.event.post_comment")
      }}</v-btn>
    </v-col>
  </v-row>
</template>

<script>
export default {
  props: {
    Id: Number,
    Comments: Number,
  },
  methods: {
    postComment: function (id) {
      console.log(id);
    },
  },
};
</script>

<style>
</style>