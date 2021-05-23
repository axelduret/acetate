<template>
    <div>
        <v-stepper-content :step="Step"
            ><v-card class="m-0 mt-4 p-0 primary--text"
                ><v-divider></v-divider>
                <v-card-text
                    v-for="email in Emails"
                    :key="email.id"
                    class="m-0 p-0"
                >
                    {{ email }}</v-card-text
                ><v-spacer></v-spacer
                ><v-card-text
                    v-for="phone in Phones"
                    :key="phone.id"
                    class="m-0 p-0"
                >
                    {{ phone }}</v-card-text
                ><v-spacer></v-spacer
                ><v-card-text
                    v-for="website in Websites"
                    :key="website.id"
                    class="m-0 p-0"
                >
                    {{ website }}</v-card-text
                ><v-divider></v-divider>
                <v-card-actions class="mx-1 mt-4 p-0">
                    <v-btn
                        class="primary--text"
                        @click="$emit('Step5')"
                        outlined
                    >
                        {{ $t("button.back.back") }} </v-btn
                    ><v-spacer></v-spacer
                    ><v-btn color="info" outlined @click="submit()">
                        {{ $t("button.submit") }}
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
        Phones: Array,
        Emails: Array,
        Websites: Array,
        Step: Number
    },
    data() {
        return {
            form: {
                id: this.id,
                name: "",
                description: "",
                user_id: localStorage.getItem("user_id")
            },
            // App url.
            appURL: process.env.MIX_APP_URL,
            // Base url.
            baseURL: process.env.MIX_BASE_URL,
            apiToken: localStorage.getItem("user_api_token"),
            errors: false
        };
    },
    methods: {
        // PATCH
        submit() {
            if (!this.errors) {
                const config = {
                    headers: {
                        Authorization: "Bearer " + this.apiToken
                    }
                };
                axios
                    .patch(
                        this.baseURL + "api/events/" + this.Id,
                        this.form,
                        config
                    )
                    .then(
                        function() {
                            this.historyBack();
                        }.bind(this)
                    )
                    .catch(function(error) {
                        console.log(error);
                    });
            }
        }
    }
};
</script>

<style></style>
