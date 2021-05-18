<template>
  <v-container>
    <div class="d-flex justify-center mb-4"><v-btn
          @click="editThis(event.id)"
          text
          class="mx-2"
          outlined
          color="info accent-4"
          >{{ $t("admin.edit.title") }}</v-btn
        ></v-btn><v-btn
          @click="deleteThis(event.id)"
          text
          class="mx-2"
          outlined
          color="info accent-4"
          >{{ $t("admin.delete.title") }}</v-btn
        ></v-btn></div>
    <div>
      <v-card v-if="overlay === false" max-width="800px" class="pb-4 mx-auto">
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
          <Likes
            v-if="event.likes"
            :LikesCount="event.likes_count"
            :Likes="event.likes"
            :Id="event.id"
          />
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
            v-if="event.taxonomies"
            :Taxonomies="event.taxonomies ? event.taxonomies : null"
          />
          <v-divider></v-divider>
          <!-- comments -->
          <Comments
            ref="CommentsContent"
            v-if="renderComponent"
            :Comments="event.comments ? event.comments : null"
            @comment-dialog="$refs.CommentDialog.dialog = true"
          />
          <div class="d-flex justify-center" v-else>
            <v-progress-linear
              indeterminate
              :color="$vuetify.theme.dark ? 'info' : 'info'"
              opacity="0.1"
            ></v-progress-linear>
          </div>
          <!-- comment dialog -->
          <CommentDialog
            ref="CommentDialog"
            @refreshComments="forceRerender"
            :Id="event.id"
          />
        </div>
      </v-card>
    </div>
    <!-- loading -->
    <v-overlay
      :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
      opacity="0.1"
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
import CommentDialog from "./event/CommentDialog";

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
    CommentDialog,
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
      renderComponent: false,
      adminButtons: [
        {
          name: "edit",
          title: "menu.edit_events.title",
          path: "admin/events/edit",
          icon: "mdi-calendar-range",
        },
        {
          name: "delete",
          title: "menu.delete_events.title",
          path: "admin/events/delete",
          icon: "mdi-calendar-remove",
        },
      ],
    };
  },
  methods: {
    editThis: function (id) {
      this.$router.push(
        `${this.baseURL}${this.$i18n.locale}/admin/events/${id}/edit`
      );
    },
    deleteThis: function (id) {
      this.$router.push(
        `${this.baseURL}${this.$i18n.locale}/admin/events/${id}/delete`
      );
    },
    logThis: function (file) {
      console.log(this.appURL + this.baseURL + file.path);
    },
    fetchAPI() {
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
          this.renderComponent = true;
          return this.event;
        });
    },
    forceRerender() {
      // Remove my-component from the DOM
      this.renderComponent = false;

      this.$nextTick(() => {
        // Add the component back in
        this.fetchAPI();
      });
    },
  },
  mounted() {
    this.fetchAPI();
  },
};
</script>
  
<style>
</style>