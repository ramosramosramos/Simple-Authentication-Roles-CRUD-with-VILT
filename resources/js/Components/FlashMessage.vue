<template>
  <div v-if="flash"
  :class="[{'bg-blue-600 ':flash.created},{'bg-red-700':flash.deleted},
  ' text-gray-200 w-[100%]']">
    <p v-if="flash.deleted" class="px-2">{{ flash.deleted }}</p>
    <p v-if="flash.created" class="px-2">{{ flash.created }}</p>
</div>
</template>
<script setup>




defineProps({
    flash:Object
})
</script>
