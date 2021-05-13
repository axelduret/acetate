<template>
  <div>
    <div>{{ event }}</div>
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      event: "",
      apiToken: process.env.MIX_APP_API_TOKEN,
    };
  },
  mounted() {
    axios
      .request({
        url: this.id,
        method: "get",
        baseURL: "/api/events/",
        headers: {
          Authorization: "Bearer " + this.apiToken,
        },
      })
      .then((response) => {
        this.event = response.data.data.event;
      })
      .catch((error) => {
        const path = "error/404";
        this.$router.push(`/${this.$i18n.locale}/${path}`);
      })
      .finally(() => {
        return this.event;
      });
  },
};
</script>
  
<style>
</style>