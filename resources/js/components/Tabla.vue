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
                    <!-- Validar si la base de datos tiene informacion-->
                    <tr v-if="store_tabla.tabla.length > 0" class="" v-for="(nino, index) in store_tabla.tabla" :key="nino.id">
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
                            <Boton :texto_btn="'Editar'" tipo_btn="button" :icono="['fas','edit']" @funcion_btn="editar_datos(nino)"/>
                            <Boton :texto_btn="'Eliminar'" tipo_btn="button" :icono="['fas','trash']" @funcion_btn="eliminar_registro(nino)"/>
                        </td>
                    </tr>
                    <tr v-else>
                        <td class="p-1 text-center ml-2 border-b-1 border-blue-400" colspan="5">
                            <p class="m-5 ml-20 text-center">No hay registros</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- Editar los datos de los niños -->
        <section class="p-5 mt-7">
            
            <form @submit.prevent class="flex flex-col">
                <h2 class="text-2xl font-bold">Editar datos del niño</h2>
                <p><strong>Nota:</strong> para editar a un acudiente , seleccionelo en editar y despues presione el boton <strong>"configurar acudiente"</strong>.</p>
                <article class="mt-5 grid grid-cols-3 gap-3">
                    <input type="text" placeholder="Nombre del niño" class="inputs" v-model="datos_edicion.nombre">
                    <!--Select para el salon-->
                    <select class="inputs" v-model="datos_edicion.salon">
                        <option value="A-1">A-1</option>
                        <option value="A-2">A-2</option>
                        <option value="B-1">B-1</option>
                        <option value="B-2">B-2</option>
                        <option value="C-1">C-1</option>
                    </select>
                    <!-- Select que contiene los acudidentes registrados en el momento-->
                    <select class="inputs" v-model="datos_edicion.acudiente_id">
                        <option :value="acudiente.id" v-for="acudiente in acudientes" :key="acudiente.id">{{ acudiente.nombre }}</option>
                    </select>
                    
                    <!-- Edad del niño -->
                    <input type="number" placeholder="Edad del niño" class="inputs" v-model="datos_edicion.edad">
                    <!-- Genero del niño -->
                    <select class="inputs" v-model="datos_edicion.genero">
                        <option :value="genero.nombre" v-for="genero in generos" :key="genero.id">{{ genero.nombre }}</option>
                    </select>
                </article>
                <!-- Botones para enviar datos al backend -->
                <article class="flex justify-end mt-5 gap-7">
                    <Boton texto_btn="Guardar" tipo_btn="submit" :icono="['fas','save']" @funcion_btn="guardar_datos_nino"/>     
                    <Boton texto_btn="Refrescar acudientes" tipo_btn="button" :icono="['fas','sync']" @funcion_btn="refrescarAcudiente"/>     
                    <!-- Boton para configuracion del acudiente -->     
                    <Boton texto_btn="Configurar acudiente" tipo_btn="button" :icono="['fas','cog']" @funcion_btn="conf_acudiente(datos_edicion.acudiente_id)"/>
                </article>

            </form>
        </section>
        <!-- Configuracion del acudiente -->
        <section v-if="activar_conf_acudiente" class="p-5 mt-7">
            <form @submit.prevent class="flex flex-col">
                <h2 class="text-2xl font-bold">Configurar acudiente</h2>
                <article class="mt-5 grid grid-cols-3 gap-3">
                    <input type="text" placeholder="Nombre del acudidente" class="inputs" v-model="conf_data_acudientes.nombre">
                    <!-- Select que contiene los generos de acudidentes-->
                    <select class="inputs" v-model="conf_data_acudientes.genero">
                        <option :value="genero.nombre" v-for="genero in generos" :key="genero.id" >{{ genero.nombre }}</option>
                    </select>
                </article>
                <!-- Botones para enviar datos al backend -->
                <article class="flex justify-end mt-5 gap-7">
                    <Boton texto_btn="Guardar" tipo_btn="submit" :icono="['fas','save']" @funcion_btn="guardar_datos_acudiente"/>     
                    <Boton texto_btn="Borrar" tipo_btn="button" :icono="['fas','trash']" @funcion_btn="eliminar_acudiente(datos_edicion.acudiente_id)"/>
                    <Boton texto_btn="Cancelar" tipo_btn="button" :icono="['fas','times']" @funcion_btn="activar_conf_acudiente = false"/>
                </article>

            </form>
        </section>
    </div>
</template>

<script setup>
import Boton from './Boton.vue';
import { useStoreTabla } from '../store/storeTabla.js'; // Importar store de la tabla
import { ref, reactive, onMounted } from 'vue'; 
import { useStoreApi } from '../store/storeApi.js';
import { useStoreAlerts } from '../store/storeAlerts.js'; // Importar store de notificaciones
import generos from '../generos.json'; // Importar generos de niños



