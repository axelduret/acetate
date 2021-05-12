<template>
  <v-container>
    <div>
      <!-- tabs -->
      <v-tabs
        v-model="eventTab"
        background-color="appBackground"
        :color="$vuetify.theme.dark ? 'primary' : 'secondary'"
        grow
      >
        <v-tab
          v-for="(tab, index) in eventTabs"
          :key="index"
          @click="showTab(tab.method)"
          >{{ tab.name }}</v-tab
        >
      </v-tabs>
      <v-tabs-items v-model="eventTab">
        <v-tab-item
          v-for="(tab, index) in eventTabs"
          :key="index"
          :transition="false"
          :reverse-transition="false"
        >
          <v-container>
            <div>
              <v-row dense>
                <v-col
                  v-for="(event, index) in events"
                  :key="index"
                  cols="12"
                  sm="12"
                  md="6"
                  lg="4"
                  xl="3"
                  class=""
                >
                  <v-card max-width="500px" class="mx-auto pb-4">
                    <div>
                      <v-list-item three-line class="greybg rounded-t">
                        <!-- avatar -->
                        <v-list-item-avatar
                          tile
                          size="80"
                          class="rounded"
                          :color="$vuetify.theme.dark ? 'primary' : 'white'"
                          ><v-img
                            :src="appURL + baseURL + event.avatar"
                            :title="event.name"
                          ></v-img>
                        </v-list-item-avatar>
                        <v-list-item-content>
                          <div class="overline primary--text">
                            <v-row>
                              <!-- taxonomy type -->
                              <v-col class="col-auto">
                                <span
                                  v-for="(taxonomy, index) in event.taxonomies"
                                  :key="index"
                                >
                                  <span v-if="taxonomy.type"
                                    ><span v-if="index === 0">
                                      <span
                                        class="primary--text"
                                        v-if="taxonomy.type === 'music'"
                                        >{{ $t("taxonomy.type.music") }}</span
                                      >
                                      <span
                                        class="primary--text"
                                        v-if="taxonomy.type === 'conference'"
                                        >{{
                                          $t("taxonomy.type.conference")
                                        }}</span
                                      >
                                      <span
                                        class="primary--text"
                                        v-if="taxonomy.type === 'exhibition'"
                                        >{{
                                          $t("taxonomy.type.exhibition")
                                        }}</span
                                      >
                                      <span
                                        class="primary--text"
                                        v-if="taxonomy.type === 'theater'"
                                        >{{ $t("taxonomy.type.theater") }}</span
                                      ></span
                                    >
                                  </span></span
                                ></v-col
                              ><v-spacer></v-spacer>
                              <!-- favorite -->
                              <v-col
                                class="col-auto ml-auto"
                                style="margin-bottom: 1rem"
                              >
                                <span class="primary--text px-0">
                                  <v-icon class="primary--text" dark small>
                                    mdi-star-outline
                                  </v-icon>
                                </span></v-col
                              ></v-row
                            >
                          </div>
                          <!-- name -->
                          <v-list-item-title class="title primary--text mb-1"
                            >{{ event.name }}
                          </v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                      <v-row class="pb-3">
                        <v-col class="mx-4 pt-5 col-auto mr-auto">
                          <!-- people -->
                          <span
                            v-if="event.people.length > 0"
                            class="caption primary--text"
                          >
                            <span>
                              <v-icon
                                class="mr-1 primary--text"
                                style="margin-bottom: 0.08rem"
                                small
                                >mdi-account-group</v-icon
                              ><span
                                v-for="(person, index) in event.people"
                                :key="index"
                              >
                                <span v-if="event.people.length < 4"
                                  >&nbsp;<a
                                    class="events_links"
                                    :title="person.nickname"
                                    @click="showPerson(person.id)"
                                    >{{ person.nickname }}</a
                                  >
                                  <span v-if="index < event.people.length - 1"
                                    >,
                                  </span>
                                </span>
                                <span v-if="event.people.length >= 4">
                                  <span v-if="index < 2"
                                    >&nbsp;<a
                                      class="events_links"
                                      :title="person.nickname"
                                      @click="showPerson(person.id)"
                                      >{{ person.nickname }}</a
                                    >,
                                  </span>
                                  <span v-if="index === 2"
                                    >&nbsp;<a
                                      class="events_links"
                                      :title="person.nickname"
                                      @click="showPerson(person.id)"
                                      >{{ person.nickname }}</a
                                    >, ...</span
                                  >
                                </span> </span
                              ><v-spacer></v-spacer
                            ></span>
                          </span>
                          <span
                            v-if="event.people.length <= 0"
                            class="caption primary--text"
                            ><span
                              ><v-icon
                                class="mr-1 primary--text"
                                style="margin-bottom: 0.08rem"
                                small
                                >mdi-account-group</v-icon
                              ><span :title="$t('page.events.no_people_title')">
                                {{ $t("page.events.no_people") }}</span
                              ></span
                            ><v-spacer></v-spacer>
                          </span>
                          <!-- venues -->
                          <span
                            v-if="event.venues.length > 0"
                            class="caption primary--text"
                          >
                            <span>
                              <v-icon
                                class="mr-1 primary--text"
                                style="margin-bottom: 0.08rem"
                                small
                                >mdi-office-building-marker</v-icon
                              >&nbsp;<a
                                class="events_links"
                                :title="event.venues[0].name"
                                @click="showVenue(event.venues[0].id)"
                                >{{ event.venues[0].name }}</a
                              >
                              <v-spacer></v-spacer
                            ></span>
                          </span>
                          <span
                            v-if="event.venues.length <= 0"
                            class="caption primary--text"
                            ><span
                              ><v-icon
                                class="mr-1 primary--text"
                                style="margin-bottom: 0.08rem"
                                small
                                >mdi-office-building-marker</v-icon
                              ><span :title="$t('page.events.no_venues_title')">
                                {{ $t("page.events.no_venues") }}</span
                              ></span
                            ><v-spacer></v-spacer>
                          </span>
                          <!-- dates -->
                          <span
                            v-if="event.start_date === event.end_date"
                            class="caption primary--text"
                          >
                            <v-icon
                              class="mr-1 primary--text"
                              style="margin-bottom: 0.08rem"
                              small
                              >mdi-calendar-blank</v-icon
                            >
                            {{ event.start_date | formatDate }}
                          </span>
                          <span
                            v-if="event.start_date !== event.end_date"
                            class="caption primary--text"
                          >
                            <v-icon
                              class="mr-1 primary--text"
                              style="margin-bottom: 0.08rem"
                              small
                              >mdi-calendar-blank-multiple</v-icon
                            >
                            {{ $t("page.events.From") }}
                            {{ event.start_date | formatMultipleDates }}
                            {{ $t("page.events.to") }}
                            {{ event.end_date | formatMultipleDates }}</span
                          >
                          <v-spacer></v-spacer>
                          <!-- time -->
                          <span class="caption primary--text">
                            <v-icon
                              class="mr-1 primary--text"
                              style="margin-bottom: 0.08rem"
                              small
                              >mdi-clock-time-four-outline</v-icon
                            >
                            {{ event.start_time | formatTime }} -
                            {{ event.end_time | formatTime }}</span
                          >
                          <v-spacer></v-spacer>
                          <!-- prices -->
                          <span
                            v-if="event.prices.length > 0"
                            class="caption primary--text"
                          >
                            <v-icon
                              class="mr-1 primary--text"
                              style="margin-bottom: 0.08rem"
                              small
                              >mdi-cash-usd-outline</v-icon
                            >
                            <span
                              v-for="(price, index) in event.prices"
                              :key="index"
                            >
                              <span v-if="index < event.prices.length - 1">
                                <span v-if="price.cost > 0">
                                  {{ price.cost }} chf |</span
                                >
                                <span v-else>
                                  {{ $t("price.free") }} |</span
                                > </span
                              ><span v-if="index >= event.prices.length - 1">
                                <span v-if="price.cost > 0">
                                  {{ price.cost }} chf</span
                                >
                                <span v-else>
                                  {{ $t("price.free") }}</span
                                ></span
                              > </span
                            ><v-spacer></v-spacer>
                          </span>
                          <span
                            v-if="event.prices.length <= 0"
                            class="caption primary--text"
                          >
                            <span
                              ><v-icon
                                class="mr-1 primary--text"
                                style="margin-bottom: 0.08rem"
                                small
                                >mdi-cash-usd-outline</v-icon
                              ><span :title="$t('page.events.no_prices_title')">
                                {{ $t("page.events.no_prices") }}</span
                              ></span
                            ><v-spacer></v-spacer>
                          </span>
                        </v-col>
                      </v-row>
                      <v-divider class="mx-2"></v-divider>
                      <!-- taxonomies -->
                      <div v-if="event.taxonomies.length > 0">
                        <v-row class="py-0">
                          <v-col class="my-auto col-auto">
                            <span class="primary--text">
                              <v-chip-group
                                show-arrows
                                class="col-auto my-2 py-0"
                                ><v-chip
                                  v-for="(taxonomy, index) in event.taxonomies"
                                  :key="index"
                                  class="greybg primary--text"
                                  x-small
                                  >{{ taxonomy.category }}</v-chip
                                >
                              </v-chip-group>
                            </span>
                          </v-col>
                        </v-row>
                        <v-divider class="mx-2"></v-divider>
                      </div>

                      <div v-if="event.taxonomies.length <= 0">
                        <v-row class="py-0">
                          <v-col class="my-auto col-auto">
                            <span
                              class="mx-auto col-auto primary--text"
                              style="line-height: 3rem"
                            >
                            </span>
                          </v-col>
                        </v-row>
                        <v-divider class="mx-2"></v-divider>
                      </div>
                      <v-row class="pt-3">
                        <!-- more info button -->
                        <v-col class="ml-4 my-auto col-auto">
                          <v-btn
                            text
                            color="info accent-4"
                            @click="showEvent(event.id)"
                            >{{ $t("page.events.more_info") }}</v-btn
                          >
                        </v-col>
                        <v-col class="mx-4 my-auto col-auto ml-auto">
                          <!-- comments count -->
                          <span class="orange--text mr-3">
                            <v-icon
                              class="orange--text mr-1"
                              dark
                              small
                              style="margin-bottom: 0.05rem"
                            >
                              mdi-comment </v-icon
                            ><span class="subtitle-2"
                              >{{ event.comments_count }}
                            </span>
                          </span>
                          <!-- likes count -->
                          <span class="pink--text">
                            <v-icon
                              class="pink--text mr-1"
                              dark
                              small
                              style="margin-bottom: 0.05rem"
                            >
                              mdi-heart </v-icon
                            ><span class="subtitle-2">{{
                              event.likes_count
                            }}</span>
                          </span>
                        </v-col>
                      </v-row>
                    </div>
                  </v-card>
                </v-col>
              </v-row>
            </div>
          </v-container>
        </v-tab-item>
      </v-tabs-items>
    </div>
    <!-- loading -->
    <v-overlay
      :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
      :opacity="0.1"
      :value="overlay"
    >
      <v-progress-circular indeterminate size="64">
        Loading...
      </v-progress-circular>
    </v-overlay>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      overlay: true,
      perPage: 50,
      events: "",
      appURL: process.env.MIX_APP_URL,
      baseURL: process.env.MIX_BASE_URL,
      apiToken: process.env.MIX_APP_API_TOKEN,
      eventTab: null,
      eventTabs: [
        { name: "All", method: "all" },
        { name: "Conference", method: "conference" },
        { name: "Exhibition", method: "exhibition" },
        { name: "Music", method: "music" },
        { name: "Theater", method: "theater" },
      ],
      query: null,
    };
  },
  mounted() {
    this.$nextTick(() => {
      this.showTab("all");
    });
  },
  updated() {
    this.$nextTick(() => {});
  },
  methods: {
    showTab: function (item) {
      this.$data.events = null;
      this.overlay = true;
      if (item === "all") {
        this.query = "events?per_page=";
      } else {
        this.query = "events?taxonomy_type=" + item + "&per_page=";
      }
      axios
        .request({
          url: this.query + this.perPage,
          method: "get",
          baseURL: "/api/",
          headers: {
            Authorization: "Bearer " + this.apiToken,
          },
        })
        .then((response) => {
          this.events = response.data.events;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          this.overlay = false;
          return this.events;
        });
    },
    showEvent: function (id) {
      this.$router.push("events/" + id);
    },
    showPerson: function (id) {
      this.$router.push("people/" + id);
    },
    showVenue: function (id) {
      this.$router.push("venues/" + id);
    },
  },
};
</script>
  
<style>
</style>