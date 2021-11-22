<?php

include ("layout/header.php");

?>
  <title>Cablevisión | Robles</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>

<?php
  include("../clases/Usuario.php");
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuario</h1>
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
                <h3 class="card-title">Ver</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre</label>
                        <?php  
                        
                        $usuario = new Usuario();
                        $id= $_REQUEST['id'];
                        $resultado = $usuario->buscarPorId($id);

                        $nombre = $resultado->getNombre();
                        $apellido = $resultado->getApellido();
                        $nickname = $resultado->getNickname();
                        $permiso = $resultado->getRol();
                        $contrasena = $resultado->getContrasena();
                        //Imprimimos nombre
                        echo "<input type='text' class='form-control' placeholder='$nombre'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellido</label>
                        
                        <?php
                        //-----------------Imprimimos el apellido
                        echo "<input type='text' class='form-control' placeholder='$apellido'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>"; 
                        
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Usuario</label>
                      <?php  
                        //-----------Imprimimos el usuario
                        echo "<input type='text' class='form-control' placeholder='$nickname' disabled>";
                      ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Permiso</label>
                        
                        <?php
                        //------------Imprimimos el permiso
                        echo "<input type='text' class='form-control' placeholder='$permiso'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contraseña</label>
                        <?php
                        echo "<input type='password' class='form-control' value='$contrasena' disabled>";
                        ?>
                      </div>
                    </div>
                  </div>  
                  <div class="">
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
