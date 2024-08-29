<template>
    <div class="mb-5 select-none mr-4 ml-4">
      <label class="text-[var(--mainColor)]"
        >{{ label }} <strong v-if="required" class="text-red-600">*</strong></label
      >
      <input
        :type="type"
        :placeholder="placeholder"
        v-model="model"
        :class="{ 'border-red-500 border-b-3': error, ' border-gray-300': !error }"
        class="w-full outline-none rounded-sm bg-inherit text-[var(--mainColor)] placeholder:text-slate-400
        placeholder:text-sm shadow-md


        transition-all ease-in-out duration-300"
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
    type: {
        type:String,
        default:'text',
    },
    error: String,
    required:{
        type:Boolean,
        default:false
    }
  });
  const model = defineModel();
  </script>
