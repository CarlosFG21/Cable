function reactivarPago(e){

    if (confirm("¿Desea marcar el pago como pagado?")){
        return true;
    }else{
 
     e.preventDefault(); //se cancela el evento
 
    }
 
 }
 
 let linkDelete11 = document.querySelectorAll("#btnReactivarPago");
 
 for (var i = 0; i < linkDelete11.length; i++){
     linkDelete11[i].addEventListener('click', reactivarPago);
 }