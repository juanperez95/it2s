<template>
    <div>
        <button :class="['bg-blue-700 p-3 text-white rounded-md efecto_btn']" :type="tipo_btn" @click="$emit('funcion_btn')"><span v-if="icono">
            <FontAwesomeIcon :icon="icono" class="text-white"/>
        </span> {{ texto_btn }}</button>
    </div>
</template>

<script setup>

import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

// Definir las propiedades del componente
defineProps({
    texto_btn: {
        type: String,
        required: true,
    },
    tipo_btn:String,
    icono:Array
})

// Eventos o funciones del boton
const emits = defineEmits(['funcion_btn']);

</script>

<style scoped>
.efecto_btn{
    transition: all 0.3s ease-in-out;
}
.efecto_btn:hover{
    transform: scale(1.1);
}
    
</style>