<template>
  <div>
    <v-row dense>
      <v-col
        v-for="event in events"
        :key="event.id"
        cols="12"
        sm="6"
        md="4"
        lg="3"
        xl="2"
      >
        <v-card class="">
          <div class="py-4">
            <v-row class="pb-3">
              <v-col class="mx-4 col-auto mr-auto">
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
              </v-col>
            </v-row>
            <v-divider class=""></v-divider>
            <v-row class="pt-3">
              <v-col class="mx-4 col-auto ml-auto">
                <span class="orange--text mr-3">
                  <v-icon
                    class="orange--text mr-1"
                    dark
                    small
                    style="margin-bottom: 0.05rem"
                  >
                    mdi-comment </v-icon
                  ><span class="subtitle-2">{{ event.comments_count }} </span>
                </span>
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
                  }}</span> </span
                ><!-- 
                <span class="purple--text">
                  <v-icon
                    class="purple--text mr-1"
                    dark
                    small
                    style="margin-bottom: 0.05rem"
                  >
                    mdi-heart-broken </v-icon
                  ><span class="subtitle-2">{{ event.dislikes_count }} </span>
                </span> -->
              </v-col>
            </v-row>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      events: null,
    };
  },
  mounted() {
    axios.get("/api/events?per_page=100").then((response) => {
      this.events = response.data.events;
      return this.events;
    });
  },
};
</script>
  
<style>
</style>