function atendida(e) {

    if (confirm("Desea dar por atendida la reparacion")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete4 = document.querySelectorAll("#btnAtendida");

for (var i = 0; i < linkDelete4.length; i++) {
    linkDelete4[i].addEventListener('click', atendida);
}