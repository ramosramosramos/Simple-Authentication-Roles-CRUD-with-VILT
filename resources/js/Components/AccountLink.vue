<template>
  <div
    class="flex justify-center items-center w-[50px] hover:scale-125  hover:shadow-md transition-all ease-in-out duration-500 h-[50px] rounded-full"
  >
    <button
      class="flex justify-center items-center  hover:scale-95 w-[90%] h-[90%] rounded-full text-gray-50 transition-all ease-in-out duration-500"
    >
      <img :src="icon" alt="" class="w-[80%] h-[80%] m-auto hover:scale-105" />
    </button>
  </div>
</template>
<script setup>
defineProps({
  name: String,
  icon:String,
});
</script>
