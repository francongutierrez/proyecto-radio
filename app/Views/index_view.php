<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo Terra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
    <!-- MediaElement.js CSS -->
    <link rel="icon" href="img/logo_principal_ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/5.0.5/mediaelementplayer.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.plyr.io/3.7.2/plyr.polyfilled.js"></script>
    
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="background-image"></div>
    <nav class="navbar navbar-expand-lg custom-nav">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo_principal.png" alt="grupo_terra">
            </a>
            <div class="justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto"><b>Contactanos</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app" target="_blank"><b><i class="fas fa-key"></i></b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


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
                        95.1MHz. TERRA FM ES “LA 100 EN SAN LUIS”, La radio más escuchada del país” con sus reconocidos conductores: Santiago del Moro, Guido Kaczka, Claudia Fontan, Julieta Prandi Alejandra Zalas, Sergio Lapegue, Jonathan Gabay, el “Pelado” Lopez, Ezequiel Dero, Mariano Peluffo, entre otros… Su éxito se debe a la perfecta fusión que coexiste entre las personalidades que están en su programación y a sus contenidos. Su trayectoria la llevó a ser un referente en materia musical, es por eso que recibe a los artistas nacionales e internacionales más importantes del mundo de la música, lo cual hace de ella una propuesta muy atractiva, divertida, musical, informativa y de compañía, con los últimos hits, nacionales e internacionales y los clásicos retros de los ‘80 y ‘90.
                    </p>
                    <audio id="playerRadio1" controls>
                        <source src="https://radio02.ferozo.com/proxy/ra02001507?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                    <div class="banner-container">
                        <?php if (!empty($emisoras[0]['banners'])): ?>
                            <?php foreach ($emisoras[0]['banners'] as $banner): ?>
                                <a href="<?= $banner->url; ?>" target="_blank" onclick="registerBannerClick(<?= $banner->id; ?>)"> <!-- Llama a la función con el ID del cliente -->
                                    <img src="<?= base_url('img/uploads/' . $banner->banner); ?>" alt="banner_<?= $banner->banner; ?>" class="img-fluid">
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- <p>No hay banners disponibles.</p> -->
                        <?php endif; ?>
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
                        95.1MHz. CIELO FM ES “LA 100 EN MERLO”, con cobertura a todo EL Valle del Conlara. (Merlo, Santa Rosa, Concaran, Tilisarao, Naschel, Carpintería, Los Molles, Cortaderas). La radio más escuchada del país” con sus reconocidos conductores: Santiago del Moro, Guido Kaczka, Claudia Fontan, Julieta Prandi Alejandra Zalas, Sergio Lapegue, Jonathan Gabay, el “Pelado” Lopez, Ezequiel Dero, Mariano Peluffo, entre otros… Su éxito se debe a la perfecta fusión que coexiste entre las personalidades que están en su programación y a sus contenidos. Su trayectoria la llevó a ser un referente en materia musical, es por eso que recibe a los artistas nacionales e internacionales más importantes del mundo de la música, lo cual hace de ella una propuesta muy atractiva, divertida, musical, informativa y de compañía, con los últimos hits, nacionales e internacionales y los clásicos retros de los ´80 y ¨90.
                    </p>
                    <audio id="playerRadio2" controls>
                        <source src="https://radio02.ferozo.com/proxy/ra02001508?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                    <div class="banner-container">
                        <?php if (!empty($emisoras[1]['banners'])): ?>
                            <?php foreach ($emisoras[1]['banners'] as $banner): ?>
                                <a href="<?= $banner->url; ?>" target="_blank" onclick="registerBannerClick(<?= $banner->id; ?>)"> <!-- Llama a la función con el ID del cliente -->
                                    <img src="<?= base_url('img/uploads/' . $banner->banner); ?>" alt="banner_<?= $banner->banner; ?>" class="img-fluid">
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- <p>No hay banners disponibles.</p> -->
                        <?php endif; ?>
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
                        Es Cadena 3 Merlo, integra la red de emisoras de la Cadena 3 Argentina, la auténtica radio federal, que transmite en forma simultánea las 24 Hs. LV3 Cadena 3 Córdoba, desde Merlo y con cobertura a todo el Valle del Conlara.
                    </p>
                    <audio id="playerRadio3" controls>
                        <source src="https://radio01.ferozo.com/proxy/ra01001074?mp=/stream" type="audio/mpeg">
                        Tu navegador no soporta la reproducción de audio.
                    </audio>
                    <div class="banner-container">
                        <?php if (!empty($emisoras[2]['banners'])): ?>
                            <?php foreach ($emisoras[2]['banners'] as $banner): ?>
                                <a href="<?= $banner->url; ?>" target="_blank" onclick="registerBannerClick(<?= $banner->id; ?>)"> <!-- Llama a la función con el ID del cliente -->
                                    <img src="<?= base_url('img/uploads/' . $banner->banner); ?>" alt="banner_<?= $banner->banner; ?>" class="img-fluid">
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- <p>No hay banners disponibles.</p> -->
                        <?php endif; ?>
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
                    <div class="banner-container" data-duracion="<?= isset($emisoras[3]['banners'][0]->duracion) ? esc($emisoras[3]['banners'][0]->duracion) : '5000'; ?>">
                        <?php if (!empty($emisoras[3]['banners'])): ?>
                            <?php foreach ($emisoras[3]['banners'] as $banner): ?>
                                <a href="<?= esc($banner->url); ?>" target="_blank" onclick="registerBannerClick(<?= esc($banner->id); ?>)">
                                    <img src="<?= base_url('img/uploads/' . esc($banner->banner)); ?>" alt="banner_<?= esc($banner->banner); ?>" class="img-fluid" style="display: none;"> <!-- Ocultamos todos inicialmente -->
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- <p>No hay banners disponibles para esta emisora.</p> -->
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="https://comercial.cadena3.com/perfil-cadena-heat.asp#programacion" target="_blank" class="btn btn-primary">Ver programación</a>
                </div>
            </div>
        </div>
    </div>





    <div class="telebin" id="telebinRadio1" style="display: none;">
    <div class="animation">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    Reproduciendo: TERRA FM
