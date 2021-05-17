<template>
  <div v-if="Dates !== null && Dates.length > 0">
    <!-- 
    <div v-for="(date, index) in Dates" :key="index"> -->
    <v-data-table
      :headers="headers"
      :items="Dates"
      :sort-by.sync="sortBy"
      class="primary--text"
      disable-pagination
      hide-default-footer
    ></v-data-table>
    <!-- 
      <span
        v-if="date.start_date === date.end_date"
        class="caption primary--text"
      >
        <v-icon class="mr-1 primary--text" style="margin-bottom: 0.08rem" small
          >mdi-calendar-blank</v-icon
        >
        {{ date.start_date | formatDate }}
      </span>
      <span
        v-if="date.start_date !== date.end_date"
        class="caption primary--text"
      >
        <v-icon class="mr-1 primary--text" style="margin-bottom: 0.08rem" small
          >mdi-calendar-blank-multiple</v-icon
        >
        {{ $t("page.events.From") }}
        {{ date.start_date | formatMultipleDates }}
        {{ $t("page.events.to") }}
        {{ date.end_date | formatMultipleDates }}</span
      >
      <v-spacer></v-spacer>
      <span class="caption primary--text">
        <v-icon class="mr-1 primary--text" style="margin-bottom: 0.08rem" small
          >mdi-clock-time-four-outline</v-icon
        >
        {{ date.start_time | formatTime }} -
        {{ date.end_time | formatTime }}</span
      > -->
    <v-spacer></v-spacer>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: {
    Dates: Array,
  },
  data() {
    return {
      sortBy: "start_date",
      headers: [
        {
          text: "Start Date",
          value: "start_date",
          align: "start",
        },
        {
          text: "End Date",
          value: "end_date",
        },
        {
          text: "Start Time",
          value: "start_time",
          sortable: false,
        },
        {
          text: "End Time",
          value: "end_time",
          sortable: false,
        },
      ],
    };
  },
  methods: {},
  mounted() {
    /* 
    this.Dates.map((filter) => {
      if (filter.start_date < moment().format("YYYY-MM-DD")) {
        filter.start_date = null;
        filter.end_date = null;
        filter.start_time = null;
        filter.end_time = null;
        return filter;
      }
    }); */
  },
};
</script>

<style>
</style>