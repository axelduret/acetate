<template></template>

<script>
export default {
  mounted() {
    axios
      .post("/api/logout/" + localStorage.getItem("user_id"))
      .then(() => {
        localStorage.removeItem("user_id");
        localStorage.removeItem("user_username");
        localStorage.removeItem("user_firstname");
        localStorage.removeItem("user_lastname");
        localStorage.removeItem("user_email");
        localStorage.removeItem("user_language");
        localStorage.removeItem("user_theme");
        localStorage.removeItem("user_avatar");
        localStorage.removeItem("user_api_token");
        localStorage.removeItem("user_role");
        localStorage.removeItem("user_abilities");
        this.$router.push(`/${this.$i18n.locale}/home`);
      })
      .catch((errors) => {
        console.log(errors);
      })
      .finally(() => {});
  },
};
</script>

<style>
</style>