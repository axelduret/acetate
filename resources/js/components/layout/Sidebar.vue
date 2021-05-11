<template>
  <div>
    <v-navigation-drawer v-model="drawer" app temporary
      ><v-app-bar outlined
        ><v-app-bar-nav-icon
          :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
          @click="drawer = !drawer"
        ></v-app-bar-nav-icon>
        <div
          class="rounded-sm mx-2"
          :class="$vuetify.theme.dark ? 'darken-3' : 'lighten-4'"
        >
          <v-toolbar-title
            :class="$vuetify.theme.dark ? 'secondary--text' : 'primary--text'"
            style="font-family: monospace"
          >
            <v-icon
              class="flaticon-music-disc-with-white-curve-details mr-0"
              :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
              style="margin-bottom: 0.175rem"
            ></v-icon
            ><span
              class="app_title"
              :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
            >
              {{ appName }}</span
            ></v-toolbar-title
          >
        </div>
      </v-app-bar>
      <v-spacer></v-spacer>
      <v-list nav dense>
        <v-list-item-group>
          <v-list-item
            v-for="(item, index) in getMenu"
            :key="index"
            :to="'/' + $i18n.locale + '/' + item.path"
          >
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-title>{{ $t(item.title) }}</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data: () => ({
    // App name.
    appName: process.env.MIX_APP_NAME,
    // Sidebar.
    drawer: false,
  }),
  // Get sidebar menu content.
  computed: mapGetters(["getMenu"]),
};
</script>

<style>
</style>