</div>
<div class="telebin" id="telebinRadio2" style="display: none;">
    <div class="animation">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    Reproduciendo: CIELO FM
</div>
<div class="telebin" id="telebinRadio3" style="display: none;">
    <div class="animation">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    Reproduciendo: DEL VALLE FM
</div>
<div class="telebin" id="telebinRadio4" style="display: none;">
    <div class="animation">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    Reproduciendo: POR VOS FM
</div>




    <div class="container mt-4 mb-4" id="climaSanLuis">
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


    <div class="container mt-4 mb-4" id="feedLa100">
            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
            <div class="elfsight-app-2290e319-686d-4ebe-92bf-a65f0f796f9b" data-elfsight-app-lazy></div>
    </div>


    <div class="container mt-4 mb-4" id="climaMerlo">
        <div>
            <a class="weatherwidget-io" href="https://forecast7.com/es/n32d35n65d02/villa-de-merlo/" data-label_1="MERLO" data-label_2="Clima" data-theme="dark" >MERLO Clima</a>
            <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </div>
    </div>

    <div class="container mt-4 mb-4" id="feedCadena3">
        <script src="https://static.elfsight.com/platform/platform.js" async></script>
        <div class="elfsight-app-8ec4e786-aa24-498a-92af-2779576de49b" data-elfsight-app-lazy></div>
    </div>








    

 

    <div class="container mt-4 mb-4" id="contacto">
        <div class="row">
            <div class="col">
                <h1 class="animado">Contactanos</h1>
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <ul class="list-inline">
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




    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="d-block text-center">
                Copyright 2024 Grupo Terra - 
                <a id="legalesLink" href="#" data-bs-toggle="modal" data-bs-target="#legalesModal">Legales</a> 
                (Resolución N° 1.133/COMFER/01)
            </span>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal modal-radio fade" id="legalesModal" tabindex="-1" aria-labelledby="legalesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="legalesModalLabel">Legales <b>Grupo Terra</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Estación de Radio por Modulación de Frecuencia, perteneciente al Licenciatario JORGE EDUARDO ALTAMIRANO, otorgada bajo Resolución N° 1.133/COMFER/01 y Habilitación Definitiva y Puesta en Marcha de Emisiones Regulares bajo Resolución N° 0409/AFSCA/15 con la señal distintiva LRJ 824, Canal 236. Inscripción Tributaria bajo el CUIT N° 20-14542051-3 con domicilio Real, Legal, Estudios y Planta Transmisora en calle San Martín N° 65 de la ciudad de San Luis, Capital, CP 5700 y en la Ciudad Autónoma de Buenos Aires en Av. Santa Fe Nº 1.127- Piso 8. Inscripto como cliente FTP, con alta el 31/05/2012, para la difusión por la Emisora de referencia, de Los Boletines de Noticias y Producciones de Contenidos suministrados por la Agencia de Noticias TELAM, inscripto como Proveedor de esa Agencia con el N° 7524, como TERRA FM y proveedor del Estado Nacional, en la Jefatura de Gabinete, CUT/BENEFICIARIO: 394696</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>





    <script>
        const player = new Plyr('#player');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const player = new MediaElementPlayer('player2', {
                // Opciones de personalizacion
                features: ['playpause', 'volume', 'progress', 'current', 'duration'],
                audioVolume: 'horizontal',
                audioWidth: 400,
                audioHeight: 50,
                startVolume: 0.8,
                loop: false,
                success: function(mediaElement, originalNode, instance) {
                    // Función de callback
                }
            });
        });
    </script>



    <!-- MediaElement.js JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/5.0.5/mediaelement-and-player.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
