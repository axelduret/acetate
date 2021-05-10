<template>
  <v-footer outlined elevation="6" app padless>
    <v-col class="text-center" cols="12">
      <v-btn
        v-for="(icon, index) in footerIcons"
        :key="index"
        class="mx-4"
        :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
        icon
      >
        <v-icon>
          {{ icon }}
        </v-icon>
      </v-btn>
    </v-col>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
    footerIcons: ["mdi-facebook", "mdi-twitter", "mdi-instagram"],
  }),
};
</script>

<style>
</style>