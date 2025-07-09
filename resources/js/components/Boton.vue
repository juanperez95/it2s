<template>
    <div>
        <button :class="['bg-'+color_btn+'-500 p-3 text-white rounded-md efecto_btn']" :type="tipo_btn" @click="$emit('funcion_btn')">{{ texto_btn }}</button>
    </div>
</template>

<script setup>

// Definir las propiedades del componente
const props = defineProps({
    texto_btn: {
        type: String,
        required: true,
    },
    tipo_btn:String,
    color_btn:String
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