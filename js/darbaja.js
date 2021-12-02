function baja(e) {

    if (confirm("Desea desechar el registro")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete5 = document.querySelectorAll("#btnBaja");

for (var i = 0; i < linkDelete5.length; i++) {
    linkDelete5[i].addEventListener('click', baja);
}