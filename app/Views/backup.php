<div class="container" id="weather">
        <h1 class="mt-4">Estado del Tiempo en San Luis</h1>

        <!-- Estado actual -->
        <?php if (isset($weather['list'][0])): ?>
            <div class="weather-card bg-light">
                <h3>Estado Actual</h3>
                <p>Temperatura: <?= number_format($weather['list'][0]['main']['temp'], 2) ?> °C</p>
                <p>Humedad: <?= $weather['list'][0]['main']['humidity'] ?>%</p>
                <p>Temp Mínima: <?= number_format($weather['list'][0]['main']['temp_min'], 2) ?> °C</p>
                <p>Temp Máxima: <?= number_format($weather['list'][0]['main']['temp_max'], 2) ?> °C</p>
                <p>Condiciones: <?= $weather['list'][0]['weather'][0]['description'] ?></p>
                <img src="http://openweathermap.org/img/wn/<?= $weather['list'][0]['weather'][0]['icon'] ?>.png" class="weather-icon" alt="Icono del clima">
            </div>
        <?php else: ?>
            <p>No se pudo obtener la información del clima.</p>
        <?php endif; ?>

        <!-- Previsión para los próximos 5 días -->
        <div class="row">
            <?php foreach ($weather['list'] as $index => $forecast): ?>
                <?php if ($index % 8 === 0): // OpenWeatherMap devuelve datos cada 3 horas, así que seleccionamos 1 vez por día ?>
                    <div class="col-md-2">
                        <div class="weather-card bg-light">
                            <h5><?= date('d M', strtotime($forecast['dt_txt'])) ?></h5>
                            <p>Temp: <?= number_format($forecast['main']['temp'], 2) ?> °C</p>
                            <p>Temp Mínima: <?= number_format($forecast['main']['temp_min'], 2) ?> °C</p>
                            <p>Temp Máxima: <?= number_format($forecast['main']['temp_max'], 2) ?> °C</p>
                            <p>Humedad: <?= $forecast['main']['humidity'] ?>%</p>
                            <p>Condiciones: <?= $forecast['weather'][0]['description'] ?></p>
                            <img src="http://openweathermap.org/img/wn/<?= $forecast['weather'][0]['icon'] ?>.png" class="weather-icon" alt="Icono del clima">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>















    <div class="container" id="main">
    

    <div class="row">
        <div class="col welcome-message">
            <h1 class="animado">Más que una radio</h1>
            <p class="animado">Es la <b class="animado">red</b> más grande de San Luis</p>
            <p class="animado">Clickea en cualquiera de nuestras emisoras para escuchar</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-3">
            <div class="card" data-toggle="modal" data-target="#modalRadio1" onclick="registerClick(1)">
                <div class="card-body text-center">
                    <img src="img/radio_terra.png" alt="radio_terra">
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card" data-toggle="modal" data-target="#modalRadio2" onclick="registerClick(2)">
                <div class="card-body text-center">
                    <img src="img/radio_cielo.png" alt="radio_cielo">
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card" data-toggle="modal" data-target="#modalRadio3" onclick="registerClick(3)">
                <div class="card-body text-center">
                    <img src="img/radio_del_valle.png" alt="radio_del_valle">
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card" data-toggle="modal" data-target="#modalRadio4" onclick="registerClick(4)">
                <div class="card-body text-center">
                    <img src="img/radio_por_vos.png" alt="radio_por_vos">
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Modal -->
    <div class="modal fade modal-radio" id="modalRadio1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="img/radio_terra.png" alt="radio_terra" width="150" class="mr-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="d-flex align-items-center">
                        95.1MHz. TERRA FM ES “LA 100 EN SAN LUIS”, La radio mas escuchada del país” con sus reconocidos conductores: Santiago del Moro, Guido Kaczka, Claudia Fontan, Julieta Prandi Alejandra Zalas, Sergio Lapegue, Jonathan Gabay, el “Pelado” Lopez, Ezequiel Dero, Mariano Peluffo, entre otros… Su éxito se debe a la perfecta fusión que coexiste entre las personalidades que están en su programación y a sus contenidos. Su trayectoria la llevo ser un referente en materia musical, es por eso que recibe a los artistas nacionales e internacionales más importantes del mundo de la música, lo cual hace de ella una propuesta muy atractiva, divertida, musical, informativa y de compañía, con los últimos hits, nacionales e internacionales y los clásicos retros de los ‘80 y ‘90.
                    </p>
                    <audio id="playerRadio1" controls>
                        <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                    <div class="banner-container">
                        <a href="https://www.toyotaalianz.com/" target="_blank">
                            <img src="img/banners/banner_id_247.png" alt="banner_radio_terra" class="img-fluid" style="display: block;">
                        </a>
                        <a href="https://agenciasanluis.com/" target="_blank">
                            <img src="img/banners/banner_id_288.png" alt="banner_radio_terra" class="img-fluid" style="display: none;">
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100058313264245" target="_blank">
                            <img src="img/banners/banner_id_309.jpg" alt="banner_radio_terra" class="img-fluid" style="display: none;">
                        </a>    
                        <a href="https://hiperceramico.com.ar/promociones/" target="_blank">
                            <img src="img/banners/banner_id_343.jpg" alt="banner_radio_terra" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://www.facebook.com/elboticariofarmacia/" target="_blank">
                            <img src="img/banners/banner_id_259.jpg" alt="banner_radio_terra" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://autosmediterraneos.com.ar/" target="_blank">
                            <img src="img/banners/banner_id_327.jpg" alt="banner_radio_terra" class="img-fluid" style="display: none;">
                        </a>   
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="img/grilla.png" data-toggle="lightbox" data-title="Programación" data-footer="TERRA FM" target="_blank">
                        <button type="button" class="btn btn-primary">Ver programación</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-radio" id="modalRadio2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="img/radio_cielo.png" alt="radio_cielo" width="150" class="mr-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="d-flex align-items-center">
                        95.1MHz. CIELO FM ES “LA 100 EN MERLO”, con cobertura a todo EL Valle del Conlara. (Merlo, Santa Rosa, Concaran, Tilisarao, Naschel, Carpintería, Los Molles, Cortaderas). La radio mas escuchada del país” con sus reconocidos conductores: Santiago del Moro, Guido Kaczka, Claudia Fontan, Julieta Prandi Alejandra Zalas, Sergio Lapegue, Jonathan Gabay, el “Pelado” Lopez, Ezequiel Dero, Mariano Peluffo, entre otros…Su éxito se debe a la perfecta fusión que coexiste entre las personalidades que están en su programación y a sus contenidos. Su trayectoria la llevo ser un referente en materia musical, es por eso que recibe a los artistas nacionales e internacionales más importantes del mundo de la música, lo cual hace de ella una propuesta muy atractiva, divertida, musical, informativa y de compañía, con los últimos hits, nacionales e internacionales y los clásicos retros de los ´80 y ¨90.
                    </p>
                    <audio id="playerRadio2" controls>
                        <source src="https://radio02.ferozo.com/proxy/ra02001508?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                    <div class="banner-container">
                        <a href="https://www.toyotaalianz.com/" target="_blank">
                            <img src="img/banners/banner_id_247.png" alt="banner_radio_cielo" class="img-fluid" style="display: block;">
                        </a>
                        <a href="https://agenciasanluis.com/" target="_blank">
                            <img src="img/banners/banner_id_288.png" alt="banner_radio_cielo" class="img-fluid" style="display: none;">
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100058313264245" target="_blank">
                            <img src="img/banners/banner_id_309.jpg" alt="banner_radio_cielo" class="img-fluid" style="display: none;">
                        </a>    
                        <a href="https://hiperceramico.com.ar/promociones/" target="_blank">
                            <img src="img/banners/banner_id_343.jpg" alt="banner_radio_cielo" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://www.facebook.com/elboticariofarmacia/" target="_blank">
                            <img src="img/banners/banner_id_259.jpg" alt="banner_radio_cielo" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://autosmediterraneos.com.ar/" target="_blank">
                            <img src="img/banners/banner_id_327.jpg" alt="banner_radio_cielo" class="img-fluid" style="display: none;">
                        </a>   
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <a href="img/grilla.png" target="_blank" class="btn btn-primary">Ver programación</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-radio" id="modalRadio3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="img/radio_del_valle.png" alt="radio_del_valle" width="150" class="mr-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="d-flex align-items-center">
                        Es Cadena 3 Merlo, integra la red de emisoras de la Cadena 3 Argentina, la auténtica radio federal, que transmite en forma simultanea las 24 Hs. LV3 Cadena 3 Córdoba, desde Merlo y con cobertura a todo el Valle del Conlara.
                    </p>
                    <audio id="playerRadio3" controls>
                        <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                    <div class="banner-container">
                        <a href="https://www.toyotaalianz.com/" target="_blank">
                            <img src="img/banners/banner_id_247.png" alt="banner_radio_del_valle" class="img-fluid" style="display: block;">
                        </a>
                        <a href="https://agenciasanluis.com/" target="_blank">
                            <img src="img/banners/banner_id_288.png" alt="banner_radio_del_valle" class="img-fluid" style="display: none;">
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100058313264245" target="_blank">
                            <img src="img/banners/banner_id_309.jpg" alt="banner_radio_del_valle" class="img-fluid" style="display: none;">
                        </a>    
                        <a href="https://hiperceramico.com.ar/promociones/" target="_blank">
                            <img src="img/banners/banner_id_343.jpg" alt="banner_radio_del_valle" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://www.facebook.com/elboticariofarmacia/" target="_blank">
                            <img src="img/banners/banner_id_259.jpg" alt="banner_radio_del_valle" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://autosmediterraneos.com.ar/" target="_blank">
                            <img src="img/banners/banner_id_327.jpg" alt="banner_radio_del_valle" class="img-fluid" style="display: none;">
                        </a>   
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="https://www.cadena3.com/pagina/programas" target="_blank" class="btn btn-primary">Ver programación</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-radio" id="modalRadio4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="img/radio_por_vos.png" alt="radio_por_vos" width="150" class="mr-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="d-flex align-items-center">
                        Cadena Heat ya se escucha en más de 50 señales de Argentina y su lanzamiento incluye, además, la renovación de parte de su programación. La música tiene un rol protagónico y a través de una simple frase como "Un éxito, siempre" convertimos el slogan en un concepto que en todo momento garantiza una gran canción, cada vez que el oyente la sintonice.
                    </p>
                    <audio id="playerRadio4" controls>
                        <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                    <div class="banner-container">
                        <a href="https://www.toyotaalianz.com/" target="_blank">
                            <img src="img/banners/banner_id_247.png" alt="banner_radio_por_vos" class="img-fluid" style="display: block;">
                        </a>
                        <a href="https://agenciasanluis.com/" target="_blank">
                            <img src="img/banners/banner_id_288.png" alt="banner_radio_por_vos" class="img-fluid" style="display: none;">
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100058313264245" target="_blank">
                            <img src="img/banners/banner_id_309.jpg" alt="banner_radio_por_vos" class="img-fluid" style="display: none;">
                        </a>    
                        <a href="https://hiperceramico.com.ar/promociones/" target="_blank">
                            <img src="img/banners/banner_id_343.jpg" alt="banner_radio_por_vos" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://www.facebook.com/elboticariofarmacia/" target="_blank">
                            <img src="img/banners/banner_id_259.jpg" alt="banner_radio_por_vos" class="img-fluid" style="display: none;">
                        </a>   
                        <a href="https://autosmediterraneos.com.ar/" target="_blank">
                            <img src="img/banners/banner_id_327.jpg" alt="banner_radio_por_vos" class="img-fluid" style="display: none;">
                        </a>   
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="https://comercial.cadena3.com/perfil-cadena-heat.asp#programacion" data-toggle="lightbox" data-title="Programación" data-footer="TERRA FM" target="_blank">
                        <button type="button" class="btn btn-primary">Ver programación</button>
                    </a>                
                </div>
            </div>
        </div>
    </div>
