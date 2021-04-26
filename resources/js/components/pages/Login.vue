<template>
  <div class="">
    <v-row><v-col>Login</v-col></v-row>
    <div class="form-group" :class="{ 'form-group--error': $v.name.$error }">
      <label class="form__label">Name</label>
      <input
        class="form__input"
        v-model.trim="name"
        @input="setName($event.target.value)"
      />
    </div>
    <div class="error" v-if="!$v.name.required">Field is required</div>
    <div class="error" v-if="!$v.name.minLength">
      Name must have at least {{ $v.name.$params.minLength.min }} letters.
    </div>
  </div>
</template>

<script>
import { required, minLength } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      name: "",
    };
  },
  validations: {
    name: {
      required,
      minLength: minLength(4),
    },
  },
  methods: {
    setName(value) {
      this.name = value;
      this.$v.name.$touch();
    },
  },
};
</script>
  
<style>
</style>
