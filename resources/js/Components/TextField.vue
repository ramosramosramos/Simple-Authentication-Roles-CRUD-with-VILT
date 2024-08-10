<template>
  <div class="mb-6">
    <label class="mb-1 text-[20px] text-neutral-900">{{label}}</label>
    <input
      :type="type"
      :placeholder="placeholder"
      v-model="model"
      class="w-full outline-none rounded-md placeholder:text-neutral-800"
    />
    <p v-if="error" class="text-red-700 animate-pulse">{{error}}</p>
  </div>
</template>
<script setup>
defineProps=({
label:String,
placeholder:String,
type:String,
error:String,
})
const model = defineModel()
</script>
