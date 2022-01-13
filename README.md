# CRUD de roles, permisos y usuarios en Laravel 8.79 🤓

Sistema web para crear, modificar, eliminar y listar usuarios, roles y permisos.

## Comenzando 💪🚀

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas.

### Pre-requisitos 📋

_Que herramientas/programas necesitas para poner en marcha el proyecto y como instalarlos_

* GIT [Link](https://git-scm.com/downloads)
* Entorno de servidor local, Ej: [Laragon](https://laragon.org/download/), [XAMPP](https://www.apachefriends.org/es/index.html) o [LAMPP](https://bitnami.com/stack/lamp/installer).
* PHP Version 7.4 - 8.0 [Link](https://www.php.net/downloads.php).
* Manejador de dependencias de PHP [Composer](https://getcomposer.org/download/).
* Manejador de dependencias de Node [Node JS](https://nodejs.org/en/download/).


### Instalación 🔧

Paso a paso de lo que debes ejecutar para tener el proyecto en su servidor local.

 1. Primero que nada, clic en Fork 😊

 2. Desde la consola, inicia el git dentro de tu servidor:
    ```
    git init
    ```
 3. Luego, clona el repositorio dentro de la carpeta de tu servidor con el siguiente comando:
    ```
    git clone https://github.com/susananzth/CRUD-user-role-permission.git
    ```
 4. Ingresa a la carpeta del repositorio recien descargado desde tu explorador de archivos o con el siguiente comando:
    ```
    cd CRUD-user-role-permission
    ```
 5. Instala las dependencias del proyecto con los siguientes comandos:
    ```
    composer install
    ```
    ```
    npm install
    ```
 5. En la carpeta raiz del proyecto, crea el archivo ".env" copiando la información del [ejemplo](https://github.com/susananzth/CRUD-user-role-permission/blob/main/.env.example) y sustituya valores por los del acceso a su Base de datos.

 6. Ejecuta las migraciones y agrega los primeros registros con el siguiente comando:
    ```
    php artisan migrate --seed
    ```
 7. Inicializa el servidor local con el siguiente comando:
    ```
    php artisan serve
    ```
 8. Ejecuta el npm:
    ```
    npm run watch
    ```
 9. Listo, ya podrás visualizar e interactuar con el proyecto en local  😁

## Construido con 🛠️

Las herramientas que utilice para crear este proyecto

* Framework de PHP [Laravel](https://laravel.com/docs/8.x).
* Toolkit de diseño [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/).

## Autores ✒️

* **Susana Piñero** - *FrontEnd + BackEnd + Documentación* - GitLab: [susananzth](https://gitlab.com/susananzth) GitHub: [susananzth](https://github.com/susananzth)

## Licencia 📄

Este proyecto está bajo la Licencia (GNU General Public License v3.0) - mira el archivo [LICENSE.md](https://github.com/susananzth/CRUD-user-role-permission/blob/main/LICENSE.md) para detalles

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Regalame una estrella ⭐
* Copia el proyecto en tu cuenta dando clic en Fork 😊
