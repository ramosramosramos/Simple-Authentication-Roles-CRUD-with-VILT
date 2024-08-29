<template>

    <div
      v-for="product in products.data"
      :key="product.id"
      class="grid justify-center w-[250px] shadow-md text-[var(--mainColor)]"
    >
      <h1>{{ product.name }}</h1>
      <h1>{{ product.type }}</h1>
      <h1>{{ product.price }}</h1>
   <details>
    <summary>See more details</summary>
       <h1>{{ product.description }}</h1>
   </details>
    </div>

</template>
<script setup>
defineProps({
  products: Object,
});
</script>
