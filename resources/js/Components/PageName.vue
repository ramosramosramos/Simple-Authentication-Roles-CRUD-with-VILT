<template>
  <div class="text-gray-600">
    <h1 class="text-3xl"
      ><strong>{{ name }}</strong></h1
    >
  </div>
</template>
<script setup>
defineProps({
  name: {
    type: String,
    default: "Page Name",
  },
});
</script>
