import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    var alertSuccess = document.querySelector('.alert-success');
    if (alertSuccess) {
        alertSuccess.classList.add('show');

        setTimeout(function() {
            alertSuccess.style.opacity = '0';
            alertSuccess.style.transition = 'opacity 1s ease-out';
        }, 2000);
    }
});