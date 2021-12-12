<!-- Modal -->

<div class="modal fade" id="ingresarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese una direccion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="../crud/ingresarDireccion.php">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cliente N.<?php echo " $idc" ?></label>
                        <input type="hidden" value="<?php echo $idc ?> " id="id" name="id">
                        <input type="text" class="form-control" value="<?php echo "$name $lastName" ?>"   readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Direccion</label>
                        <input type="text" class="form-control" placeholder="Ingrese la direccion" id="direccionM" name="direccionM">
                    </div>

                    
                      <!-- text input -->
                      <div class="form-group">
                        <label>Seleccione tipo de ubicación</label>
                        <select class="form-control" name="tipoUbicacion" id="tipoUbicacion">
                          <option value="0">Seleccionar ubicación</option>  
                          <option value="1">Coordenadas gps actuales</option>
                          <option value="2">Seleccionar en mapa</option>
                        </select>
                      </div>

                      
                    
                      <div id="map">

                      </div>

                      

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Latitud</label>
                        <input type="text" class="form-control" placeholder="Latitud" id="latitud" name="latitud" readonly>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Longitud</label>
                        <input type="text" class="form-control" placeholder="Longitud" id="longitud" name="longitud" readonly>
                    </div>



                

                    <div class="modal-footer">
                        <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardarD" id="btnGuardarD">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" name="btnCancelarD" id="btnCancelarD">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Tu navegador actual no soporta los servicios de geolocalización.";
    }
}

function showPosition(position) {
    //x.innerHTML = "Latitude: " + position.coords.latitude + 
    //"<br>Longitude: " + position.coords.longitude;
    document.getElementById('latitud').value = position.coords.latitude;
    document.getElementById('longitud').value = position.coords.longitude;

}
</script>

<script type="text/javascript">
   
   
   $(document).ready(function(){
    
        //recargarLista();

        $('#tipoUbicacion').change(function(){
        
        //var idCliente = document.getElementById('lista2').value;
        var filtroUbicacion = document.getElementById('tipoUbicacion').value;

        if(filtroUbicacion==1){
            getLocation();
            document.getElementById("map").style.width="0%";
            document.getElementById("map").style.height="0px";
        }

        if(filtroUbicacion==2){
            //Inicializamos el mapa
            initMap();
            //Le damos tamaño al mapa
            document.getElementById("map").style.width="100%";
            document.getElementById("map").style.height="300px";
        }
           
        });

    });
</script>

<script>
 
 
 var marker;          //variable del marcador
 var coords = {};    //coordenadas obtenidas con la geolocalización
  
 //Funcion principal
 initMap = function () 
 {
  
     //usamos la API para geolocalizar el usuario
         navigator.geolocation.getCurrentPosition(
           function (position){
             coords =  {
               lng: position.coords.longitude,
               lat: position.coords.latitude
             };
             setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
             
            
           },function(error){console.log(error);});
     
 }
  
  
  
 function setMapa (coords)
 {   
       //Se crea una nueva instancia del objeto mapa
       var map = new google.maps.Map(document.getElementById('map'),
       {
         zoom: 13,
         center:new google.maps.LatLng(coords.lat,coords.lng),
  
       });
  
       //Creamos el marcador en el mapa con sus propiedades
       //para nuestro obetivo tenemos que poner el atributo draggable en true
       //position pondremos las mismas coordenas que obtuvimos en la geolocalización
       marker = new google.maps.Marker({
         map: map,
         draggable: true,
         animation: google.maps.Animation.DROP,
         position: new google.maps.LatLng(coords.lat,coords.lng),
  
       });
       //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
       //cuando el usuario a soltado el marcador
       marker.addListener('click', toggleBounce);
       
       marker.addListener( 'dragend', function (event)
       {
         //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
         
         document.getElementById("latitud").value = this.getPosition().lat();
         document.getElementById("longitud").value = this.getPosition().lng();
        

         

        });
 }
  
 //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
 function toggleBounce() {
   if (marker.getAnimation() !== null) {
     marker.setAnimation(null);
   } else {
     marker.setAnimation(google.maps.Animation.BOUNCE);
   }
 }
  
 // Carga de la libreria de google maps 
  
     </script>

<script async defer src="https://maps.googleapis.com/maps/api/js?callback="></script>

