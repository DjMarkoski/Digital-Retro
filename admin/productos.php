<?php
include_once "bdecommerce.php";
$con = mysqli_connect($host, $user, $pass, $db);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Productos</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tablaProductos" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nombre_videojuego</th>
                    <th>Precio</th>
                    <th>Key_videojuego</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Categoria</th>
                    <th>Fecha_lanzamiento</th>
                    <th>Clasificacion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // include_once "bdecommerce.php";
                  // $con=mysqli_connect($host, $user, $pass, $db);
                  $query = "SELECT id_productos,nombre_videojuego,precio,key_videojuego,stock,descripcion,imagen,categoria,fecha_lanzamiento,clasificacion from productos; ";
                  $res = mysqli_query($con, $query);
                  while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                    <tr>
                      <td><?php echo $row['id_productos'] ?></td>
                      <td><?php echo $row['nombre_videojuego'] ?></td>
                      <td><?php echo $row['precio'] ?></td>
                      <td><?php echo $row['key_videojuego'] ?></td>
                      <td><?php echo $row['stock'] ?></td>
                      <td><?php echo $row['descripcion'] ?></td>
                      <td><?php echo $row['imagen'] ?></td>
                      <td><?php echo $row['categoria'] ?></td>
                      <td><?php echo $row['fecha_lanzamiento'] ?></td>
                      <td><?php echo $row['clasificacion'] ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>