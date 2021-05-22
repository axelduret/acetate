<template>
    <v-container>
        <div>
            <v-container v-if="overlay === false">
                <div>
                    <v-row dense>
                        <v-col
                            v-for="(person, index) in people"
                            :key="index"
                            cols="12"
                            sm="12"
                            md="6"
                            lg="4"
                            xl="3"
                            class=""
                        >
                            <v-card max-width="500px" class="mx-auto pb-4">
                                <div>
                                    <v-list-item
                                        three-line
                                        class="greybg rounded-t"
                                    >
                                        <!-- avatar -->
                                        <v-list-item-avatar
                                            tile
                                            size="80"
                                            class="rounded"
                                            :color="
                                                $vuetify.theme.dark
                                                    ? 'primary'
                                                    : 'white'
                                            "
                                            ><v-img
                                                :src="
                                                    appURL +
                                                        baseURL +
                                                        'storage/avatar/person/' +
                                                        person.avatar
                                                "
                                                :title="person.nickname"
                                            ></v-img>
                                        </v-list-item-avatar>
                                        <v-list-item-content>
                                            <div class="overline primary--text">
                                                <v-row>
                                                    <!-- favorite -->
                                                    <v-col
                                                        class="col-auto ml-auto"
                                                        style="margin-bottom: 1rem"
                                                    >
                                                        <span
                                                            class="primary--text px-0"
                                                        >
                                                            <v-icon
                                                                class="primary--text"
                                                                dark
                                                                small
                                                            >
                                                                mdi-star-outline
                                                            </v-icon>
                                                        </span></v-col
                                                    ></v-row
                                                >
                                            </div>
                                            <!-- nickname -->
                                            <v-list-item-title
                                                class="title primary--text mb-1"
                                                >{{ person.nickname }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <!-- card content -->
                                    <v-row class="pb-3">
                                        <v-col
                                            class="mx-4 pt-5 col-auto mr-auto"
                                        >
                                            <!-- firstname and lastname -->
                                            <span class="caption primary--text">
                                                <span>
                                                    <v-icon
                                                        class="mr-1 primary--text"
                                                        style="margin-bottom: 0.08rem"
                                                        small
                                                        :title="
                                                            $t(
                                                                'page.people.title.name'
                                                            )
                                                        "
                                                        >mdi-account-box</v-icon
                                                    >&nbsp;<span
                                                        >{{ person.firstname }}
                                                        {{
                                                            person.lastname
                                                        }}</span
                                                    >
                                                    <v-spacer></v-spacer
                                                ></span>
                                            </span>
                                            <!-- company -->
                                            <span class="caption primary--text">
                                                <span>
                                                    <v-icon
                                                        class="mr-1 primary--text"
                                                        style="margin-bottom: 0.08rem"
                                                        small
                                                        :title="
                                                            $t(
                                                                'page.people.title.company'
                                                            )
                                                        "
                                                        >mdi-briefcase</v-icon
                                                    >&nbsp;<span>{{
                                                        person.company
                                                    }}</span>
                                                    <v-spacer></v-spacer
                                                ></span>
                                            </span>
                                        </v-col>
                                    </v-row>
                                    <v-divider class="mx-2"></v-divider>
                                    <div v-if="person.taxonomies.length > 0">
                                        <v-row class="py-0">
                                            <v-col
                                                class="my-auto mx-auto col-auto"
                                            >
                                                <span
                                                    justify="center"
                                                    class="primary--text"
                                                >
                                                    <v-chip-group
                                                        show-arrows
                                                        class="col-auto my-2 py-0"
                                                        ><span
                                                            v-for="(taxonomy,
                                                            index) in person.taxonomies"
                                                            :key="index"
                                                            ><v-chip
                                                                class="greybg primary--text"
                                                                x-small
                                                                >{{
                                                                    taxonomy.category
                                                                }}</v-chip
                                                            ><v-chip
                                                                class="greybg primary--text"
                                                                x-small
                                                                >{{
                                                                    taxonomy.sub_category
                                                                }}</v-chip
                                                            ></span
                                                        >
                                                    </v-chip-group>
                                                </span>
                                            </v-col>
                                        </v-row>
                                        <v-divider class="mx-2"></v-divider>
                                    </div>
                                    <div v-if="person.taxonomies.length <= 0">
                                        <v-row class="py-0">
                                            <v-col
                                                class="my-auto mx-auto col-auto"
                                            >
                                                <span
                                                    justify="center"
                                                    class="mx-auto col-auto  caption"
                                                    :class="
                                                        $vuetify.theme.dark
                                                            ? 'grey--text'
                                                            : 'grey--text'
                                                    "
                                                    style="line-height: 3rem"
                                                    >{{
                                                        $t(
                                                            "page.people.no_taxonomies_title"
                                                        )
                                                    }}
                                                </span>
                                            </v-col>
                                        </v-row>
                                        <v-divider class="mx-2"></v-divider>
                                    </div>
                                    <!-- card footer -->
                                    <v-row class="pt-3">
                                        <!-- more info button -->
                                        <v-col class="ml-4 my-auto col-auto">
                                            <v-btn
                                                text
                                                color="info accent-4"
                                                @click="showPerson(person.id)"
                                                >{{
                                                    $t("page.people.more_info")
                                                }}</v-btn
                                            >
                                        </v-col>
                                        <v-col
                                            class="mx-4 my-auto col-auto ml-auto"
                                        >
                                            <!-- comments count -->
                                            <span
                                                :class="
                                                    $vuetify.theme.dark
                                                        ? 'primary--text'
                                                        : 'secondary--text'
                                                "
                                                class="mr-3"
                                            >
                                                <v-icon
                                                    class="mr-1"
                                                    :class="
                                                        $vuetify.theme.dark
                                                            ? 'primary--text'
                                                            : 'secondary--text'
                                                    "
                                                    dark
                                                    small
                                                    style="margin-bottom: 0.05rem"
                                                >
                                                    mdi-comment-outline </v-icon
                                                ><span class="subtitle-2"
                                                    >{{ person.comments_count }}
                                                </span>
                                            </span>
                                            <!-- likes count -->
                                            <span
                                                :class="
                                                    $vuetify.theme.dark
                                                        ? 'primary--text'
                                                        : 'secondary--text'
                                                "
                                            >
                                                <v-icon
                                                    class="mr-1"
                                                    :class="
                                                        $vuetify.theme.dark
                                                            ? 'primary--text'
                                                            : 'secondary--text'
                                                    "
                                                    dark
                                                    small
                                                    style="margin-bottom: 0.05rem"
                                                >
                                                    mdi-heart-outline </v-icon
                                                ><span class="subtitle-2">{{
                                                    person.likes_count
                                                }}</span>
                                            </span>
                                        </v-col>
                                    </v-row>
                                </div>
                            </v-card>
                        </v-col>
                    </v-row>
                    <v-col
                        class="my-0 py-o"
                        v-if="meta.last_page != 1 && overlay == false"
                    >
                        <div class="text-center mt-4 mb-0 py-0">
                            <v-container>
                                <v-row justify="center">
                                    <v-col cols="12">
                                        <v-container class="max-width">
                                            <v-pagination
                                                :color="
                                                    $vuetify.theme.dark
                                                        ? 'primary'
                                                        : 'secondary'
                                                "
                                                v-model="page"
                                                :length="meta.last_page"
                                                circle
                                                @input="onPageChange"
                                            ></v-pagination>
                                        </v-container>
                                    </v-col>
                                </v-row>
                            </v-container></div
                    ></v-col>
                </div>
            </v-container>
        </div>
        <!-- loading -->
        <v-overlay
            :class="$vuetify.theme.dark ? 'primary--text' : 'secondary--text'"
            :opacity="0.1"
            :value="overlay"
        >
            <v-progress-circular indeterminate size="90">
                <span
                    class="caption"
                    :class="
                        $vuetify.theme.dark
                            ? 'primary--text'
                            : 'secondary--text'
                    "
                    >{{ $t("loading") }}</span
                >
            </v-progress-circular>
        </v-overlay>
    </v-container>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            overlay: true,
            perPage: 48,
            page: 1,
            people: "",
            meta: "",
            // App url.
            appURL: process.env.MIX_APP_URL,
            // Base url.
            baseURL: process.env.MIX_BASE_URL,
            apiToken: process.env.MIX_APP_API_TOKEN
        };
    },
    mounted() {
        this.fetchPeople();
    },
    methods: {
        fetchPeople: function() {
            this.overlay = true;
            this.people = null;
            axios
                .request({
                    url:
                        "people?per_page=" +
                        this.perPage +
                        "&page=" +
                        this.page,
                    method: "get",
                    baseURL: this.baseURL + "api/",
                    headers: {
                        Authorization: "Bearer " + this.apiToken
                    }
                })
                .then(response => {
                    this.people = response.data.people;
                    this.meta = response.data.meta;
                    this.overlay = false;
                    return this.people;
                })
                .catch(error => {
                    const path = "error/404";
                    this.$router.push(
                        `${this.baseURL}${this.$i18n.locale}/${path}`
                    );
                })
                .finally(() => {});
        },
        onPageChange() {
            this.fetchPeople();
        }
    }
};
</script>

<style></style>
