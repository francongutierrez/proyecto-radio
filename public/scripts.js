document.addEventListener("DOMContentLoaded", function () {
    // Función para inicializar la rotación de banners en un contenedor
    function initializeBannerRotation(container) {
        let currentBanner = 0;
        const banners = container.querySelectorAll('img');
        const totalBanners = banners.length;
        const duracion = container.dataset.duracion;
        banners.forEach(banner => {
            banner.style.display = 'none';
        });
        if (banners.length > 0) {
            banners[0].style.display = 'block';
        }

        function rotateBanners() {
            if (totalBanners > 0) {
                banners[currentBanner].style.display = 'none';
                currentBanner = (currentBanner + 1) % totalBanners;
                banners[currentBanner].style.display = 'block';
            }
        }

        const rotationInterval = duracion ? parseInt(duracion) * 1000 : 2000;
        return setInterval(rotateBanners, rotationInterval);
    }

    const modals = document.querySelectorAll('.modal-radio');
    modals.forEach(modal => {
        let intervalId = null;
        modal.addEventListener('shown.bs.modal', function() {
            const container = modal.querySelector('.banner-container');
            if (container) {
                if (intervalId) {
                    clearInterval(intervalId);
                }

                intervalId = initializeBannerRotation(container);
            }
        });

        modal.addEventListener('hidden.bs.modal', function() {
            if (intervalId) {
                clearInterval(intervalId);
                intervalId = null;
            }
        });
    });

    const nonModalBanners = document.querySelectorAll(':not(.modal) > .banner-container');
    nonModalBanners.forEach(container => {
        initializeBannerRotation(container);
    });
});



document.addEventListener("DOMContentLoaded", function () {
    var players = document.querySelectorAll('audio[id^="playerRadio"]');

    players.forEach(function(playerElement) {
        const player = new Plyr(playerElement);

        var telebin = document.getElementById(playerElement.id.replace('player', 'telebin'));

        player.on('play', function () {
            telebin.style.display = 'block';
        });

        player.on('pause', function () {
            telebin.style.display = 'none';
        });

        player.on('ended', function () {
            telebin.style.display = 'none';
        });
    });
});




function registerClick(radioId) {
    fetch('/register-click', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
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


function registerBannerClick(clienteId) {
    fetch('/register-banner-click', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: JSON.stringify({ cliente_id: clienteId }) 
    })
    .then(response => response.json())
    .then(data => {
        console.log('Click registrado para el cliente:', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}




document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInDown');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const welcomeMessages = document.querySelectorAll('.animado'); 
    welcomeMessages.forEach(message => {
        observer.observe(message);
    });
});




    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.querySelector('input[name="contenido"]');
        const previewButton = document.getElementById('previewButton');
        previewButton.disabled = true;
        fileInput.addEventListener('change', function () {
            if (fileInput.files && fileInput.files.length > 0) {
                previewButton.disabled = false;
            } else {
                previewButton.disabled = true;
            }
        });
    });


    function previewImage() {
        const fileInput = document.querySelector('input[name="contenido"]');
        
        if (fileInput && fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const modalImg = document.getElementById('modalImage');
                if (modalImg) {
                    modalImg.src = e.target.result;
                }

                const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
                previewModal.show();
            }

            reader.readAsDataURL(file); 
        }
    }