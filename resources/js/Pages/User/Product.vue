<template>
<div v-for="product in products.data" :key="product.id">
<h1>{{ product.name }}</h1>
</div>
</template>
<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
defineOptions({

    layout:DefaultLayout,
})
defineProps({
products:Object
})
</script>

