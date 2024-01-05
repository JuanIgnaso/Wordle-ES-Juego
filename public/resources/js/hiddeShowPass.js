//Cambiar inputs tipo password a tipo texto o inversa
/*
Con intención de que el pariente previo del botón sea un input field tipo password
*/
let ocultar = document.querySelectorAll('.showUp');
ocultar.forEach(element => {
    element.addEventListener('click', function () {
        if (this.previousSibling.getAttribute('type') == 'password') {
            this.previousSibling.setAttribute('type', 'text');
            this.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
            this.style.color = 'grey';
        } else {
            this.previousSibling.setAttribute('type', 'password');
            this.innerHTML = '<i class="fa-regular fa-eye"></i>';
            this.style.color = 'white';
        }
    })
});