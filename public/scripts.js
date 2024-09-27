document.addEventListener("DOMContentLoaded", function () {
    // Seleccionar todos los modales
    const modals = document.querySelectorAll('.modal-radio');

    modals.forEach(modal => {
        let currentBanner = 0;
        const banners = modal.querySelectorAll('.banner-container img');
        const totalBanners = banners.length;

        // Función para rotar banners dentro de un modal específico
        function rotateBanners() {
            if (banners.length > 0) {
                // Ocultar el banner actual
                banners[currentBanner].style.display = 'none';
                // Avanzar al siguiente banner
                currentBanner = (currentBanner + 1) % totalBanners;
                // Mostrar el nuevo banner
                banners[currentBanner].style.display = 'block';
            }
        }

        // Cambiar de banner cada 10 segundos dentro del modal específico
        setInterval(rotateBanners, 10000); // 10000 ms = 10 segundos
    });
});




/*document.addEventListener("DOMContentLoaded", function () {
    var audioPlayer = document.getElementById('player');
    var telebin = document.getElementById('telebin');

    audioPlayer.addEventListener('play', function () {
        telebin.style.display = 'block'; // Muestra el telebin
    });

    audioPlayer.addEventListener('pause', function () {
        telebin.style.display = 'none'; // Oculta el telebin cuando se pausa
    });

    audioPlayer.addEventListener('ended', function () {
        telebin.style.display = 'none'; // Oculta el telebin cuando termina
    });
});*/



document.addEventListener("DOMContentLoaded", function () {
    // Seleccionar todos los reproductores de audio
    var players = document.querySelectorAll('audio[id^="playerRadio"]');

    // Inicializar Plyr en cada reproductor
    players.forEach(function(playerElement) {
        const player = new Plyr(playerElement);

        // Obtener el telebin correspondiente al reproductor
        var telebin = document.getElementById(playerElement.id.replace('player', 'telebin'));

        player.on('play', function () {
            telebin.style.display = 'block'; // Mostrar telebin cuando se reproduce
        });

        player.on('pause', function () {
            telebin.style.display = 'none'; // Ocultar telebin cuando se pausa
        });

        player.on('ended', function () {
            telebin.style.display = 'none'; // Ocultar telebin cuando el audio termine
        });
    });
});




function registerClick(radioId) {
    fetch('/register-click', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest', // Para identificar la solicitud AJAX
        },
        body: JSON.stringify({ radio_id: radioId })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Click registrado:', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
