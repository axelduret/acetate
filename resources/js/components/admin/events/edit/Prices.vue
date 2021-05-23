<template>
    <div>
        <v-stepper-content :step="Step"
            ><v-card class="m-0 mt-4 p-0 primary--text"
                ><v-divider></v-divider>
                <v-card-text
                    v-for="(price, index) in Prices"
                    :key="index"
                    class="m-0 p-0"
                >
                    {{ price }}</v-card-text
                ><v-divider></v-divider>
                <v-card-actions class="mx-1 mt-4 p-0">
                    <v-btn
                        class="primary--text"
                        @click="$emit('Step4')"
                        outlined
                    >
                        {{ $t("button.back.back") }} </v-btn
                    ><v-spacer></v-spacer
                    ><v-btn color="info" outlined @click="$emit('Step6')">
                        {{ $t("button.next") }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-stepper-content>
    </div>
</template>

<script>
export default {
    props: { Id: String, Prices: Array, Step: Number },
    data() {
        return {};
    }
};
</script>

<style></style>
