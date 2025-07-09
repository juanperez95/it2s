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
                    <select class="inputs" v-model="datos_nino.acudiente">
                        <option value="0">Seleccione el acudiente</option>
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
                    <Boton texto_btn="Registrar Niño" tipo_btn="submit" :icono="['fas','save']" @funcion_btn="console.log(datos_nino)"/>                    
                </article>

            </form>
        </section>
    </div>
</template>

<script setup>
// Importar json para generos de acudiente y niños
import generos from '../generos.json';
import Boton from './Boton.vue';
import { reactive } from 'vue';

// Datos del formulario del niño
const datos_nino = reactive({
    nombre: null,
    salon: null,
    acudiente: null,
    edad: null,
    genero: "Femenino"
});



</script>

<style scoped>
    
</style>