<template>
  <section class="min-h-[100vh]">
    <div class="grid grid-cols-2 gap-[1rem] w-[90%] m-auto">
      <form @submit.prevent="handleCreate">
        <ProductField
          v-model="form.name"
          label="Product name"
          placeholder="Tomato...etc"
          required
          :error="errors.name"
        />
        <ProductField
          v-model="form.price"
          label="Price"
          type="number"
          placeholder="00.00"
          required
          :error="errors.price"
        />
        <ProductField
          v-model="form.type"
          label="Product Type"
          placeholder="Fruits...etc"
          required
          :error="errors.type"
        />
        <ProductField
          v-model="form.description"
          label="Description"
          placeholder="This is a product....etc"
          :required="false"
          :error="errors.description"
        />

        <button
          class="bg-blue-600 hover:bg-blue-700 w-[100%] text-gray-200 transition-all ease-in duration-300 h-[40px] rounded-sm"
        >
          Add to List
        </button>
      </form>

      <!--//! -----image-------------- -->
      <div
        class="min-h-[20vh] lg:w-[50%] rounded-md flex flex-col justify-center items-center text-gray-400 text-[20px] bg-gray-300 mb-3"
      >
        <input type="file" id="image" accept=".png,.jpg" @change="handleImage" hidden />
        <label for="image" class="w-[100%] h-[100%] flex justify-center items-center">
          <div v-if="!imagePreview">Add Photo <span class="text-red-600">*</span></div>
          <img v-if="imagePreview" :src="imagePreview" alt="" class="w-[100%]" />
        </label>
        <p  v-if="errors.image" class="text-red-600 animate-pulse"><small>{{ errors.image }}</small></p>
      </div>

    </div>
  </section>
</template>

<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ProductField from "@/Components/inputs/ProductField.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
  layout: DefaultLayout,
});
defineProps({
    errors:Object,
})
const imagePreview = ref(null);

const form = useForm({
  name: "",
  type: "",
  price: Number,
  description: "",
  image: null,
});
const handleImage = (e) => {
  const file = e.target.files[0];
  form.image = file;
  if (imagePreview.value) {
    URL.revokeObjectURL(imagePreview.value);
  }
  imagePreview.value = URL.createObjectURL(file);

};

const handleCreate = ()=>{
form.post(route('products.store'));
}
</script>
