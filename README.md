<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


# ACERCA DE BUK-API 
BUK-API es el API Server para el proyecto BUK, el cual permite la carga, administración y control de servicios turísticos.

## Requisitos

1.  PHP 7.0 o superior
2.  MYSQL 5.7 o superior
3.  Laravel 5.4 o superior
4.  Composer

##  Configuración

1.  Clonar proyecto:
La URL del repositorio de BUK-API en VisualStudio es: https://moebiusviajes.visualstudio.com/BUK/_git/BUK-API

2.  Crear la base de datos BUK

3.  Instalar Composer:
    -   Ubicarse en la carpeta raíz del proyecto en el $ cd rutaProyecto
    -   Ejecutar el comando:    $ composer install
    -   Modificamos el nombre del archivo .env.example. por .env:   
            LINUX/UNIX   =>   $ cp .env.example .env
            WINDOWS      =>   $ copy .en.example .env
    -   Editamos el archivo .env con los datos de nuestra Base de Datos MySQL
        
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=BUK
            DB_USERNAME=userName    # Aquí poner tu usuario de MySQL
            DB_PASSWORD=*********   # Aquí poner el password real MySQL
    
    -   Generaramos una key para nuestra app: $ php artisan key:generate

4. Verificar la ubicación del proyecto (dev) en git:
	En caso de estar en una ubicación diferente a dev realizar switch/checkout.
	
5.  Actualizar la base de datos con el migration

    -   Ejecutar comando:    $ php artisan migrate:refresh --seed

6.  Listo ya podemos ejecutar el proyecto.

    $ php artisan serve
