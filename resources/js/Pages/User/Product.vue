<template>
  <section class=" min-h-[100vh]">


    <div class="h-[50px] ">
        <Link :href="route('products.create')" as="button" type="button"  class="bg-blue-600 hover:bg-blue-700 text-gray-200 ml-10 px-2
        rounded-sm outline-none transition-all ease-in-out duration-300">Add Product</Link>
    </div>

    <div class="h-[50px] ">

    </div>
    <div class=" flex flex-wrap justify-center w-[90%] gap-2 m-auto ">
      <CardProduct :products="products" />
    </div>
  </section>
</template>
<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import CardProduct from "@/Components/Cards/CardProduct.vue";
defineOptions({
  layout: DefaultLayout,
});
defineProps({
  products: Object,
});
</script>
