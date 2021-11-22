function confirmacion(e){

    if (confirm("¿Estás seguro que deseas eliminar el registro?")){
        return true;
    }else{
 
     e.preventDefault(); //se cancela el evento
 
    }
 
 }
 
 let linkDelete = document.querySelectorAll("#btnEliminar");
 
 for (var i = 0; i < linkDelete.length; i++){
     linkDelete[i].addEventListener('click', confirmacion);
 }