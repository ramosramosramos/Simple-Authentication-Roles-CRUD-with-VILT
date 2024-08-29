import { ref } from "vue";

export const menus = ref([
    { name: "Dashboard",route:'dashboard',component:'User/Dashboard', subMenu: ['Daily sales','Records'] },

    { name: "Product", route :'products.index',component:'User/Product',submenu:['Add Product'] },
]);

