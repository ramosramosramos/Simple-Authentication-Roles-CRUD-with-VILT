<template>
  <section class="flex justify-center items-center min-h-[100vh] bg-slate-50">
    <div class="max-w-[500px] rounded-lg bg-slate-200">
      <form @submit.prevent="handleRegister">
        <TextField label="Name" placeholder="Name" v-model="form.name" :error="errors.name" />
        <TextField label="email" placeholder=" Email" v-model="form.email" :error="errors.email" />
        <TextField label="password" placeholder="password" v-model="form.password" :error="errors.password" />
        <TextField label="Confirm password" placeholder="Confirm password" v-model="form.password_confirmation" :error="errors.password_confirmation" />
      </form>
    </div>
  </section>
</template>
<script setup>
import TextField from "@/Components/TextField.vue";
import { useForm } from "@inertiajs/vue3";

defineProps({
  errors: Object,
});
const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
const handleRegister = ()=>{
form.post('auth.register');
}
</script>
