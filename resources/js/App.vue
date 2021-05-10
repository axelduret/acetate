<template>
  <v-app>
    <Sidebar ref="sidebar" />
    <Header @toggle-drawer="$refs.sidebar.drawer = !$refs.sidebar.drawer" />
    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
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
  data: () => ({}),
};
</script>

<style>
</style>