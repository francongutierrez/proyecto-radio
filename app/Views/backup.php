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
