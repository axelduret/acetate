<template>
  <div>
    {{ event.name }}
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      event: "",
      appURL: process.env.MIX_APP_URL,
      baseURL: process.env.MIX_BASE_URL,
    };
  },
  mounted() {
    axios.get("/api/events/" + this.id).then((response) => {
      this.event = response.data.data.event;
      return this.event;
    });
  },
};
</script>
  
<style>
</style>