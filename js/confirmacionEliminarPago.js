function eliminarPago(e){

    if (confirm("¿Desea anular el pago?")){
        return true;
    }else{
 
     e.preventDefault(); //se cancela el evento
 
    }
 
 }
 
 let linkDelete10 = document.querySelectorAll("#btnEliminarPago");
 
 for (var i = 0; i < linkDelete10.length; i++){
     linkDelete10[i].addEventListener('click', eliminarPago);
 }