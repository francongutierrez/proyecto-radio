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

        setInterval(rotateBanners, 10000);
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

