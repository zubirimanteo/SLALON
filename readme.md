
# [SLASPORT](https://proyect76.herokuapp.com)

#Descripcion

El objetivo de este proyecto, es la automatización de un sistema de control de una competición de piragüismo de la modalidad de aguas bravas, utilizando para ello un sistema electrónico junto a una aplicación web.

Un circuito de descenso de aguas bravas consiste en un recorrido con una serie de puertas de diferentes tipos, unas de entrada y otras de remonte. Por las cuales los deportistas han de pasar sin golpear ningún poste. Para ese control en cada puerta hay un juez que controla una o dos puertas. En un circuito, debe haber un mínimo de 18 y un máximo de 25 puertas, para el buen control de la prueba son necesarios un numeroso grupo de jueces. Por ello existe esta propuesta, ya que se eliminaría esa numerosa existencia de árbitros y junto a ello todos los gastos que suponen estos.

Además de dicho sistema, se ha creado una aplicación web para una perfecta visualización a tiempo real, para ofrecer al público la máxima información, tanto si están en el propio circuito como si están siguiendo la prueba desde sus casas.

Por otro lado, en esta web se ofrece a los participantes o clubes la posibilidad de inscribirse a las diferentes pruebas.

#Instalación

La manera más sencilla de empezar es clonando el repositorio

```bash
# Clonar repositorio
git clone https://github.com/SLALON/SLALON

# Entrar en el directorio creado
cd miproyecto

# Instalar dependencias con NPM y composer
npm install
composer install

# Renombrar fichero ".env example" a ".env"
mv .env\ example .env
el .env actual utiliza las credenciales de desarrollo de c9 con nuestras api keys.

# Migrar la base de datos borrando y volviendo a instalar con :rollback y llenandola con --seed

php artisan migrate[:rollback][--seed]
ejecutar servidor php ---> php artisan serve
```
#Estructura del proyecto

##Rutas


| Domain | Method   | URI                    | Name              | Action                                                                 | Middleware   |
|--------|----------|------------------------|-------------------|------------------------------------------------------------------------|--------------|
|        | GET|HEAD | /                      |                   | App\Http\Controllers\GetAllCarreras@getCarreras                        | web          |
|        | GET|HEAD | api/user               |                   | Closure                                                                | api,auth:api |
|        | GET|HEAD | carreras               |                   | Closure                                                                | web          |
|        | GET|HEAD | clubes                 |                   | App\Http\Controllers\GetAllCarreras@getOneCarreratoAddInscription      | web          |
|        | GET|HEAD | consulta{datuak}       |                   | App\Http\Controllers\consultaController@recibir                        | web          |
|        | POST     | crear/carrera          | create.carrera    | App\Http\Controllers\CarrerasController@createCarrera                  | web          |
|        | POST     | crear/piraguista       | create.piraguista | App\Http\Controllers\InscripccionControler@createPiraguista            | web          |
|        | GET|HEAD | descensos              |                   | App\Http\Controllers\GetAllDescensos@lastDescensos                     | web          |
|        | GET|HEAD | descensos/{id}         |                   | App\Http\Controllers\GetAllDescensos@getDescensos                      | web          |
|        | GET|HEAD | inscritos              |                   | App\Http\Controllers\GetAllPiraguistas@inscritos                       | web          |
|        | GET|HEAD | login                  | login             | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST     | login                  |                   | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | POST     | logout                 | logout            | App\Http\Controllers\Auth\LoginController@logout                       | web          |
|        | GET|HEAD | logout                 |                   | Closure                                                                | web          |
|        | POST     | notifications          |                   | App\Http\Controllers\NotificationController@postNotify                 | web          |
|        | GET|HEAD | notifications          |                   | App\Http\Controllers\NotificationController@getIndex                   | web          |
|        | GET|HEAD | participantes          |                   | App\Http\Controllers\GetAllPiraguistas@lastPiraguistas                 | web          |
|        | GET|HEAD | participantes/{id}     |                   | App\Http\Controllers\GetAllPiraguistas@getPiraguistas                  | web          |
|        | POST     | password/email         |                   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
|        | GET|HEAD | password/reset         |                   | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
|        | POST     | password/reset         |                   | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
|        | GET|HEAD | password/reset/{token} |                   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
|        | GET|HEAD | recibirDatos{datuak}   |                   | App\Http\Controllers\RecibirDatos@recibir                              | web          |
|        | POST     | register               |                   | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
|        | GET|HEAD | register               | register          | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
|        | GET|HEAD | simulador              |                   | Closure                                                                | web          |
|        | GET|HEAD | vibraciones{datuak}    |                   | App\Http\Controllers\RecibirVibraciones@recibir                        | web          |


# Laravel PHP Framework

<img src="http://programacion.net/files/article/20151219031213_laravel.png" width="200">
[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

# Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

#Licencia

Copyright (c) 2016 Markel Larrañaga, Igor Uria y Juan Camilo Amaya.