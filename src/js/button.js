let btn_promo = document.getElementById('btn_promo');
let btn_planning = document.getElementById('btn_planning');
let promo = document.getElementById('promo');
let display = document.getElementById('display');
let planning = document.getElementById('planning');
let grid_promo = document.getElementById('grid_promo');
let span_promo = document.querySelectorAll('.span_promo');



btn_promo.addEventListener('click', function () {
    if (btn_promo.innerHTML == 'Voir plus') {
        planning.classList.add('hidden')
        display.classList.remove('lg:grid-cols-2');
        grid_promo.classList.remove('grid-cols-3');
        grid_promo.classList.add('grid-cols-5');
        span_promo.forEach(function (span) {
            span.classList.remove('hidden');
            span.classList.add('block');
        });
        btn_promo.innerHTML = 'Retour';   
    } else {
        planning.classList.remove('hidden');
        display.classList.add('lg:grid-cols-2');
        grid_promo.classList.add('grid-cols-3');
        grid_promo.classList.remove('grid-cols-5');
        span_promo.forEach(function (span) {
            span.classList.add('hidden');
            span.classList.remove('block');
        });
        btn_promo.innerHTML = 'Voir plus';
    }
});

btn_planning.addEventListener('click', function () {
    if (btn_planning.innerHTML == 'Voir plus') {
        promo.classList.add('hidden');
        display.classList.remove('lg:grid-cols-2');
        grid_promo.classList.remove('grid-cols-3');
        grid_promo.classList.add('grid-cols-5');
        span_promo.forEach(function (span) {
            span.classList.remove('hidden');
            span.classList.add('block');
        });
        btn_planning.innerHTML = 'Retour';
        
    } else {
        promo.classList.remove('hidden');
        display.classList.add('lg:grid-cols-2');
        grid_promo.classList.add('grid-cols-3');
        grid_promo.classList.remove('grid-cols-5');
        span_promo.forEach(function (span) {
            span.classList.add('hidden');
            span.classList.remove('block');
        });
        btn_planning.innerHTML = 'Voir plus';
    }

});

