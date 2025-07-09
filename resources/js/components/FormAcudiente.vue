<template>
    <div>
        <form @submit.prevent>
            <article class="mt-5 flex flex-col gap-3">
                <input type="text" placeholder="Nombre del acudidente" class="inputs" v-model="datos_acudiente.nombre">
                <!-- Select que contiene los generos de acudidentes-->
                <select class="inputs" v-model="datos_acudiente.genero">
                    <option :value="genero.nombre" v-for="genero in generos" :key="genero.id" >{{ genero.nombre }}</option>
                </select>
            </article>
            <!-- Botones para enviar datos al backend -->
            <article class="flex justify-end mt-5">
                <Boton texto_btn="Registrar Acudiente" tipo_btn="submit" :icono="['fas','save']" @funcion_btn="registrar_acudiente"/>                    
            </article>
        </form>
    </div>
</template>

<script setup>
import Boton from './Boton.vue';
import { ref, reactive } from 'vue'; 
import { useStoreApi } from '../store/storeApi.js'; 
import { useStoreAlerts } from '../store/storeAlerts.js'; 
import generos from '../generos.json'; // Importar generos de acudidentes

const api_context = useStoreApi(); 

const datos_acudiente = reactive({ // Datos acudiente
    nombre: null,
    genero: 'Femenino', 
}); 

const notificacion = useStoreAlerts(); 

// Funcion para registrar al acudidente en base de datos
const registrar_acudiente = async() => {
    let respuesta = await api_context.requestApi('/api/acudientes','POST',datos_acudiente);
    // mostrar mensaje de registro
    if(respuesta.create_acudiente){
        notificacion.alertas('El acudidente se ha registrado correctamente','success','');
        // Actualizar la tabla de acudiendo
        store_tabla.tabla = await api_context.requestApi('/api/acudientes','GET');
    }else{
        notificacion.alertas('¡Ha ocurrido un error en el registro!','error','');
    }
}

</script>

<style scoped>
    
</style>