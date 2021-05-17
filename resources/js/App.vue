<template>
  <v-app>
    <Sidebar ref="sidebar" />
    <Header
      ref="header"
      @toggle-drawer="$refs.sidebar.drawer = !$refs.sidebar.drawer"
    />
    <v-main
      ><!-- 
      <v-img
        style="min-height: 100vh; overflow: hidden"
        :src="
          $vuetify.theme.dark
            ? appURL + baseURL + 'img/background_firework.jpg'
            : appURL + baseURL + 'img/background_mountain.jpg'
        "
      > -->
      <v-container fluid>
        <router-view></router-view>
      </v-container>
      <!-- </v-img> -->
    </v-main>
    <Footer />
  </v-app>
</template>

<script>
import Header from "./components/layout/Header";
import Sidebar from "./components/layout/Sidebar";
import Footer from "./components/layout/Footer";
export default {
  components: { Header, Sidebar, Footer },
  data: () => ({
    // App url.
    appURL: process.env.MIX_APP_URL,
    // Base url.
    baseURL: process.env.MIX_BASE_URL,
  }),
};
</script>

<style>
</style>