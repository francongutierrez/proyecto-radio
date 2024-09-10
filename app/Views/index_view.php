<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del Tiempo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
    <!-- MediaElement.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/5.0.5/mediaelementplayer.min.css">

    <script src="https://cdn.plyr.io/3.7.2/plyr.polyfilled.js"></script>

    <style>
        .weather-card {
            margin: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .weather-icon {
            width: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
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
        <div class="container">
            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
            <div class="elfsight-app-2290e319-686d-4ebe-92bf-a65f0f796f9b" data-elfsight-app-lazy></div>
        </div>
    </div>
    <div class="container">
        <div>
            <a class="weatherwidget-io" href="https://forecast7.com/es/n33d30n66d33/san-luis-province/" data-label_1="San Luis" data-label_2="Clima" data-font="Roboto" data-icons="Climacons" data-days="5" data-theme="pure" >San Luis Clima</a>
            <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </div>
    </div>
    <div class="container">
    <div id="ww_f7d221b662f71" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":["wl6235"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFFFFF00","cl_font":"#000000","cl_cloud":"#d4d4d4","cl_persp":"#2196F3","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#00000000"}'>More forecasts: <a href="https://oneweather.org/buenos_aires/30_days/" id="ww_f7d221b662f71_u" target="_blank">Buenos Aires weather forecast 30 days</a></div><script async src="https://app3.weatherwidget.org/js/?id=ww_f7d221b662f71"></script>
    </div>

    

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Radio en Vivo</h5>
            </div>
            <div class="card-body text-center">
                <audio id="player" controls>
                    <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                    Tu navegador no soporta la reproducción de audio.
                </audio>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>hello world</h2>
        <audio id="player2" controls>
            <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
        </audio>
    </div>

    <script>
        const player = new Plyr('#player');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const player = new MediaElementPlayer('player2', {
                // Opciones de personalización
                features: ['playpause', 'volume', 'progress', 'current', 'duration'],
                audioVolume: 'horizontal',
                audioWidth: 400,
                audioHeight: 50,
                startVolume: 0.8,
                loop: false,
                success: function(mediaElement, originalNode, instance) {
                    // Función de callback si necesitas hacer algo cuando el reproductor se cargue
                }
            });
        });
    </script>



    <!-- MediaElement.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/5.0.5/mediaelement-and-player.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
