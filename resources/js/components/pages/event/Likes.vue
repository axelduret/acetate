<template>
  <div>
    <v-col class="col-auto ml-auto" style="text-align: right">
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
  </div>
</template>

<script>
export default {
  props: {
    Likes: Number,
  },
};
</script>

<style>
</style>