<template>
  <div>
    <v-expansion-panels multiple v-model="panel" elevation="-1" tile accordion>
      <!-- Description -->
      <v-expansion-panel class="caption primary--text">
        <v-expansion-panel-header
          >{{ $t("page.event.title.description") }}
          <template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <span
            v-if="Description !== null && Description.length > 0"
            class="subtitle-2"
            :class="$vuetify.theme.dark ? 'grey--text' : 'primary--text'"
            >{{ Description }}</span
          ><span v-else>
            {{ $t("page.event.description_none") }}</span
          ></v-expansion-panel-content
        >
      </v-expansion-panel>
      <!-- Dates -->
      <v-expansion-panel class="caption primary--text">
        <v-expansion-panel-header
          >{{ $t("page.event.title.dates") }}
          <template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          
          <span
            v-if="CurrentDates !== null && CurrentDates.length > 0"
            class="subtitle-2"
            :class="$vuetify.theme.dark ? 'primary--text' : 'primary--text'"
          ><pre ><v-icon class="mr-1 primary--text" style="margin-bottom: 0.08rem" small
        >mdi-calendar-blank-multiple</v-icon
      > {{ $t("page.event.title.current_dates") }}</pre>
            <v-data-table
              :headers="headers"
              :items="CurrentDates"
              :sort-by.sync="sortBy"
              class="primary--text"
              disable-pagination
              hide-default-footer
            ></v-data-table></span
        ><v-divider :class="$vuetify.theme.dark ? 'primary--text' : 'primary--text'" class="mb-2"></v-divider>
          <span
            v-if="OldDates !== null && OldDates.length > 0"
            class="subtitle-2"
            :class="$vuetify.theme.dark ? 'primary--text' : 'primary--text'"
          ><pre><v-icon class="mr-1 primary--text" style="margin-bottom: 0.08rem" small
        >mdi-calendar-blank-multiple</v-icon
      > {{ $t("page.event.title.old_dates") }}</pre>
            <v-data-table
              :headers="headers"
              :items="OldDates"
              :sort-by.sync="sortBy"
              class="primary--text"
              disable-pagination
              hide-default-footer
            ></v-data-table></span
        ><v-divider :class="$vuetify.theme.dark ? 'primary--text' : 'primary--text'" class="mb-2"></v-divider></v-expansion-panel-content>
      </v-expansion-panel>
      <!-- People -->
      <v-expansion-panel
        v-if="People !== null && People.length > 0"
        class="caption primary--text"
      >
        <v-expansion-panel-header
          >{{ $t("page.event.title.attendance")
          }}<template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <span>
            <span v-for="(person, index) in People" :key="index">
              <v-avatar size="30" style="cursor: pointer">
                <img
                  v-if="person.avatar !== null && person.avatar.length > 0"
                  alt="Avatar"
                  @click="showPerson(person.id)"
                  :src="appURL + baseURL + person.avatar"
                  :title="person.nickname"
                /><v-icon
                  v-else
                  large
                  :class="
                    $vuetify.theme.dark ? 'info--text' : 'secondary--text'
                  "
                  :title="person.nickname"
                  @click="showPerson(person.id)"
                  >mdi-account-circle</v-icon
                >
              </v-avatar>
              <v-btn
                text
                tile
                small
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                class="no-uppercase"
                @click="showPerson(person.id)"
                :title="person.nickname"
                ><span v-if="person.firstname && person.lastname !== null"
                  >{{ person.firstname }} {{ person.lastname }}</span
                >
                <span v-else>{{ person.nickname }}</span></v-btn
              >
              <v-divider class="my-2 greybg"></v-divider
            ></span>
          </span>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <!-- Locations -->
      <v-expansion-panel
        v-if="
          (Venues !== null && Venues.length > 0) ||
          (Addresses !== null && Addresses.length > 0)
        "
        class="caption primary--text"
      >
        <v-expansion-panel-header
          >{{ $t("page.event.title.locations")
          }}<template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <span v-if="Venues !== null && Venues.length > 0">
            <span v-for="(venue, index) in Venues" :key="index">
              <!-- Venue name --><v-icon
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                small
                >mdi-office-building-marker</v-icon
              ><v-btn
                text
                tile
                small
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                class="no-uppercase"
                @click="showVenue(venue.id)"
                :title="venue.name"
                >{{ venue.name }}</v-btn
              ><v-spacer></v-spacer>
              <span
                v-if="venue.addresses !== null && venue.addresses.length > 0"
                class="caption primary--text"
              >
                <span v-for="(address, index) in venue.addresses" :key="index">
                  <!-- Venue addresses -->
                  <v-icon
                    :class="
                      $vuetify.theme.dark ? 'info--text' : 'secondary--text'
                    "
                    small
                    >mdi-earth-arrow-right</v-icon
                  >
                  <v-btn
                    text
                    tile
                    small
                    :class="
                      $vuetify.theme.dark ? 'info--text' : 'secondary--text'
                    "
                    class="no-uppercase"
                    :href="mapQuery(address)"
                    :title="$t('page.event.title.google_map')"
                    target="_blank"
                  >
                    {{ address.street1 }}, 
                    {{ address.zip }} {{ address.city }}, 
                    {{ address.canton }},
                    {{ address.country }}
                  </v-btn>
                  <span
                    :class="
                      $vuetify.theme.dark ? 'grey--text' : 'primary--text'
                    "
                  >
                  </span
                  ><v-spacer></v-spacer>
                </span> </span
              ><v-divider class="my-2 greybg"></v-divider
            ></span>
          </span>
          <!-- Event adresses -->
          <span v-if="Addresses !== null && Addresses.length > 0">
            <span v-for="(address, index) in Addresses" :key="index">
              <v-icon
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                small
                >mdi-earth-arrow-right</v-icon
              >
              <v-btn
                text
                tile
                small
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                class="no-uppercase"
                :href="mapQuery(address)"
                :title="$t('page.event.title.google_map')"
                target="_blank"
              >
                {{ address.street1 }},  {{ address.zip }}
                {{ address.city }},
                {{ address.canton }}, 
                {{ address.country }}
              </v-btn>
              <v-divider class="my-2 greybg"></v-divider></span
          ></span>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <!-- Emails -->
      <v-expansion-panel
        v-if="Emails !== null && Emails.length > 0"
        class="caption primary--text"
      >
        <v-expansion-panel-header
          >{{ $t("page.event.title.emails")
          }}<template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <span>
            <span v-for="(email, index) in Emails" :key="index">
              <v-icon
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                small
                >mdi-email-outline</v-icon
              >
              <v-btn
                text
                tile
                small
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                class="no-uppercase"
                :href="mailTo(email)"
                :title="$t('page.event.title.email')"
                target="_blank"
              >
                {{ email.address }}
              </v-btn>
              <span
                :class="$vuetify.theme.dark ? 'grey--text' : 'primary--text'"
              >
                ({{ email.type }})
              </span>
              <v-divider class="my-2 greybg"></v-divider
            ></span>
          </span>
        </v-expansion-panel-content>
      </v-expansion-panel>
      <!-- Prices -->
      <v-expansion-panel v-if="Prices !== null && Prices.length > 0"  class="caption primary--text">
        <v-expansion-panel-header
          >{{ $t("page.event.title.prices") }}
          <template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content >
          <span class="subtitle-2"
            ><span
              class="caption"
              :class="$vuetify.theme.dark ? 'grey--text' : 'primary--text'"
            >
              <span v-for="(price, index) in Prices" :key="index">
                <v-icon
                    class="mr-1"
                    :class="
                      $vuetify.theme.dark ? 'grey--text' : 'primary--text'
                    "
                    style="margin-bottom: 0.08rem"
                    small
                    >mdi-cash-usd-outline</v-icon
                  >
                  {{ price.cost }} chf ({{ price.type }})<v-spacer></v-spacer
                >
              </span></span
            >
          </span><v-spacer></v-spacer> </span
        ></v-expansion-panel-content>
      </v-expansion-panel>
      <!-- Phones -->
      <v-expansion-panel
        v-if="Phones !== null && Phones.length > 0"
        class="caption primary--text"
      >
        <v-expansion-panel-header
          >{{ $t("page.event.title.phones")
          }}<template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <span>
            <span v-for="(phone, index) in Phones" :key="index">
              <v-icon
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                small
                >mdi-phone-outline</v-icon
              >
              <span
                class="ml-3"
                :class="$vuetify.theme.dark ? 'grey--text' : 'primary--text'"
              >
                {{ phone.number }}
              </span>
              <span
                :class="$vuetify.theme.dark ? 'grey--text' : 'primary--text'"
              >
                ({{ phone.type }})
              </span>

              <v-divider class="my-2 greybg"></v-divider
            ></span> </span
        ></v-expansion-panel-content>
      </v-expansion-panel>
      <!-- Websites -->
      <v-expansion-panel
        v-if="Websites !== null && Websites.length > 0"
        class="caption primary--text"
      >
        <v-expansion-panel-header
          >{{ $t("page.event.title.websites")
          }}<template v-slot:actions>
            <v-icon color="primary"> $expand </v-icon>
          </template></v-expansion-panel-header
        >
        <v-expansion-panel-content>
          <span>
            <span v-for="(website, index) in Websites" :key="index">
              <span
                v-if="website.type === 'website'"
                :class="$vuetify.theme.dark ? 'grey--text' : 'primary--text'"
                ><v-icon
                  :class="
                    $vuetify.theme.dark ? 'info--text' : 'secondary--text'
                  "
                  small
                  >mdi-web</v-icon
                ></span
              ><span
                v-else
                :class="$vuetify.theme.dark ? 'grey--text' : 'primary--text'"
              >
                <v-icon
                  v-if="website.social_network.type === 'tiktok'"
                  :class="
                    $vuetify.theme.dark ? 'info--text' : 'secondary--text'
                  "
                  small
                  >mdi-web </v-icon
                ><v-icon
                  v-else
                  :class="
                    $vuetify.theme.dark ? 'info--text' : 'secondary--text'
                  "
                  small
                  >mdi-{{ website.social_network.type }}
                </v-icon>
              </span>
              <v-btn
                text
                tile
                small
                :class="$vuetify.theme.dark ? 'info--text' : 'secondary--text'"
                class="no-uppercase"
                :href="website.url"
                :title="website.name"
                target="_blank"
              >
                {{ website.url }}
              </v-btn>
              <v-divider class="my-2 greybg"></v-divider
            ></span>
          </span>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>
  </div>
