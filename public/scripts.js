let currentBanner = 0;
const banners = document.querySelectorAll('#banner-container img');
const totalBanners = banners.length;

function rotateBanners() {
    // Ocultar el banner actual
    banners[currentBanner].style.display = 'none';
    // Avanzar al siguiente banner
    currentBanner = (currentBanner + 1) % totalBanners;
    // Mostrar el nuevo banner
    banners[currentBanner].style.display = 'block';
}

// Cambiar de banner cada 10 segundos
setInterval(rotateBanners, 10000); // 10000 ms = 10 segundos




document.addEventListener("DOMContentLoaded", function () {
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
