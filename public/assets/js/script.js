window.addEventListener("scroll", (event) => {
    var header = document.querySelector('header.fixed-top');
    if (window.pageYOffset > 90) header.classList.add('bg-light', 'navbar-light', 'shadow');
    else header.classList.remove('bg-light', 'navbar-light', 'shadow');
});

function countdown() {
    var targetDate = new Date("2023-06-26T23:59:59"); // Date cible du compte à rebours
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