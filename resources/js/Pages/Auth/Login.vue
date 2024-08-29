<template>
  <section
    class="select-none flex flex-col gap-2 justify-center items-center min-h-[100vh] bg-purple-50"
  >
    <div class="flex flex-col min-w-[500px] rounded-lg bg-black">
      <h1 class="text-gray-200 mb-5 mt-5 text-center text-xl tracking-widest">Login</h1>
      <form @submit.prevent="handleLogin" class="w-[90%] m-auto">
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

        <div class="mb-4 w-[95%] m-auto">
          <input
            type="checkbox"
            id="checkbox"
            v-model="form.remember"
            class="cursor-pointer hover:bg-blue-200 focus:ring-0 rounded-sm transition-all ease-in-out duration-500"
          />
          <label
            for="checkbox"
            class="px-2 text-gray-200 text-sm hover:text-blue-700 cursor-pointer transition-all ease-in-out duration-500"
            >Remember me</label
          >
        </div>

        <div class="w-[90%] m-auto">
          <button
            v-if="!form.processing"
            type="submit"
            :disabled="form.processing"
            class="w-[100%] rounded-md h-[40px] text-gray-50 bg-blue-800 hover:bg-blue-700 active:bg-blue-600 mb-5 transition-all ease-in-out duration-500"
          >
            Login
          </button>
        </div>

        <div class="mt-5 mb-5 text-sm">
          <Link
            :href="route('register')"
            class="text-blue-800 hover:text-blue-600 transition-all ease-in-out duration-500"
          >
            Don't have an account? Register</Link
          >
        </div>
      </form>
    </div>
    <div class="flex flex-col justify-start items-center mb-5 gap-3">
      <h1 class="text-xl font-bold text-neutral-700">Login with :</h1>
      <div class="flex">
        <AccountLinkVue :route="route('auth.github','github')" icon="/storage/icon/github.png" />

      </div>
    </div>
  </section>
</template>
<script setup>
import TextField from "@/Components/inputs/TextField.vue";
import { useForm } from "@inertiajs/vue3";
import AccountLinkVue from "@/Components/AccountLink.vue";

const form = useForm({
  email: "",
  password: "",
  remember: false,
});
const handleLogin = () => {
  form.post(route("auth.login"));
};
</script>
