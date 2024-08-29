<template>
  <section class=" min-h-[100vh]">
    <div class="h-[100px]">

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
