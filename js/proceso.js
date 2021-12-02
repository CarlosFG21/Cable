function proceso(e) {

    if (confirm("Desea poner en proceso la reparacion")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete3 = document.querySelectorAll("#btnProceso");

for (var i = 0; i < linkDelete3.length; i++) {
    linkDelete3[i].addEventListener('click', proceso);
}