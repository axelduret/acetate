<template>
  <div>
    <div v-for="(date, index) in Dates" :key="index">
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
      >
      <v-spacer></v-spacer>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    Dates: Array,
  },
};
</script>

<style>
</style>