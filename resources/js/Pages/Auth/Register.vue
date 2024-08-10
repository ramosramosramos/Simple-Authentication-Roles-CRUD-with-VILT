<template>
  <section class=" select-none flex flex-col gap-2 justify-center items-center min-h-[100vh] bg-purple-50">

    <div class="flex flex-col min-w-[500px] rounded-lg bg-black">
        <h1 class="text-gray-200 mb-5 mt-5 text-center text-xl tracking-widest">Register</h1>
      <form @submit.prevent="handleRegister" class="w-[90%] m-auto">
        <TextField
          label="Name"
          placeholder="Example Name"
          v-model="form.name"
          :error="form.errors.name"
        />
        <TextField
          label="Email"
          placeholder="example@mail.com"
          v-model="form.email"
          :error="form.errors.email"
        />
        <TextField
          label="Password"
          placeholder="Password"
          v-model="form.password"
          :error="form.errors.password"
        />
        <TextField
          label="Confirm password"
          placeholder="Re-type password"
          v-model="form.password_confirmation"
          :error="form.errors.password_confirmation"
        />
        <div  class="w-[90%] m-auto">
          <button v-if="!form.processing" type="submit" :disabled="form.processing" class="w-[100%] 
           rounded-md h-[40px] text-gray-50 bg-blue-800 hover:bg-blue-700 transition-all ease-in-out duration-500
            active:bg-blue-600 mb-5">
            Register
          </button>
        </div>

        <div class="mt-5 mb-5 text-sm">
          <Link :href="route('login')" class="text-blue-800 hover:text-blue-600 transition-all ease-in-out duration-500">
            Already have an account? Login</Link
          >
        </div>
      </form>
    </div>
    <div class="flex flex-col justify-start items-center mb-5 gap-3">
        <h1 class="text-xl font-bold text-neutral-700">Or register with :</h1>
    <div class="flex">
        <AccountLinkVue icon="/storage/icon/facebook.png" />
        <AccountLinkVue icon="/storage/icon/google.png" />
        <AccountLinkVue icon="/storage/icon/tiktok.png" />
        <AccountLinkVue icon="/storage/icon/youtube.png" />
    </div>
      </div>

  </section>
</template>
<script setup>
import TextField from "@/Components/TextField.vue";
import { useForm } from "@inertiajs/vue3";
import AccountLinkVue from "@/Components/AccountLink.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
const handleRegister = () => {
  form.post(route("auth.register"));
};
</script>
