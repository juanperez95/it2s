<template>
    <div>
        <!-- Cabecera de la pagina -->
        <header class="bg-black p-5 text-white text-center flex flex-col gap-5 justify-center items-center">
            <img src="./assets/icono.png" alt="Logo de IT2S" class="imagen">
        </header>
        <section class="flex gap-10 p-5">
            <!-- Rutas de vue para navegar por las vistas -->
            <router-link to="/nino"><Boton texto_btn="Registrar niño" tipo_btn="button" :icono="['fas','children']"/></router-link>
            <router-link to="/acudiente"><Boton texto_btn="Registrar acudiente" tipo_btn="button" :icono="['fas','users']"/></router-link>
        </section>
        <!-- Mostrar las vistas en base a las rutas y las paginas--> 
        <section class="p-2">
            <router-view></router-view>
        </section>
        <!-- Mostrar los datos que hay en MYSQL en el componente tabla-->
        <section class="flex justify-center p-2">
            <Tabla />
        </section>
    </div>
</template>
<script setup>
import Boton from './components/Boton.vue';
import Tabla from './components/Tabla.vue';

</script>
<style scoped>
    
</style>