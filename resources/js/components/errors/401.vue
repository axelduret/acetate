<template>
    <div class="mx-auto my-auto col-auto d-flex align-center justify-center">
        <img
            width="100%"
            style="max-width:550px"
            :src="
                $vuetify.theme.dark
                    ? '/img/errors/dark_404.gif'
                    : '/img/errors/light_404.gif'
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