const notificacion = useStoreAlerts(); // alertas
const api_context = useStoreApi(); // Importar store de la api

const store_tabla = useStoreTabla(); // Manejar el store de la tabla

const datos_edicion = ref([]); // Datos que se van a editar

const acudientes = ref([]);

// Cambiar datos del acudientes
const conf_data_acudientes = reactive({
    id:null,
    nombre:null,
    genero:"Femenino"
});

const activar_conf_acudiente = ref(false); // Activar la configuracion del acudiente


// Cada vez que renderiza el componente realiza una consulta
onMounted(async() => {
    store_tabla.tabla = await api_context.requestApi('/api/ninos','GET');
    acudientes.value = await api_context.requestApi('/api/acudientes','GET'); // Obtener los acudientes
});


// Funcion para guardar la edicion
const editar_datos = (nino) => {
    datos_edicion.value = nino;
}

// Efectuar cambios en base de datos
const guardar_datos_nino = async() => {
    // Realizar la peticion al backend
    if(datos_edicion.value.edad > 0){       
        let respuesta = await api_context.requestApi(`/api/ninos`, 'PUT', datos_edicion.value);

        if(respuesta.update_nino){
    
            // Actualizar la tabla con los nuevos datos
            store_tabla.tabla = await api_context.requestApi('/api/ninos','GET');
            notificacion.alertas('Los datos se han actualizado correctamente','success','');
        }else{
            notificacion.alertas('Error al actualizar los datos','error','');
        }
    }else{
        notificacion.alertas('La edad del niño debe ser mayor a 0','error','');
    }    
    
}

// Funcion para eliminar datos
const eliminar_registro = async(nino) => {
    const response = confirm(`¿Estás seguro de eliminar el registro del niño ${nino.nombre}?`);
    if(response){
        let respuesta = await api_context.requestApi(`/api/ninos`, 'DELETE',{id:nino.id});
        if(respuesta.delete_nino){
            store_tabla.tabla = await api_context.requestApi('/api/ninos','GET');
            notificacion.alertas('El registro se ha eliminado correctamente','success','');
        }else{
            notificacion.alertas('Error al eliminar el registro','error','');
        }
}};


// Funcion para refrescar cuando se agregan acudientes
const refrescarAcudiente = async() => {
    acudientes.value = await api_context.requestApi('/api/acudientes','GET'); // Obtener los acudientes
}



// ------------------------------------------------------------------------------- Datos acudiente


// Funcion para modificar los datos del acudiente
const conf_acudiente = async(acudiente) => {
    let datos_acudiente = acudientes.value.filter(a => a.id === acudiente); // Filtrar y asignar valores 
    conf_data_acudientes.id = datos_acudiente[0].id;
    conf_data_acudientes.nombre =  datos_acudiente[0].nombre;
    conf_data_acudientes.genero = datos_acudiente[0].genero;
    activar_conf_acudiente.value = true;
}

// Funcion para guardar cambios del acudiente
const guardar_datos_acudiente = async() => {
    let respuesta = await api_context.requestApi(`/api/acudientes`, 'PUT', conf_data_acudientes);
    if(respuesta.update_acudiente){
        notificacion.alertas('Los datos se han actualizado correctamente','success','');
        activar_conf_acudiente.value = false;
        // Actualizar la tabla de acudientes
        acudientes.value = await api_context.requestApi('/api/acudientes','GET'); // Obtener los acudientes
        // Actualizar la tabla de niños
        store_tabla.tabla = await api_context.requestApi('/api/ninos','GET');
    }else{
        notificacion.alertas('Error al actualizar los datos','error','');
    }
}

// Funcion para eliminar el acudiente
const eliminar_acudiente = async() => {
    const response = confirm(`¿Estás seguro de eliminar el acudiente ${conf_data_acudientes.nombre}, tenga en cuenta que se eliminaran los niños asociados a este acudiente?`);
    if(response){
        let respuesta = await api_context.requestApi(`/api/acudientes`, 'DELETE',{id:conf_data_acudientes.id});
        if(respuesta.delete_acudiente){
            notificacion.alertas('El acudiente se ha eliminado correctamente','success','');
            activar_conf_acudiente.value = false;
            // Actualizar la tabla general
            store_tabla.tabla = store_tabla.tabla.filter(nino => nino.acudiente_id !== conf_data_acudientes.id);
        }else{
            notificacion.alertas('Error al eliminar el acudidente','error','');
        }
    }
}

</script>

<style scoped>
    
</style>