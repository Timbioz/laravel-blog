let link = document.querySelector('.collapse-trigger');
let caret = document.querySelector('.collapse-trigger i');

link.addEventListener('click', function () {
    caret.classList.toggle('fa-caret-right');
    caret.classList.toggle('fa-caret-down');
});
