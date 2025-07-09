import { createRouter, createWebHistory } from 'vue-router';

// Importar paginas para asignarles rutas
import Nino from './pages/Nino.vue';
import Acudiente from './pages/Acudiente.vue';


const routes = [

    {
        path: '/nino',
        name: 'Niño',
        component: Nino, // Componente de pagina de registro de nino
    },
    {
        path: '/acudiente',
        name: 'Acudiente',
        component: Acudiente, // Componente de pagina de registro de acudiente
    }
];

export const router = createRouter({
    history: createWebHistory(),
    routes,
});