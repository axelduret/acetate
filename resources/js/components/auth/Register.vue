<template>
  <v-row justify="center">
    <v-col cols="12" sm="8" md="6" lg="5" xl="4">
      <form @submit.prevent="submit">
        <v-card>
          <v-card-text>
            <v-text-field
              v-model="email"
              type="email"
              label="E-mail"
            ></v-text-field>
            <v-text-field
              v-model="password"
              label="Password"
              :append-icon="showPw ? 'mdi-eye-off' : 'mdi-eye'"
              :type="showPw ? 'text' : 'password'"
              autocomplete="on"
              @click:append="showPw = !showPw"
            ></v-text-field>
          </v-card-text>
          <v-divider class="mt-2"></v-divider>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn class="mr-4" type="submit"> submit </v-btn>
          </v-card-actions>
        </v-card>
      </form>
    </v-col>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      showPw: false,
      password: "",
    };
  },
};
</script>
  
<style>
</style>
