window.addEventListener("scroll", (event) => {
    var header = document.querySelector('header.fixed-top');
    if (window.pageYOffset > 90) header.classList.add('bg-light', 'navbar-light', 'shadow');
    else header.classList.remove('bg-light', 'navbar-light', 'shadow');
});