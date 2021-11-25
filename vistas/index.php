<?php

include ("layout/header.php");

?>
  <title>Cablevisión | Robles</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tablero</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="https://es.wikipedia.org/wiki/Gual%C3%A1n" target="_blank">Primero Gualán, Segundo Gualán y tercero Gualán</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $conexion = new Conexion();
                //Conectamos a la base de datos
                $conexion->conectar();
                $sql = "SELECT id_cliente FROM cliente  where estado=1";
                $resultado = mysqli_query($conexion->db,$sql);
                $row = mysqli_num_rows($resultado);
                echo "<h3 style='user-select: auto;'>$row</h3>";
                ?>
                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="cliente.php" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px"></sup></h3>

                <p>Servicios</p>
              </div>
              <div class="icon">
                <i class="fas fa-tools"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                $conexion = new Conexion();
                $conexion->conectar();
                $sql ="SELECT id_personal FROM personal where estado=1";
                $resultado =  mysqli_query($conexion->db,$sql);
                $row = mysqli_num_rows($resultado);

                echo "<h3>$row</h3>";

              ?>
                <p>Personal</p>
              </div>
              <div class="icon">
                <i class="fas fas fa-user-cog"></i>
              </div>
              <a href="personal.php" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $conexion = new Conexion();
                  $conexion->conectar();
                  $sql = "SELECT id_usuario FROM usuario where estado=1";
                  $resultado = mysqli_query($conexion->db, $sql);
                  $row = mysqli_num_rows($resultado);
                  
                  echo "<h3>$row</h3>";
                ?>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="usuario.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
          
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
           

            
                              
           
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php

include ("layout/footer.php");

?>


