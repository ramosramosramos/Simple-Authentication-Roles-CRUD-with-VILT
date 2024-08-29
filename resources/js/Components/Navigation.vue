<template>
    <nav class="fixed z-10 w-[100%] h-[60px] flex items-center bg-[#faf6e9] shadow-lg">
        <button @click="stateNav.change()" class="text-neutral-900 ml-2">Menu</button>
    </nav>
    <aside :class="{'left-[-999px]': !stateNav.isChange.value, 'left-0': stateNav.isChange.value}"
        class="absolute z-50 w-[280px] h-[100%] bg-[#fffdf6] shadow-xl transition-all ease-in-out duration-700"
    >
        <div v-for="(menu, index) in menus" :key="index" class="select-none cursor-pointer  ">
            <summary class="h-[40px] w-[90%] m-auto flex
             text-gray-950 items-center justify-center outline-blue-700 shadow-md active:bg-neutral-200
              hover:bg-neutral-200 transition-all ease-in-out
              duration-300 rounded-sm"
              :class="{'bg-neutral-200 ':$page.component===menu.component}">
                <Link :href="route(menu.route)" as="button"
                 type="button" @click="openMenu(index)"
                 class="bg-transparent w-[100%] h-[100%] rounded-md">{{ menu.name }}</Link>
            </summary>
            <div class="h-[5px]"></div>
            <div v-if="menu.subMenu && isOpenDetails === index">
                <div v-for="(sub, subIndex) in menu.subMenu" :key="subIndex" class="text-gray-800 text-center w-[85%] h-[30px] m-auto shadow-sm">
                    <button class="w-[100%] outline-blue-700">{{ sub }}</button>
                </div>
            </div>
        </div>
    </aside>
</template>

<script setup>
import { useNav } from '@/TypeScript/NavigationState';
import { menus } from '@/TypeScript/Menu.ts';
import { ref } from 'vue';


const stateNav = useNav();
const isOpenDetails = ref(null);

const openMenu = (index) => {
    if (isOpenDetails.value === index) {
        isOpenDetails.value = null; // Close if the same menu is clicked again
    } else {
        isOpenDetails.value = index; // Open the clicked menu
    }
};
</script>
