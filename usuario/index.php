<?php
require 'servicios/config.php';
require 'servicios/conexion.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre_videojuego, precio, imagen FROM productos WHERE estado=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

// session_destroy();
// print_r($_SESSION);
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
              <form class="d-flex" role="search" method="POST">
                <input class="form-control col-lg-12 me-2" name="campo" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" name="enviar" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                  </svg></button>
              </form>
            </div>
          </ul>
          <div>
            <a href="checkout.php" class="btn btn-primary">Carrito <span id="num_cart" class="badge bg-secondary">
                <?php echo $num_cart; ?>
              </span>
            </a>
            <a href="LoginC.php" class="btn btn-primary" name="login"> <i class="bi bi-person"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
              </svg>Login</a>
            <a href="register.php" class="btn btn-primary" name="registrarse"> <i class="bi bi-person-add"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
              </svg>Registrate</a>
          </div>
          </span>
          </a>
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
              $id = $row['id'];
              $imagen = $row['imagen'];

              if (!file_exists($imagen)) {
                $imagen = "images/no.photo.jpg";
              }
              ?>
              <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $row['nombre_videojuego'] ?>
                </h5>
                <p class="card-text">CLP$
                  <?php echo number_format($row['precio'], 0, ',', '.'); ?>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo
                                                                              hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                  </div>
                  <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id']; ?>, 
                  '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar</button>
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

  <script>
    function addProducto(id, token) {
      var url = 'clases/carrito.php'
      var formData = new FormData();
      formData.append('id', id)
      formData.append('token', token)

      fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if (data.ok) {
            let elemento = document.getElementById("num_cart")
            elemento.innerHTML = data.numero
          }
        })
    }
  </script>
</body>

</html>