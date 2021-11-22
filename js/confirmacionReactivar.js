function reactivar(e){

    if (confirm("¿Estás seguro que deseas reactivar el usuario?")){
        return true;
    }else{
 
     e.preventDefault(); //se cancela el evento
 
    }
 
 }
 
 let linkDelete2 = document.querySelectorAll("#btnReactivar");
 
 for (var i = 0; i < linkDelete2.length; i++){
     linkDelete2[i].addEventListener('click', reactivar);
 }