# Primer Incremento - Grupo Terra

Este proyecto forma parte de la web pública del Grupo Terra y también forma parte de la Práctica Técnica Supervisada de la carrera Tecnicatura Universitaria en Web de la Universidad Nacional de San Luis.

Está desarrollado con **PHP**, **JavaScript**, **CSS**, **CodeIgniter 4** y **Bootstrap** como tecnologías principales. Además, utiliza APIs de terceros como **ElfSight** y **WeatherWidget.io** para implementar funcionalidades específicas del sitio.

## Descripción del incremento

El código desarrollado hasta el 30/09/2024 forma parte del primer incremento del proyecto, el cual incluye la página pública a la que accederán los usuarios. Este incremento abarca únicamente el front-end e incluye una funcionalidad que registra los clics realizados en cada una de las radios, que es la única funcionalidad de back-end hasta que se incluya el siguiente incremento. Por lo tanto, los casos de uso que se incluyen en este incremento son:

- Escuchar una emisora.
- Visualizar el estado del tiempo.
- Ver publicaciones de la radio.
- Contactar para publicar en la radio.
- Visualizar la grilla de programación.
- Registrar interacciones del usuario (parcialmente).

## Importante

Para ejecutar correctamente el proyecto, es necesario seguir los siguientes pasos:

1. Ejecutar `composer install`.
2. Importar la base de datos desde el archivo `radio_db.sql` junto con `usuario_radio.sql`, ubicado en la ruta `app/Database` del proyecto, utilizando **phpMyAdmin**. El archivo `usuario_radio.sql` contiene las instrucciones para crear el usuario `userradio` y otorgarle los privilegios necesarios sobre la base de datos. Es necesario definir una contraseña segura para el usuario al crearla.
3. Verificar la configuración de la contraseña de la base de datos en el archivo `.env` del proyecto. Asegurarse de que la contraseña coincida con la establecida para el usuario `userradio`.
4. Ejecutar el comando `php spark serve`.
5. Acceder a la aplicación desde un navegador en `localhost:8080`.

## Requisitos del sistema

- **PHP** versión 7.4 o superior.
- **MySQL** o **MariaDB**.
- **Composer** para la gestión de dependencias.

## Descripción de funcionalidades

- Visualización de widgets del clima utilizando **WeatherWidget.io**.
- Integración de componentes visuales con **ElfSight**.
- Diseño responsive basado en **Bootstrap**.

## Contacto

Para más información, contactarse a [francogutierrez04@gmail.com](mailto:francogutierrez04@gmail.com).
