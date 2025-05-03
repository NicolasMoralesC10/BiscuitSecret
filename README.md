# Biscuit Secret - Sistema de Gestión <img src="https://github.com/user-attachments/assets/2ec2e5ef-5be4-424e-b492-c18e028fa50b" width="50" height="50" alt="Biscuit Secret Logo" align="right">

## Descripción del Proyecto

Biscuit Secret es un sistema de gestión desarrollado en Laravel para administrar un negocio de galletas. Este proyecto formativo permite gestionar productos, ventas y usuarios de manera eficiente y segura.

---

## Contenidos

* [Descripción del Proyecto](#descripción-del-proyecto)
* [Scrum Master](#scrum-master)
* [development team](#development-team)
* [Características Principales](#características-principales)
* [Requisitos Técnicos](#requisitos-técnicos)
* [Instalación](#instalación)

  * [Paso 1: Clonar el repositorio](#paso-1-clonar-el-repositorio)
  * [Paso 2: Instalar dependencias](#paso-2-instalar-dependencias)
  * [Paso 3: Configuración del entorno](#paso-3-configuración-del-entorno)
  * [Paso 4: Ejecutar migraciones y seeders](#paso-4-ejecutar-migraciones-y-seeders)
  * [Paso 5: Iniciar el servidor](#paso-5-iniciar-el-servidor)
* [Estructura del Proyecto](#estructura-del-proyecto)
* [Uso Básico](#uso-básico)


## Scrum Master 

- **Scrum Master**: Camilo Vanegaz - Instructor, Institución SENA

## Development Team 

- <strong>Development Leader</strong>: Nicolas Morales
  <a href="https://github.com/NicolasMoralesC10" target="_blank" rel="noopener noreferrer">
    <img
      src="https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white"
      alt="GitHub"
      align="center"
      height="30"
      style="margin-left:3.5em;"
    />
  </a>

- <strong>Team</strong>: Sean Paul Moreno
  <a href="https://github.com/Paul4357" target="_blank" rel="noopener noreferrer">
    <img
      src="https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white"
      alt="GitHub"
      align="center"
      height="30"
      style="margin-left:3.5em;"
    />
  </a>

- <strong>Team</strong>: Juan Esteban Gonzalez
  <a href="https://github.com/JuanesGonzalez17" target="_blank" rel="noopener noreferrer">
    <img
      src="https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white"
      alt="GitHub"
      align="center"
      height="30"
      style="margin-left:3.5em;"
    />
  </a>

## Características Principales 

- **Gestión de Productos**: Catálogo completo con información detallada, precios e inventario.
- **Gestión de Ventas**: Registro y seguimiento de transacciones, reportes e historial.
- **Gestión de Usuarios**: Sistema de roles y permisos para diferentes niveles de acceso.
- **Recuperación de Contraseña**: Sistema de recuperación segura mediante correo electrónico.
- **Interfaz Intuitiva**: Diseño responsive y amigable para una mejor experiencia de usuario.

## Requisitos Técnicos 
🛠️

- **Sistema Operativo**: Linux (Ubuntu recomendado), macOS, o Windows
- **PHP**: Versión 8.1 o superior
- **Laravel**: Versión 11.44 o superior
- **Base de Datos**: MySQL, PostgreSQL o SQLite
- **Composer**: Gestor de dependencias para PHP

## Instalación 
📥

### Paso 1: Clonar el repositorio

```bash
git clone https://github.com/NicolasMoralesC10/biscuit-secret.git
cd biscuit-secret
```

### Paso 2: Instalar dependencias

```bash
composer install
```

### Paso 3: Configuración del entorno

```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con la información de tu base de datos:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biscuit_secret
DB_USERNAME=root
DB_PASSWORD=
```

### Paso 4: Ejecutar migraciones y seeders

```bash
php artisan migrate
php artisan db:seed
```

### Paso 5: Iniciar el servidor

```bash
php artisan serve
```

El sistema estará disponible en: `http://localhost:8000`

## Estructura del Proyecto 
📁

```
biscuit-secret/
├── app/
│   ├── Http/
│   │   ├── Controllers/  # Controladores de la aplicación
│   │   └── Middleware/   # Middlewares personalizados
│   └── Models/           # Modelos de la aplicación
├── config/               # Archivos de configuración
├── database/             # Migraciones y seeders
├── public/               # Archivos públicos
├── resources/            # Vistas, CSS, JS, etc.
├── routes/               # Definición de rutas
└── tests/                # Pruebas automatizadas
```

## Uso Básico 

1. **Iniciar Sesión**: Accede con tus credenciales en la página principal.
2. **Panel de Control**: Navega por las diferentes secciones según tu rol.
3. **Gestión de Productos**: Agrega, edita o elimina productos del catálogo.
4. **Registro de Ventas**: Crea nuevas ventas y consulta el historial.
5. **Administración de Usuarios**: Gestiona las cuentas y permisos.
