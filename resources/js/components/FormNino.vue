<template>
    <div>
        <section>
            <form @submit.prevent class="flex flex-col">
                <article class="mt-5 flex flex-col gap-3">
                    <input type="text" placeholder="Nombre del niño" class="inputs" v-model="datos_nino.nombre">
                    <!--Select para el salon-->
                    <select class="inputs" v-model="datos_nino.salon">
                        <option value="0">Seleccione el salon</option>
                        <option value="A-1">A-1</option>
                        <option value="A-2">A-2</option>
                        <option value="B-1">B-1</option>
                        <option value="B-2">B-2</option>
                        <option value="C-1">C-1</option>
                    </select>
                    <!-- Select que contiene los acudidentes registrados en el momento-->
                    <select class="inputs" v-model="datos_nino.acudiente_id">
                        <option :value="acudiente.id" v-for="acudiente in datos_acudiente" :key="acudiente.id">{{ acudiente.nombre }}</option>
                    </select>
                    <!-- Edad del niño -->
                    <input type="number" placeholder="Edad del niño" class="inputs" v-model="datos_nino.edad">
                    <!-- Genero del niño -->
                    <select class="inputs" v-model="datos_nino.genero">
                        <option :value="genero.nombre" v-for="genero in generos" :key="genero.id">{{ genero.nombre }}</option>
                    </select>
                </article>
                <!-- Botones para enviar datos al backend -->
                <article class="flex justify-end mt-5">
                    <Boton texto_btn="Registrar Niño" tipo_btn="submit" :icono="['fas','save']" @funcion_btn="registrar_nino"/>                    
                </article>

            </form>
        </section>
        
    </div>
</template>

<script setup>
// Importar json para generos de acudiente y niños
import generos from '../generos.json';
import Boton from './Boton.vue';
import { reactive, ref, onMounted } from 'vue';
import { useStoreApi } from '../store/storeApi.js'; // Importar store de la api
import { useStoreTabla } from '../store/storeTabla'; 
import { useStoreAlerts } from '../store/storeAlerts.js';


const api_context = useStoreApi();
const store_tabla = useStoreTabla(); // Datos de la tabla

const datos_acudiente = ref([]); // Datos de la peticion sobre el acudiente

const notificacion = useStoreAlerts(); // Store de notificaciones

onMounted(async() => {
    await obtener_acudientes();
});

// Datos del formulario del niño
const datos_nino = reactive({
    nombre: null,
    salon: null,
    acudiente_id: null,
    edad: null,
    genero: "Femenino",
});

// Funcion para registrar al niño en base de datos
const registrar_nino = async() => {
    if(datos_nino.edad > 0){
        let respuesta = await api_context.requestApi('/api/ninos','POST',datos_nino);
        // mostrar mensaje de registro
        if(respuesta.create_nino){
            notificacion.alertas('El niño se ha registrado correctamente','success','');
            // Actualizar la tabla de acudiendo
            store_tabla.tabla = await api_context.requestApi('/api/ninos','GET');
        }else{
            notificacion.alertas('¡Ha ocurrido un error en el registro!','error','');
        }
    }else{
        notificacion.alertas('La edad del niño debe ser mayor a 0','error','');
    }
}

// Obtener a los acudientes de la base de datos.
const obtener_acudientes = async() => {
    let respuesta = await api_context.requestApi('/api/acudientes','GET');
    datos_acudiente.value = respuesta;
}



</script>

<style scoped>
    
</style>