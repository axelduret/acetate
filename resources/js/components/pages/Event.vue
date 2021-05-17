<template>
  <v-container>
    <div>
      <v-card max-width="800px" class="pb-4 mx-auto">
        <div>
          <!-- card title -->
          <CardTitle
            :Avatar="event.avatar ? event.avatar : null"
            :Taxonomies="event.taxonomies ? event.taxonomies : null"
            :Name="event.name ? event.name : null"
          />
          <!-- event details -->
          <EventDetails
            :Description="event.description ? event.description : null"
            v-if="event.dates"
            :Dates="event.dates ? event.dates : null"
            :People="event.people ? event.people : null"
            :Venues="event.venues ? event.venues : null"
            :Addresses="event.addresses ? event.addresses : null"
            :Emails="event.emails ? event.emails : null"
            :Phones="event.phones ? event.phones : null"
            :Websites="event.websites ? event.websites : null"
          />
          <v-divider></v-divider>
          <!-- card content -->
          <v-row class="pb-3">
            <v-col class="mx-4 pt-5">
              <v-row class="my-0 py-0 justify-space-between">
                <!-- prices -->
                <Prices :Prices="event.prices ? event.prices : null" />
                <!-- likes -->
                <Likes :Likes="event.likes_count ? event.likes_count : null"
              /></v-row>
            </v-col>
          </v-row>
          <v-divider></v-divider>
          <!-- taxonomies -->
          <Taxonomies
            :Taxonomies="event.taxonomies ? event.taxonomies : null"
          />
          <v-divider></v-divider>
          <!-- comments -->
          <Comments
            :Id="event.id"
            :Comments="event.comments ? event.comments : null"
          />
        </div>
      </v-card>
    </div>
    <!-- loading -->
    <v-overlay
      :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
      :opacity="0.1"
      :value="overlay"
    >
      <v-progress-circular indeterminate size="90">
        <span
          class="caption"
          :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
          >{{ $t("loading") }}</span
        >
      </v-progress-circular>
    </v-overlay>
  </v-container>
</template>

<script>
import CardTitle from "./event/CardTitle";
import EventDetails from "./event/EventDetails";
import Dates from "./event/Dates";
import Prices from "./event/Prices";
import Likes from "./event/Likes";
import Taxonomies from "./event/Taxonomies";
import Comments from "./event/Comments";

export default {
  props: {
    id: String,
  },
  components: {
    CardTitle,
    EventDetails,
    Dates,
    Prices,
    Likes,
    Taxonomies,
    Comments,
  },
  data() {
    return {
      overlay: true,
      event: "",
      // App url.
      appURL: process.env.MIX_APP_URL,
      // Base url.
      baseURL: process.env.MIX_BASE_URL,
      apiToken: process.env.MIX_APP_API_TOKEN,
    };
  },
  mounted() {
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
      })
      .catch((error) => {
        const path = "error/404";
        this.$router.push(`${this.baseURL}${this.$i18n.locale}/${path}`);
      })
      .finally(() => {
        this.overlay = false;
        return this.event;
      });
  },
};
</script>
  
<style>
</style>