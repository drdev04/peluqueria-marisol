# Página Web + Panel Administrativo para Peluquería Marisol

## Descripción

Este proyecto consiste en una página web para una peluquería que permite a los clientes ver los servicios ofrecidos, reservar citas y contactar con la peluquería. Además, incluye un panel administrativo (cPanel) para que el administrador de la peluquería gestione los servicios, citas y usuarios. El proyecto está desarrollado utilizando PHP, MySQL, JavaScript y CSS. Utilizamos Visual Studio Code como editor de código y XAMPP como servidor local.

## Características

### Para los Clientes:
- Visualización de productos y servicios
- Reservas de citas y citas especiales
- Formulario de contacto

### Para el Administrador (cPanel):
- Gestión de servicios (Crear, Leer, Actualizar, Eliminar)
- Gestión de citas (Crear, Leer, Actualizar, Eliminar)
- Gestión de usuarios (Crear, Leer, Actualizar, Eliminar)
- Gestión de facturas (Crear, Leer, Actualizar, Eliminar)

## Tecnologías Utilizadas
![Static Badge](https://img.shields.io/badge/PHP-blue?style=for-the-badge&logo=PHP&logoSize=auto&labelColor=black)
![Static Badge](https://img.shields.io/badge/v_8.2.12-red?logoSize=auto)

![Static Badge](https://img.shields.io/badge/JavaScript-%23F7DF1E?style=for-the-badge&logo=javascript&logoSize=auto&labelColor=black)
![Static Badge](https://img.shields.io/badge/EMAScript-red?logoSize=auto)

![Static Badge](https://img.shields.io/badge/CSS-%231572B6?style=for-the-badge&logo=css3&logoSize=auto&labelColor=black)
![Static Badge](https://img.shields.io/badge/CSS3-red?logoSize=auto)

![Static Badge](https://img.shields.io/badge/MySQL-skyblue?style=for-the-badge&logo=MySQL&logoSize=auto&labelColor=black)
![Static Badge](https://img.shields.io/badge/v_8.0.31-red?logoSize=auto)

![Static Badge](https://img.shields.io/badge/Servidor%20XAMPP-%23FB7A24?style=for-the-badge&logo=xampp&logoSize=auto&labelColor=black)
![Static Badge](https://img.shields.io/badge/v_8.2.12-red?logoSize=auto)

## Requisitos

- [XAMPP](https://www.apachefriends.org/index.html) instalado en tu máquina.
- [Visual Studio Code](https://code.visualstudio.com/) instalado.
- Navegador web moderno (Google Chrome, Firefox, etc.).

## Instalación y Configuración

### 1. Clonar el Repositorio
git clone https://github.com/tu-usuario/peluqueria-marisol.git

### 2. Configurar XAMPP
Inicia el panel de control de XAMPP y arranca los servicios de Apache y MySQL.

### 3. Importar la Base de Datos
Abre phpMyAdmin desde el panel de control de XAMPP.
Crea una nueva base de datos llamada peluqueria.
Importa el archivo peluqueria.sql ubicado en la carpeta database del proyecto.

### 4. Configurar el Archivo de Conexión a la Base de Datos
Navega a la carpeta config y abre el archivo dbconnection.php.
Configura las credenciales de la base de datos según tu entorno de XAMPP.

<?php
$host = 'localhost';
$dbname = 'peluqueria';
$username = 'root';
$password = '';

### 5. Iniciar el Proyecto
Copia el proyecto a la carpeta htdocs de tu instalación de XAMPP.
Abre tu navegador y ve a "http://localhost/peluqueria-marisol".

## Estructura del Proyecto
plaintext
Copiar código
peluqueria/
├── config/
│   └── db.php
├── css/
│   └── styles.css
├── js/
│   └── scripts.js
├── admin/
│   ├── index.php
│   ├── manage_services.php
│   ├── manage_appointments.php
│   └── manage_users.php
├── client/
│   ├── index.php
│   ├── services.php
│   ├── appointment.php
│   └── contact.php
├── database/
│   └── peluqueria.sql
├── .gitignore
├── README.md
└── index.php

## Uso
### Para Clientes
Visita la página principal.
Navega a la sección de servicios para ver los servicios ofrecidos.
Reserva una cita a través del formulario de citas.
Utiliza el formulario de contacto para enviar un mensaje a la peluquería.
Para Administradores
Inicia sesión en el cPanel.
Gestiona los servicios, citas y usuarios a través de las opciones del menú.

Licencia
Este proyecto está bajo la Licencia MIT. Ver el archivo LICENSE para más detalles.

¡Gracias por utilizar nuestro proyecto de peluquería! Si tienes alguna pregunta o sugerencia, no dudes en contactarnos.

