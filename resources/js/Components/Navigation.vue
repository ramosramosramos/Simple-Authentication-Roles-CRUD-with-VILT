<template>
    <nav  class="fixed w-[100%] h-[100px] flex items-center bg-neutral-950">
        <button @click="stateNav.change()" class="text-yellow-50 ml-2">Menu</button>
    </nav>
    <aside :class="{'left-[-999px]':!stateNav.isChange.value,'left-0':stateNav.isChange.value}"
     class=" absolute  w-[280px] h-[100%] bg-black  transition-all ease-in-out duration-700"
    >

    </aside>
</template>
<script setup>
import { useNav } from '@/TypeScript/NavigationState';

const stateNav= useNav();
</script>
