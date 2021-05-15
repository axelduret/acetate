<template>
  <div>
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
                <Dates
                  :StartDate="event.start_date"
                  :EndDate="event.end_date"
                />
                <!-- time -->
                <Time :StartTime="event.start_time" :EndTime="event.end_time" />
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
            <CardFooter :Id="event.id" :Likes="event.likes_count" />
          </div>
        </v-card>
      </div>
    </v-container>
  </div>
</template>

<script>
import CardTitle from "./event/CardTitle";
import People from "./event/People";
import Venues from "./event/Venues";
import Dates from "./event/Dates";
import Time from "./event/Time";
import Prices from "./event/Prices";
import Likes from "./event/Likes";
import Taxonomies from "./event/Taxonomies";
import Comments from "./event/Comments";
import CardFooter from "./event/CardFooter";
export default {
  components: {
    CardTitle,
    People,
    Venues,
    Dates,
    Time,
    Prices,
    Likes,
    Taxonomies,
    Comments,
    CardFooter,
  },
  props: {
    id: String,
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
        this.$router.push(this.baseURL + `${this.$i18n.locale}/${path}`);
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