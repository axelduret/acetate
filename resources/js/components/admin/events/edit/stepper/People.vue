<template>
    <div>
        <v-stepper-content :step="Step"
            ><v-card class="m-0 mt-4 p-0 primary--text"
                ><v-divider></v-divider>
                <v-card-text
                    v-for="(person, index) in People"
                    :key="index"
                    class="m-0 p-0"
                >
                    {{ person }}</v-card-text
                ><v-divider></v-divider>
                <v-card-actions class="mx-1 mt-4 p-0">
                    <v-btn
                        class="primary--text"
                        @click="$emit('Step3')"
                        outlined
                    >
                        {{ $t("button.back.back") }} </v-btn
                    ><v-spacer></v-spacer
                    ><v-btn color="info" outlined @click="$emit('Step5')">
                        {{ $t("button.next") }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-stepper-content>
    </div>
</template>

<script>
export default {
    props: { Id: String, People: Array, Step: Number },
    data() {
        return {};
    }
};
</script>

<style></style>
