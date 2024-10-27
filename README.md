# Grupo Terra

Este proyecto forma parte de la web pública del Grupo Terra y también forma parte de la Práctica Técnica Supervisada de la carrera Tecnicatura Universitaria en Web de la Universidad Nacional de San Luis.

Está desarrollado con **PHP**, **JavaScript**, **CSS**, **CodeIgniter 4** y **Bootstrap** como tecnologías principales. Además, utiliza APIs de terceros como **ElfSight** y **WeatherWidget.io** para implementar funcionalidades específicas del sitio.

## Descripción del primer incremento

El código desarrollado hasta el 30/09/2024 forma parte del primer incremento del proyecto, el cual incluye la página pública a la que accederán los usuarios. Este incremento abarca únicamente el front-end e incluye una funcionalidad que registra los clics realizados en cada una de las radios, que es la única funcionalidad de back-end hasta que se incluya el siguiente incremento. Por lo tanto, los casos de uso que se incluyen en este incremento son:

- Escuchar una emisora.
- Visualizar el estado del tiempo.
- Ver publicaciones de la radio.
- Contactar para publicar en la radio.
- Visualizar la grilla de programación.
- Registrar interacciones del usuario (parcialmente).

## Descripción del segundo incremento

El código desarrollado hasta el 28/10/2024 forma parte del segundo incremento del proyecto. Este incluye cambios en la página pública y el desarrollo completo de la aplicación de gestión privada para el Grupo Terra. Los nuevos casos de uso incorporados en este incremento son:

- Gestión de clientes.
- Gestión de usuarios.
- Gestión de documentación.
- Gestión de publicidades.
- Desarrollo completo del caso de uso "Registrar interacciones del usuario".

## Acceso al sitio

La página es accesible en producción a través del siguiente dominio: [grupoterrasanluis.com.ar](https://grupoterrasanluis.com.ar)

## Requisitos del sistema (para desarrollo local)

Estos requisitos son necesarios para clonar y ejecutar el proyecto localmente en un entorno de desarrollo. En producción, el sitio es accesible mediante el dominio público.

- **PHP** versión 7.4 o superior.
- **MySQL** o **MariaDB**.
- **Composer** para la gestión de dependencias.

## Ejecución en entorno local (para desarrolladores)

Para clonar y ejecutar el proyecto localmente para desarrollo, es necesario seguir los siguientes pasos:

1. Ejecutar `composer install`.
2. Importar la base de datos desde el archivo `radio_db.sql` junto con `usuario_radio.sql`, ubicado en la ruta `app/Database` del proyecto, utilizando **phpMyAdmin**. El archivo `usuario_radio.sql` contiene las instrucciones para crear el usuario `userradio` y otorgarle los privilegios necesarios sobre la base de datos. Define una contraseña segura para este usuario al crearlo.
3. Verificar la configuración de la contraseña de la base de datos en el archivo `.env` del proyecto, asegurándose de que la contraseña coincida con la establecida para el usuario `userradio`.
4. Ejecutar el comando `php spark serve`.
5. Acceder a la aplicación desde un navegador en `localhost:8080`.

## Descripción de funcionalidades

- Visualización de widgets del clima utilizando **WeatherWidget.io**.
- Integración de componentes visuales con **ElfSight**.
- Diseño responsive basado en **Bootstrap**.

## Contacto

Para más información, contactarse a [francogutierrez04@gmail.com](mailto:francogutierrez04@gmail.com).
