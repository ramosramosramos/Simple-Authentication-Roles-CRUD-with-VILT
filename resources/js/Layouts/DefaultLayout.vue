<template>
<header>
<Navigation/>
</header>
<main>
    <slot/>

</main>
</template>
<script setup>
import Navigation from '@/Components/Navigation.vue'
</script>
