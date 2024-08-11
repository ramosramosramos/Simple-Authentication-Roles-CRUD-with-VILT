<template>
<header>
<Navigation/>
</header>
<main @click="stateNav.hide()">
    <slot/>

</main>
</template>
<script setup>
import Navigation from '@/Components/Navigation.vue'
import { useNav } from '@/TypeScript/NavigationState';

const stateNav= useNav()
</script>
