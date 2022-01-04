<!-- Modal -->

<div class="modal fade" id="reporteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione el Tipo de reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="../reportes/reporte_personal.php" id="formmodal" name="formmodal" target="_blank">
                <!--form role="form" method="post" action="" id="formmodal" name="formmodal"-->
                      <!-- text input -->
                      <div class="form-group">
                        <label>Seleccione tipo de Reporte</label>
                        <select class="form-control" name="tipoReporte" id="tipoReporte">
                          <option value="0">Reporte actual</option>  
                          <option value="1">Reporte por Fecha</option>
                          <option value="2">Reporte de un Empleado</option>
                          <option value="3">Reporte General</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label id="l1" for="campfecha" hidden></label>
                        <input type="month" class="form-control" id="campfecha" name="campfecha" hidden>

                        <select class="form-control select2" name="SEmpleado" id="SEmpleado" hidden>
                          <?php
                            $personal = new Personal();
                            $arrayPersonal = $personal->obtenerPersonal();

                            for($i=0; $i<sizeof($arrayPersonal); $i++){
                              $idPersonal = $arrayPersonal[$i]->getIdPersonal();
                              $nombres = $arrayPersonal[$i]->getNombres()." ".$arrayPersonal[$i]->getApellidos();
                              $cargo = $arrayPersonal[$i]->getCargo();

                              echo "<option value='$idPersonal'> $nombres"."  -  ".$cargo."</option>";
                              //echo "<option value='$idPersonal'>" ."[" . $nombres . "] " . "[". $apellidos . " " . $cargo . "]". "</option>";
                            }
                          ?>
                        </select>
                      </div>
                      
                    <div class="modal-footer">
                      <input type="submit" value="Generar Reporte" class="btn btn-primary" name="btnGenReport" id="btnGenReport">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" name="btnCancelarD" id="btnCancelarD">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   
  $(document).ready(function(){
    //recargarLista();
        $('#tipoReporte').change(function(){
        
        var filtroRep = document.getElementById('tipoReporte').value;
        let element = document.getElementById('l1');

        if(filtroRep==0 || filtroRep==3){
          element.setAttribute("hidden", "hidden");
          document.formmodal.campfecha.hidden = true;
          document.formmodal.SEmpleado.hidden = true;
          $('#SEmpleado').select2('destroy');
        }

        if(filtroRep==1){
          document.formmodal.SEmpleado.hidden = true;
          element.removeAttribute("hidden");
          element.innerHTML = 'Seleccione una Fecha';
          document.formmodal.campfecha.hidden = false;
          $('#SEmpleado').select2('destroy');
        }

        if(filtroRep==2){
          document.formmodal.campfecha.hidden = true;
          element.removeAttribute("hidden");
          element.innerHTML = 'Seleccione un Empleado';
          document.formmodal.SEmpleado.hidden = false;
          $('.select2').select2()
        }

      });
    });
</script>
