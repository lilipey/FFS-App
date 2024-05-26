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
window.addEventListener('load', function() {
    var perfEntries = performance.getEntriesByType("navigation");
    var alertSuccess = document.querySelector('.alert-success');
    if (perfEntries.length > 0 && perfEntries[0].type === 'back_forward') {
        alertSuccess.style.display = 'none';
    }
});