var Scripts = /** @class */ (function () {
    function Scripts() {
        this.enhanceNavigation();
    }
    Scripts.prototype.enhanceNavigation = function () {
        var Nav = document.querySelector('.Nav--primary');
        var NavOpen = document.querySelector('.Nav-open');
        document.querySelector('.Nav-close').remove();
        NavOpen.classList.add('is-dynamic');
        NavOpen.addEventListener('click', function (e) {
            this.classList.toggle('is-active');
            Nav.classList.toggle('is-active');
            e.preventDefault();
        });
    };
    return Scripts;
}());
new Scripts();
