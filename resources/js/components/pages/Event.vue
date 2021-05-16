<template>
  <v-container>
    <div>
      <v-card max-width="800px" class="pb-4 mx-auto">
        <div>
          <!-- card title -->
          <CardTitle
            :Name="event.name"
            :Avatar="event.avatar"
            :Taxonomies="event.taxonomies"
          />
          <!-- card content -->
          <v-row class="pb-3">
            <v-col class="mx-4 pt-5">
              <!-- people -->
              <People :People="event.people" />
              <!-- venues -->
              <Venues :Venues="event.venues" />
              <!-- dates -->
              <Dates :Dates="event.dates" />
              <v-row class="justify-space-between"
                ><!-- prices -->
                <Prices :Prices="event.prices" />
                <!-- likes -->
                <Likes :Likes="event.likes_count"
              /></v-row>
            </v-col>
          </v-row>
          <!-- taxonomies -->
          <Taxonomies :Taxonomies="event.taxonomies" />
          <!-- comments -->
          <div v-if="event.comments.length > 0">
            <Comments :Comments="event.comments" />
          </div>
          <!-- card footer -->
          <CardFooter :Id="event.id" />
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
import People from "./event/People";
import Venues from "./event/Venues";
import Dates from "./event/Dates";
import Prices from "./event/Prices";
import Likes from "./event/Likes";
import Taxonomies from "./event/Taxonomies";
import Comments from "./event/Comments";
import CardFooter from "./event/CardFooter";

export default {
  props: {
    id: String,
  },
  components: {
    CardTitle,
    People,
    Venues,
    Dates,
    Prices,
    Likes,
    Taxonomies,
    Comments,
    CardFooter,
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