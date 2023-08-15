# README

## Sistema Administrativo Cotiz

Este repositorio contiene el código fuente de un sistema administrativo desarrollado por Kiibo para la empresa Codiz. El sistema está construido utilizando el framework Laravel.

### Descripción

El Sistema Administrativo Codiz es una herramienta diseñada para facilitar la gestión de la empresa Codiz. Proporciona funcionalidades como el manejo de usuarios, gestión de proveedores, control de servicios entre otros. El sistema está diseñado para ser intuitivo y fácil de usar, brindando a los usuarios una interfaz amigable y eficiente.

### Requisitos del sistema

Antes de instalar y utilizar el Sistema Administrativo Codiz, asegúrate de cumplir con los siguientes requisitos:

- PHP >= 7.3
- Laravel >= 8.x
- Composer (para la gestión de dependencias)

### Instalación

1. Clona este repositorio en tu entorno local.
2. Ejecuta el siguiente comando para instalar las dependencias del proyecto:

  composer install

3. Configura el archivo `.env` con los detalles de tu entorno de desarrollo (base de datos, configuraciones de correo electrónico, etc.).
4. Ejecuta las migraciones de la base de datos y seeder para generar la estructura inicial y los datos de prueba:

  php artisan migrate --seed

5. Inicia el servidor de desarrollo:

  php artisan serve

6. Accede al sistema administrativo en tu navegador web utilizando la siguiente URL:

  http://localhost:8000

### Credenciales de acceso

El Sistema Administrativo Codiz viene con los siguientes usuarios por defecto:

- Usuario: admin
- Contraseña: Admin15978
