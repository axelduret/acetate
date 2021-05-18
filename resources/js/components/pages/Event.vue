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
          <!-- carousel -->
          <div v-if="event.files">
            <div v-if="event.files !== null && event.files.length > 0">
              <v-carousel
                cycle
                interval="5000"
                hide-delimiters
                show-arrows-on-hover
              >
                <v-carousel-item
                  v-for="(file, index) in event.files"
                  :key="index"
                  :src="appURL + baseURL + file.path"
                  :title="file.name"
                ></v-carousel-item>
              </v-carousel>
            </div>
          </div>
          <!-- likes -->
          <Likes :Likes="event.likes_count" />
          <v-divider></v-divider>
          <!-- event details -->
          <EventDetails
            v-if="event.dates"
            :Description="event.description ? event.description : null"
            :CurrentDates="event.current_dates ? event.current_dates : null"
            :OldDates="event.old_dates ? event.old_dates : null"
            :People="event.people ? event.people : null"
            :Venues="event.venues ? event.venues : null"
            :Addresses="event.addresses ? event.addresses : null"
            :Prices="event.prices ? event.prices : null"
            :Emails="event.emails ? event.emails : null"
            :Phones="event.phones ? event.phones : null"
            :Websites="event.websites ? event.websites : null"
          />
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
  methods: {
    logThis: function (file) {
      console.log(this.appURL + this.baseURL + file.path);
    },
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