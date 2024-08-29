<template>
  <div v-if="flash"
  :class="['bg-green-600 w-[100%]',{'bg-red-700':flash.deleted},
  ' text-gray-200']">
    <p class="px-2">{{ flash.deleted }}</p>
</div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3";



defineProps({
    flash:Object
})
</script>
