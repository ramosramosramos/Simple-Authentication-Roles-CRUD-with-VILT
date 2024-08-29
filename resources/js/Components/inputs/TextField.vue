<template>
  <div class="mb-5 select-none mr-4 ml-4">
    <label class="text-sm text-neutral-100"
      >{{ label }} <strong class="text-red-600">*</strong></label
    >
    <input
      :type="type"
      :placeholder="placeholder"
      v-model="model"
      :class="{ 'border-red-500 border-b-3': error, ' border-b-gray-300': !error }"
      class="w-full outline-none rounded-sm bg-inherit text-gray-50 placeholder:text-slate-300 placeholder:text-sm border-t-0 border-l-0 border-r-0 border-b-[3px] active:border-yellow-300 focus:border-yellow-300 focus:ring-0 transition-all ease-in-out duration-700"
    />
    <p v-if="error" class="text-red-600 animate-pulse">{{ error }}</p>
  </div>
</template>
<script setup>
defineProps({
  label:{
    type:String,
    default:'label',
  } ,
  placeholder: {
    type:String,
    default:"placeholder"
  },
  type: String,
  error: String,
});
const model = defineModel();
</script>
