let cancel = document.querySelectorAll('.cancel');

let read0 = document.getElementById('read0');
let read1 = document.getElementById('read1');
let read2 = document.getElementById('read2');
let read3 = document.getElementById('read3');



cancel.forEach(function (item) {
    item.addEventListener('click', function () {
        window.location.href = '/views/admin.php';
    });
} );

read0.addEventListener('click', function () {
    let modal_read0 = document.getElementById('modal_read0');
    modal_read0.classList.remove('hidden');
    modal_read0.classList.add('flex');
});

read1.addEventListener('click', function () {
    let modal_read1 = document.getElementById('modal_read1');
    modal_read1.classList.remove('hidden');
    modal_read1.classList.add('flex');
});

read2.addEventListener('click', function () {
    let modal_read2 = document.getElementById('modal_read2');
    modal_read2.classList.remove('hidden');
    modal_read2.classList.add('flex');
} );

read3.addEventListener('click', function () {
    let modal_read3 = document.getElementById('modal_read3');
    modal_read3.classList.remove('hidden');
    modal_read3.classList.add('flex');
});

