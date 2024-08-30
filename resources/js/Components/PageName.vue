<template>
    <div class=" text-gray-600">
        <h class="text-3xl"><strong>{{ name }}</strong></h>
       </div>
</template>
<script setup>
defineProps({
    name:{
        type:String,
        default:'Page Name',
    }
})

</script>
