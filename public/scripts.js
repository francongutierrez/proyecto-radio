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