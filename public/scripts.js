document.addEventListener("DOMContentLoaded", function () {
    const modals = document.querySelectorAll('.modal-radio');

    modals.forEach(modal => {
        let currentBanner = 0;
        const banners = modal.querySelectorAll('.banner-container img');
        const totalBanners = banners.length;

        function rotateBanners() {
            if (banners.length > 0) {
                banners[currentBanner].style.display = 'none';
                currentBanner = (currentBanner + 1) % totalBanners;
                banners[currentBanner].style.display = 'block';
            }
        }

        setInterval(rotateBanners, 2000);
    });
});



// document.addEventListener("DOMContentLoaded", function () {
//     const bannerContainers = document.querySelectorAll('.banner-container');

//     bannerContainers.forEach(container => {
//         let currentBanner = 0;
//         const banners = container.querySelectorAll('img');
//         const totalBanners = banners.length;

//         function rotateBanners() {
//             if (banners.length > 0) {
//                 banners[currentBanner].style.display = 'none';
//                 currentBanner = (currentBanner + 1) % totalBanners;
//                 banners[currentBanner].style.display = 'block';
//             }
//         }

//         setInterval(rotateBanners, 10000);
//     });
// });






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
        body: JSON.stringify({ cliente_id: clienteId })  // Cambiamos a cliente_id
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
        
        // Deshabilitar el botón de previsualización inicialmente
        previewButton.disabled = true;

        // Habilitar el botón de previsualización cuando se cargue una imagen
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
        
        // Verificar si se ha seleccionado un archivo
        if (fileInput && fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                // Mostrar la imagen en el modal
                const modalImg = document.getElementById('modalImage');
                if (modalImg) {
                    modalImg.src = e.target.result; // Asignar la URL generada
                }

                // Abrir el modal
                const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
                previewModal.show();
            }

            reader.readAsDataURL(file); // Leer el archivo como URL de datos
        }
    }