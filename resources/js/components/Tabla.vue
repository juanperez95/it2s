<template>
    <div>
        <section>
            <table>
                <!-- Columnas de la tabla-->
                <thead>
                    <tr class="">
                        <th class="p-3 bg-black text-white text-center">Nombre del niño</th>
                        <th class="p-3 bg-black text-white text-center">N° Salon</th>
                        <th class="p-3 bg-black text-white text-center">Nombre del acudiente</th>
                        <th class="p-3 bg-black text-white text-center">Edad</th>
                        <th class="p-3 bg-black text-white text-center">Genero</th>
                        <th class="p-3 bg-black text-white text-center">Acciones</th>
                    </tr>
                </thead>
                <!-- Contenido de la tabla-->
                <tbody>
                    <tr class="" v-for="(nino, index) in store_tabla.tabla" :key="nino.id">
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="text" class="w-full text-center" :value="nino.nombre" disabled id="nombre"/>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="text" class="w-full text-center" :value="nino.salon" disabled>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="text" class="w-full text-center" :value="nino.acudiente.nombre" disabled>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="number" class="w-full text-center" :value="nino.edad" disabled>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="text" class="w-full text-center" :value="nino.genero" disabled>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400 flex gap-2">
                            <!--- Cambiar iconos y textos en base a como edita los datos de la tabla en los botones de accion-->
                            <Boton :texto_btn="'Editar'" tipo_btn="button" :icono="['fas','edit']" />
                            <Boton :texto_btn="'Eliminar'" tipo_btn="button" :icono="['fas','trash']" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</template>

<script setup>
import Boton from './Boton.vue';
import { useStoreTabla } from '../store/storeTabla.js'; // Importar store de la tabla
import { ref, reactive, onMounted } from 'vue'; 
import { useStoreApi } from '../store/storeApi.js';

const api_context = useStoreApi(); // Importar store de la api

const store_tabla = useStoreTabla(); // Manejar el store de la tabla

const activar_edicion = ref(true); // Activar los inputs de la tabla cuando editen la informacion

// Cada vez que renderiza el componente realiza una consulta
onMounted(async() => {
    store_tabla.tabla = await api_context.requestApi('/api/ninos','GET');
    console.log(store_tabla.tabla);
});

// Datos para enviar a la base de datos
const datos_tabla = reactive({
    nombre: null,
    salon: null,
    acudiente: null,
    edad: null,
    genero: null
});

// Funcion para guardar la edicion
const guardar_datos = (nino) => {
    console.log(nino);
}

// Funcion para eliminar datos
const eliminar_registro = () => {
    console.log("Eliminando registro");
}


</script>

<style scoped>
    
</style>