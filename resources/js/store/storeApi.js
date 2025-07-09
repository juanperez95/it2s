import { ref } from 'vue';
import { defineStore } from 'pinia';
import axios from 'axios';

export const useStoreApi = defineStore('apiContext',()=>{

    const datos = ref([]); // Datos que se traen de cada peticion


    // Funcion para realizar peticiones al backend
    const requestApi = async(url="",method="GET",data=null) => {
        datos.value = await axios.request({
            url: url, // Url ala que se realiza la peticion
            method: method, // Metodo de la peticion
            data: data ? data : {}, // Datos de la peticion
        }).then(response => {
            return response.data;
        }).catch(error => {
            return {mistake:"error"}
        });
        // Devolver de la peticion la promesa
        return datos.value;
    }
    
    return {
        requestApi
    }
});