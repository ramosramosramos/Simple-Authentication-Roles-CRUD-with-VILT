<template>
  <div
    v-for="product in products.data"
    :key="product.id"
    class="grid justify-center w-[250px] shadow-md text-[var(--mainColor)]"
  >
  <img :src="product.image" alt="wala">
    <h1>{{ product.name }}</h1>
    <h1>{{ product.type }}</h1>
    <h1>{{ product.price }}</h1>
    <details>
      <summary>See more details</summary>

      <h1>{{ product.description }}</h1>
      <Link :href="route('products.destroy',product.id)" method="delete" as="button" type="button"
        class="bg-red-600 hover:bg-red-700 transition-all outline-none ease-in-out duration-500 text-gray-200 px-2 rounded-sm m-1"
      >
        Remove
      </Link>
      <button
        class="bg-blue-600 hover:bg-blue-700 transition-all outline-none ease-in-out duration-500 text-gray-200 px-2 rounded-sm m-1"
      >
        Edit
      </button>
    </details>
  </div>
</template>
<script setup>
defineProps({
  products: Object,
});
</script>
