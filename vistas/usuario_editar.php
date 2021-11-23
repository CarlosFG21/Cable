

<?php

include ("layout/header.php");

?>
  <title>Cablevisión | Robles</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Editar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              <?php
                           $usuario = new Usuario();
                           $id= $_REQUEST['id'];
                           $resultado = $usuario->buscarPorId($id);
   
                           $nombre = $resultado->getNombre();
                           $apellido = $resultado->getApellido();
                           $nickname = $resultado->getNickname();
                           $permiso = $resultado->getRol();
                           $contrasena = $resultado->getContrasena();
                        ?>
              
              <form role="form" method="post" action="../crud/editarUsuario.php?id=<?php echo $id;?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre</label>
                        
                        
                        
                      <?php  
                        echo "<input type='text' class='form-control' placeholder='Nombre' value='$nombre'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1'name='nombre' id='nombre'>";
                      
                      ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellido</label>
                        
                        <?php
                        
                        echo "<input type='text' class='form-control' placeholder='Apellido' value='$apellido'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' name='apellido' id='apellido'>";
                        
                        ?>
                      
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Usuario</label>
                        <?php  
                        echo "<input type='text' class='form-control' placeholder='Usuario' value='$nickname' name='usuario' id='usuario' readonly>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Permiso</label>
                        <select class="form-control" id="permiso" name="permiso">
                          
                        <?php
                          
                          if(strcmp($permiso, "Usuario") === 0){
                          echo "<option>Usuario</option>";
                          echo "<option>Administrador</option>";
                          }

                          if(strcmp($permiso, "Administrador") === 0){
                            echo "<option>Administrador</option>";
                            echo "<option>Usuario</option>";
                            }

                          ?>

                        </select>
            
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contraseña</label>
                        
                        <?php
                        
                        echo"<input type='password' class='form-control' placeholder='Contraseña' value='$contrasena' name='contrasena' id='contrasena' required>";
                        
                        ?>
                      
                        </div>
                    </div>
                  </div>  
                  <div class="">
                  <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">
                  <a type="submit" class="btn btn-danger" href="usuario.php">Regresar</a>
                </div>     
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php

include ("layout/footer.php");

?>
