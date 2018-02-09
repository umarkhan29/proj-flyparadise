$(document).ready(function() {
    var menuBtn = document.getElementById('brg-menu');
    var wrapper = document.getElementById('mobile-menu--wrapper');
    var main = document.getElementById('main');
    var toggledClass = 'menu--toggled-scale';

    menuBtn.addEventListener('click', function() {
        wrapper.classList.toggle(toggledClass);
    }, false);

    main.addEventListener('click', function() {
        wrapper.classList.remove(toggledClass);
    }, false);
});