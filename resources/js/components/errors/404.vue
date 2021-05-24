<template>
    <div class="mx-auto my-auto col-auto d-flex align-center justify-center">
        <img
            width="100%"
            style="max-width:550px"
            :src="
                $vuetify.theme.dark
                    ? baseURL + 'img/errors/dark_404.gif'
                    : baseURL + 'img/errors/light_404.gif'
            "
        />
        <v-spacer></v-spacer>
        <v-btn text color="info" @click="goBack()">{{
            $t("button.back.back")
        }}</v-btn>
    </div>
</template>

<script>
export default {
    data() {
        return {
            baseURL: process.env.MIX_BASE_URL
        };
    },
    methods: {
        goBack() {
            this.$router.go(-1);
        }
    }
};
</script>

<style></style>
