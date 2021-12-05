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
                    <div class="modal-footer">
                        <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardarD" id="btnGuardarD">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" name="btnCancelarD" id="btnCancelarD">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>