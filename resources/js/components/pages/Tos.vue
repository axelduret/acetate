<template>
    <div :class="$vuetify.theme.dark ? 'tealBackground' : ''">
        <div
            class="mx-auto my-auto col-auto d-flex align-center justify-center"
        >
            <img
                width="100%"
                style="max-width:550px"
                :src="
                    $vuetify.theme.dark
                        ? '/img/page/tos/teal_tos.gif'
                        : '/img/page/tos/light_tos.gif'
                "
            />
        </div>
        <v-spacer></v-spacer>
        <div
            class="mx-auto my-auto col-auto d-flex align-center justify-center"
        >
            <v-btn text color="info" @click="goBack()">{{
                $t("button.back.back")
            }}</v-btn>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    methods: {
        goBack() {
            this.$router.go(-1);
        }
    }
};
</script>

<style></style>
