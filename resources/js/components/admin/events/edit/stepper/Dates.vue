<template>
    <div>
        <!-- 
        <v-stepper-content :step="Step"
            ><v-card class="m-0 mt-4 p-0 primary--text"
                ><v-divider></v-divider>
                <v-card-text class="m-0 p-0"
                    ><v-row>
                        <v-col cols="12" sm="6">
                            <v-menu
                                v-model="dateMenu"
                                :close-on-content-click="false"
                                :nudge-right="40"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="StartDate"
                                        label="Start Date"
                                        prepend-icon="mdi-calendar"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    no-title
                                    v-model="StartDate"
                                    @input="dateMenu = false"
                                ></v-date-picker>
                            </v-menu>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-menu
                                v-model="dateMenu2"
                                :close-on-content-click="false"
                                :nudge-right="40"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="EndDate"
                                        label="End Date"
                                        prepend-icon="mdi-calendar"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    no-title
                                    v-model="EndDate"
                                    @input="dateMenu2 = false"
                                ></v-date-picker>
                            </v-menu>
                        </v-col>
                        <v-spacer></v-spacer> </v-row></v-card-text
                ><v-divider></v-divider>
                <v-card-actions class="mx-1 mt-4 p-0">
                    <v-btn
                        class="primary--text"
                        @click="$emit('Step1')"
                        outlined
                    >
                        {{ $t("button.back.back") }} </v-btn
                    ><v-spacer></v-spacer
                    ><v-btn color="info" outlined @click="$emit('Step3')">
                        {{ $t("button.next") }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-stepper-content> -->

        <v-stepper-content :step="Step"
            ><v-card class="m-0 mt-4 p-0 primary--text"
                ><v-divider></v-divider>
                <div class="pt-8">
                    <v-card-text
                        v-for="(date, index) in Dates"
                        :key="index"
                        class=" mb-0 py-0"
                        ><v-textarea
                            class="my-0 py-0 primary--text"
                            height="220"
                            clearable
                            no-resize
                            outlined
                            :label="'Date ' + (index + 1)"
                            rows="1"
                            row-height="25"
                            v-model="JSON.stringify(date, undefined, 4)"
                        ></v-textarea
                    ></v-card-text>
                </div>
                <v-divider></v-divider>
                <v-card-actions class="mx-1 mt-4 p-0">
                    <v-btn
                        class="primary--text"
                        @click="$emit('Step1')"
                        outlined
                    >
                        {{ $t("button.back.back") }} </v-btn
                    ><v-spacer></v-spacer
                    ><v-btn color="info" outlined @click="$emit('Step3')">
                        {{ $t("button.next") }}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-stepper-content>
    </div>
</template>

<script>
export default {
    props: {
        Id: String,
        Dates: Array,
        Step: Number
    },
    data() {
        return {
            dateMenu: false,
            dateMenu2: false,
            StartDate: null,
            EndDate: null
        };
    },
    computed: {},
    methods: {}
};
</script>

<style></style>
