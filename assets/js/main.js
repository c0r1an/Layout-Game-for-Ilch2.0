document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.querySelector('[data-game-nav-toggle]');
    var nav = document.querySelector('[data-game-nav]');

    if (!toggle || !nav) {
        return;
    }

    toggle.addEventListener('click', function () {
        nav.classList.toggle('is-open');
    });
});
