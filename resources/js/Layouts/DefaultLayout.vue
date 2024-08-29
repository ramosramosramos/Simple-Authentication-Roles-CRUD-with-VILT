<template>
<header>
<Navigation/>
</header>
<main @click="stateNav.hide()">
    <div class="h-[100px] ">

    </div>
    <slot/>

</main>
</template>
<script setup>
import Navigation from '@/Components/Navigation.vue'
import { useNav } from '@/TypeScript/NavigationState';

const stateNav= useNav()
</script>
