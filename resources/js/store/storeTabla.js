import { defineStore } from 'pinia';
import {ref} from 'vue';

export const useStoreTabla = defineStore('store_tabla',()=>{
    const tabla = ref([]); // Datos de la tabla


    return {tabla};
})