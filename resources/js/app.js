import './bootstrap';

import App from './App.vue'; // Importar la pagina principal
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { router } from './routers';

// Importar css de uso general
import '../css/app.css';

// Importar iconos font awesome
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPlus, faChildren, faTrash, faEdit, faSave, faClose, faCheck, faUsers, faSync, faCog } from '@fortawesome/free-solid-svg-icons';
library.add(faPlus, faChildren, faTrash, faEdit, faSave, faClose, faCheck, faUsers, faSync, faCog);


const pinia = createPinia(); // Manejar estados globales en vue

const app = createApp(App);

app.use(pinia);
app.use(router); // Usar el router para manejar las rutas con vue
app.mount('#app');