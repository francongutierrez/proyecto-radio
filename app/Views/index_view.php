<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo Terra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
    <!-- MediaElement.js CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/5.0.5/mediaelementplayer.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.plyr.io/3.7.2/plyr.polyfilled.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Brand</a> -->
             <img src="img/logo_principal.png" alt="grupo_terra">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Contacto</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" id="main">
        <div class="row">
            <div class="col">
                <h1>Bienvenido al <b>Grupo Terra</b></h1>
                <p>Es la red más grande de San Luis</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card" data-toggle="modal" data-target="#modalRadio1">
                        <div class="card-body text-center">
                            <!-- <h5 class="card-title">Radio 1</h5> -->
                            <img src="img/radio_terra.png" alt="radio_terra">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" data-toggle="modal" data-target="#modalRadio2">
                        <div class="card-body text-center">
                            <img src="img/radio_cielo.png" alt="radio_terra">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" data-toggle="modal" data-target="#modalRadio3">
                        <div class="card-body text-center">
                            <img src="img/radio_del_valle.png" alt="radio_terra">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" data-toggle="modal" data-target="#modalRadio4">
                        <div class="card-body text-center">
                            <img src="img/radio_por_vos.png" alt="radio_terra">
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalRadio1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Radio 1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <audio id="player" controls>
                <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                Tu navegador no soporta la reproducción de audio.
            </audio>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRadio2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Radio 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <audio controls>
                        <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRadio3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Radio 3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <audio controls>
                        <source src="https://radio03.ferozo.com/proxy/ra03001507?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRadio4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Radio 4</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <audio controls>
                        <source src="https://radio04.ferozo.com/proxy/ra04001507?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                </div>
            </div>
        </div>
    </div>


    <div class="container" id="programacion">
        <div class="row">
            <div class="col">
                <h1>Programación</h1>

                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>6:00 AM - 7:00 AM</p>
                            <p>Noticias y deportes</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>7:00 AM - 9:00 AM</p>
                            <p>Programa de radio</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>9:00 AM - 12:00 PM</p>
                            <p>Programa de radio</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>12:00 PM - 1:00 PM</p>
                            <p>Noticias y deportes</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>1:00 PM - 3:00 PM</p>
                            <p>Programa de radio</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>3:00 PM - 5:00 PM</p>
                            <p>Programa de radio</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>5:00 PM - 6:00 PM</p>
                            <p>Noticias y deportes</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>6:00 PM - 8:00 PM</p>
                            <p>Programa de radio</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-item-content">
                            <p>8:00 PM - 10:00 PM</p>
                            <p>Programa de radio</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- <div class="container mt-4 mb-4 radio-card">
        <div class="card">
            <div class="card-header text-white">
                <h5 class="mb-0">Radio en Vivo</h5>
            </div>
            <div class="card-body text-center">
                <audio id="player" controls>
                    <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                    Tu navegador no soporta la reproducción de audio.
                </audio>
            </div>
        </div>
    </div> -->




    <div class="container mt-4 mb-4">
            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
            <div class="elfsight-app-2290e319-686d-4ebe-92bf-a65f0f796f9b" data-elfsight-app-lazy></div>
        </div>
    </div>







    

    <div class="container">
        <div>
            <a class="weatherwidget-io" href="https://forecast7.com/es/n33d30n66d34/san-luis/" data-label_1="SAN LUIS" data-label_2="Clima" data-theme="dark" >SAN LUIS Clima</a>
            <script>
                !function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://weatherwidget.io/js/widget.min.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "weatherwidget-io-js");
            </script>
        </div>
    </div>  

    <div class="container mt-4 mb-4" id="contacto">
        <div class="row">
            <div class="col">
                <h1>Contactanos</h1>
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.twitter.com" target="_blank">
                                <i class="bi bi-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=terrafmsanluis@gmail.com&su=Solicitud para publicitar en Grupo Terra" target="_blank">
                                <i class="bi bi-envelope"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://api.whatsapp.com/send?phone=5492664580029&text=Quiero%20publicitar%20en%20radio.%20Aguardo%20que%20me%20contacte%20un%20representante%20de%20venta." target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>  


    <div class="container mt-4 mb-4">
        <div id="ww_f7d221b662f71" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":["wl6235"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFFFFF00","cl_font":"#000000","cl_cloud":"#d4d4d4","cl_persp":"#2196F3","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#00000000"}'>More forecasts: <a href="https://oneweather.org/buenos_aires/30_days/" id="ww_f7d221b662f71_u" target="_blank">Buenos Aires weather forecast 30 days</a></div>
        <script async src="https://app3.weatherwidget.org/js/?id=ww_f7d221b662f71"></script>
    </div>
   



    <!-- <div class="container">
        <h2>hello world</h2>
        <audio id="player2" controls>
            <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
        </audio>
    </div> --> 


    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class=" d-block text-center">Copyright 2024 Grupo Terra - Legales (Resolución N° 1.133/COMFER/01)</span>
        </div>
    </footer>



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
