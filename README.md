# 🌱 IT2S - Gestion de Jardín

Este proyecto es una **prueba técnica** desarrollada para gestionar la información de un jardín infantil, incluyendo la administración de los niños matriculados y sus respectivos acudientes.

## 🛠 Tecnologías Utilizadas

El proyecto está construido con el siguiente stack tecnológico moderno:

### Backend
- **PHP 8.3**
- **Laravel** (Framework principal)
- **Composer** (Gestión de dependencias)

### Frontend
- **Vue.js** (Framework JavaScript progresivo)
- **Node.js** (Entorno para la gestión de paquetes)
- **Vite** (Herramienta de construcción rápida)
- **Tailwind CSS** (Utilidades CSS para diseño moderno)
- **Bootstrap** (Framework CSS para componentes visuales)

## 🎯 Objetivos de la Prueba Técnica

- Registrar niños que forman parte del jardín.
- Asociar acudientes a cada niño.
- Visualizar información general y detallada de cada niño y sus acudientes.
- Mantener una interfaz amigable y adaptable para usuarios administrativos.
- Realizar validaciones en el backend y frontend.

## 🧩 Módulos Principales

- **Gestión de Niños:** CRUD completo.
- **Gestión de Acudientes:** CRUD con relación directa a los niños.
- **Autenticación:** Acceso seguro al sistema (opcional si aplica).


## 🚀 Instrucciones de Instalación

### Requisitos
- PHP >= 8.3
- Composer
- Node.js
- MySQL (u otro gestor compatible con Laravel)

### Pasos

1. Clona el repositorio:

```bash
git clone https://github.com/juanperez95/it2s.git
cd it2s
```

2. Instala las dependencias composer:

```bash
composer install
```

3. Configurar el .env.example con los datos de conexión a la base de datos:

```bash
cp .env.example .env
```

---
### Nota
Configurar el archivo .env.example con los datos de conexión a la base de datos:

```bash
DB_CONNECTION=mysql // puede ser cualquier motor compatible con Laravel
DB_HOST=127.0.0.1
DB_PORT=3306 // puerto de la base de datos
DB_DATABASE=it2s
DB_USERNAME=root // usuario
DB_PASSWORD= // clave de base de datos
```

4. Crear la base de datos y la tabla de esquema:

```bash
php artisan migrate
```

5. Instalar dependencias de front-end:

```bash
npm install
```

6. Correr el node en una terminal:

```bash
npm run dev
```

7. Correr el backend en otra terminal:

```bash
php artisan serve
```

8. Abrir el navegador en http://localhost:5173


