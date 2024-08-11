<template>
<section class="min-h-[100vh] bg-[#faf9f9]">
    <div v-for="product in products.data" :key="product.id">
        <h1>{{ product.name }}</h1>
        </div>
</section>
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

