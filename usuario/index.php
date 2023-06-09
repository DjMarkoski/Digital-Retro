<?php
require 'servicios/config.php';
require 'servicios/conexion.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_productos, nombre_videojuego, precio, imagen FROM productos WHERE estado=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<?php

if (isset($_POST['enviar'])) {
  $busqueda = $_POST['campo'];
  $consulta = $con->prepare("SELECT * FROM productos WHERE nombre_videojuego LIKE ?");
  $termino = "%$busqueda%";
  $consulta->execute(array($termino));
  $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Retro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <header>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <strong>Digital Retro</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarHeader">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="index.php" class="nav-link active">Catalogo</a>
            </li>
            <div class="container-fluid col-lg-12">
              <form class="d-flex" method="POST" role="search">
                <input class="form-control col-lg-12 me-2" name="campo" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" name="enviar" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                  </svg></button>
              </form>
            </div>
          </ul>
          <a href="carrito.php" class="btn btn-primary">Carrito</a>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($resultado as $row) { ?>
          <div class="col">
            <div class="card shadow-sm">
              <?php
              $id = $row['id_productos'];
              $imagen = $row['imagen'];

              if (!file_exists($imagen)) {
                $imagen = "images/no.photo.jpg";
              }
              ?>
              <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['nombre_videojuego']  ?></h5>
                <p class="card-text">CLP$<?php echo number_format($row['precio'], 0, ',', '.');  ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="detalles.php?id=<?php echo $row['id_productos']; ?>&token=<?php echo
                                                                                        hash_hmac('sha1', $row['id_productos'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                  </div>
                  <a href="" class="btn btn-success">Agregar</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>