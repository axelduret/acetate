<template>
    <div
        :class="$vuetify.theme.dark ? 'tealBackground' : ''"
        class="mx-auto my-auto col-auto d-flex align-center justify-center"
    >
        <img
            width="100%"
            style="max-width:550px"
            :src="
                $vuetify.theme.dark
                    ? '/img/page/home/teal_home.gif'
                    : '/img/page/home/light_home.gif'
            "
        />
    </div>
</template>

<script>
export default {
    data() {
        return {};
    }
};
</script>

<style></style>
