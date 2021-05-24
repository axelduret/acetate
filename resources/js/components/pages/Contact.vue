<template>
    <div
        :class="$vuetify.theme.dark ? 'tealBackground' : ''"
        class="mx-auto my-auto col-auto d-flex align-center justify-center"
    >
        <div>
            <img
                width="100%"
                style="max-width:550px"
                :src="
                    $vuetify.theme.dark
                        ? '/img/page/contact/teal_contact.gif'
                        : '/img/page/contact/light_contact.gif'
                "
            />
        </div>
        <v-spacer></v-spacer>
        <div>
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
