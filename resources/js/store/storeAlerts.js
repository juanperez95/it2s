import { defineStore } from "pinia";
import Swal from 'sweetalert2';

// Tiendas para manejar las notificaciones de manera global
export const useStoreAlerts = defineStore('alerts', ()=>{

    // Funcion para definir los mensaje e iconos de la alerta
    const alertas = (mensaje, icono, texto) => {
        Swal.fire({
            icon: icono,
            title: mensaje,
            text: texto,
            toast: true, // Notificacion pequeña
            position: 'top-end',
            timer: 3000, // El mensaje solo dura 3 segundos
        })
    }


    return {alertas};

});