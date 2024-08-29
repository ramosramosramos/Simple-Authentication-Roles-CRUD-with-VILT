<template>
<header>
<Navigation/>
</header>
<main @click="stateNav.hide()">
    <div class=" flex items-center justify-center h-[150px] ">
<FlashMessage :flash="$page.props.flash"/>
    </div>
    <slot/>

</main>
</template>
<script setup>
import Navigation from '@/Components/Navigation.vue'
import { useNav } from '@/TypeScript/NavigationState';
import FlashMessage from '@/Components/FlashMessage.vue';

const stateNav= useNav()

</script>
