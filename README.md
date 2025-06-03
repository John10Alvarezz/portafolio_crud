# Portafolio CRUD

Sistema de gestión de portafolio que permite crear, leer, actualizar y eliminar proyectos.

## Descripción
Este proyecto es un sistema CRUD (Create, Read, Update, Delete) para gestionar un portafolio de proyectos. Permite a los usuarios autenticados administrar sus proyectos, incluyendo imágenes, enlaces a GitHub y URLs de producción.

## Tecnologías Utilizadas
- PHP 7.4+
- MySQL/MariaDB
- Bootstrap 5.3.2
- HTML5
- CSS3
- JavaScript

## Estructura del Proyecto
```
portafolio_crud/
├── css/
│   └── styles.css
├── sql/
│   └── portafolio.sql
├── uploads/
│   └── [imágenes de proyectos]
├── add.php
├── auth.php
├── db.php
├── delete.php
├── edit.php
├── index.php
├── login.php
├── logout.php
└── README.md
```

## Requisitos Previos
- Servidor web (Apache/Nginx)
- PHP 7.4 o superior
- MySQL/MariaDB
- Servidor web configurado para permitir subida de archivos

## Instalación
1. Clonar el repositorio en tu servidor web
2. Importar el archivo `sql/portafolio.sql` en tu base de datos
3. Configurar las credenciales de la base de datos en `db.php`
4. Asegurarse que la carpeta `uploads/` tenga permisos de escritura
5. Acceder al sistema usando:
   - Usuario: admin
   - Contraseña: 123456

## Características
- Autenticación de usuarios
- Gestión completa de proyectos (CRUD)
- Subida de imágenes
- Interfaz responsiva con Bootstrap
- Validación de formularios