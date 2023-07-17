window.addEventListener("scroll", (event) => {
    var header = document.querySelector('header.fixed-top');
    if (window.pageYOffset > 90) header.classList.add('bg-light', 'navbar-light', 'shadow');
    else header.classList.remove('bg-light', 'navbar-light', 'shadow');
});

var navbarToggler = document.querySelector('.navbar-toggler');
var header = document.querySelector('header');
navbarToggler.addEventListener('click', function() {
    if (!header.classList.contains('bg-light')) {
        header.classList.toggle('bg-light');
        header.classList.toggle('navbar-light');
        header.classList.toggle('shadow');
    }
});

// Nav links activate
var navLink = document.querySelectorAll('header .nav-link');
var navBrand = document.querySelector('header .navbar-brand');
for (var i = 0; i < navLink.length; i++) {
    navLink[i].addEventListener('click', function(e) {
        removeNavLink();
        e.target.classList.add('active');
    });
    
}
navBrand.addEventListener('click', function() {
    removeNavLink();
});

function removeNavLink() {
    for (var i = 0; i < navLink.length; i++) {
        navLink[i].classList.remove('active');
    }
}

function countdown() {
    var targetDate = new Date("2023-10-06T23:59:59"); // Date cible du compte à rebours
    var countdownElements = document.getElementsByClassName("countdown-amount");

    var interval = setInterval(function () {
        var currentDate = new Date();
        var remainingTime = targetDate - currentDate;

        if (remainingTime <= 0) {
            clearInterval(interval);
            return;
        }

        var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
            (remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor(
            (remainingTime % (1000 * 60 * 60)) / (1000 * 60)
        );
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        countdownElements[0].textContent = formatTime(days);
        countdownElements[1].textContent = formatTime(hours);
        countdownElements[2].textContent = formatTime(seconds);
    }, 1000);
}

function formatTime(time) {
    return time.toString().padStart(2, "0");
}

countdown();