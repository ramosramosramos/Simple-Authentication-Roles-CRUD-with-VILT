<template>
  <div
    v-for="product in products.data"
    :key="product.id"
    class="grid justify-center w-[250px] shadow-md text-[var(--mainColor)]"
  >
  <img :src="product.image" alt="wala">
    <p> <strong>Name: </strong> {{ product.name }}</p>
    <p> <strong>Type: </strong>{{ product.type }}</p>
    <p><strong>Price: </strong> {{ product.price }}</p><br>
    <details >
      <summary class="list-none cursor-pointer hover:text-gray-900">See more details</summary>

      <p>{{ product.description }}</p>
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