</template>

<script>
export default {
  props: {
    Description: String,
    CurrentDates: Array,
    OldDates: Array,
    People: Array,
    Venues: Array,
    Addresses: Array,
    Prices: Array,
    Emails: Array,
    Phones: Array,
    Websites: Array,
  },
  data() {
    return {
      panel: [0],
      appURL: process.env.MIX_APP_URL,
      baseURL: process.env.MIX_BASE_URL,
      googleMap: "https://www.google.com/maps/search/?api=1&query=",
      sortBy: "start_date",
    };
  },
  computed: {
    headers() {
      return [
        {
          text: this.$t("page.event.title.start_date"),
          value: "start_date",
          align: "start",
        },
        {
          text: this.$t("page.event.title.end_date"),
          value: "end_date",
        },
        {
          text: this.$t("page.event.title.start_time"),
          value: "start_time",
        },
        {
          text: this.$t("page.event.title.end_time"),
          value: "end_time",
        },
      ];
    },
  },
  methods: {
    showPerson: function (id) {
      const path = "people/" + id;
      this.$router.push(`${this.baseURL}${this.$i18n.locale}/${path}`);
    },
    showVenue(id) {
      const path = "venues/" + id;
      this.$router.push(`${this.baseURL}${this.$i18n.locale}/${path}`);
    },
    mapQuery(address) {
      return this.googleMap + address.latitude + "," + address.longitude;
    },
    mailTo(email) {
      return "mailto:" + email.address;
    },
  },
};
</script>

<style>
</style>