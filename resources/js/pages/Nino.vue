<template>
    <div>
        <section class="flex justify-end">
            <article :class="['estilo_modal', modal_activo]">
                <article class="text-center text-2xl flex justify-between items-center">
                    <h1>Registrar Niño</h1>
                    <p class="text-gray-400 cursor-pointer hover:text-gray-500" @click="cerrar_modal">X</p>
                </article>
                <article>
                    <!-- Componente para el formulario de registro -->
                    <FormNino />
                </article>
            </article>
        </section>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import FormNino from '../components/FormNino.vue'; // Formulario


const modal_activo = ref("efecto_modal-active"); // Validar si el modal esta activo

// Funcion para cerrar el modal
const cerrar_modal = () => {
    modal_activo.value = "efecto_modal";
}

</script>

<style scoped>

</style>