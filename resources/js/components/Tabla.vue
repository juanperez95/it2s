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
                    <tr class="">
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="text" class="w-full text-center" value="Juanito" :disabled="activar_edicion"/>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <select name="salon" id="salon" :disabled="activar_edicion">
                                <option value="A-1">A-1</option>
                                <option value="A-2">A-2</option>
                                <option value="B-1">B-1</option>
                                <option value="B-2">B-2</option>
                                <option value="C-1">C-1</option>
                            </select>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="text" class="w-full text-center" value="Pedro" :disabled="activar_edicion">
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <input type="number" class="w-full text-center" value="18" :disabled="activar_edicion">
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400">
                            <select class="w-full text-center" :disabled="activar_edicion">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </td>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400 flex gap-2">
                            <Boton :texto_btn="!activar_edicion ? 'Guardar' : 'Editar'" tipo_btn="button" color_btn="blue" @funcion_btn="activar_edicion ? activar_edicion = false : guardar_datos()"/>
                            <Boton :texto_btn="!activar_edicion ? 'Cancelar' : 'Eliminar'" tipo_btn="button" color_btn="green" @funcion_btn="!activar_edicion ? activar_edicion = true : eliminar_registro()"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{ store_tabla.tabla }}
        </section>
    </div>
</template>

<script setup>
import Boton from './Boton.vue';
import { useStoreTabla } from '../store/storeTabla.js'; // Importar store de la tabla
import { ref } from 'vue'; 

const store_tabla = useStoreTabla(); // Manejar el store de la tabla

const activar_edicion = ref(true); // Activar los inputs de la tabla cuando editen la informacion

// Funcion para guardar la edicion
const guardar_datos = () => {
    console.log("Guardando datos");
}

// Funcion para eliminar datos
const eliminar_registro = () => {
    console.log("Eliminando registro");
}

</script>

<style scoped>
    
</style>