<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Retro Store</title>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <header>
        <div class="logo-place"><img src="https://images.cooltext.com/5660233.png"></div>
        <!-- <div class="nombre">Digital Retro</div> -->
        <div class="search-place">
            <input type="text" id="idbusqueda" placeholder="Encuentra todo los que necesitas">
            <button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="option-place"></div>
        <div class="item-option" title="Registrate"><a href="register.php"> <i class="fa fa-user-circle-o" aria-hidden="true"></i></a></div>
        <div class="item-option" title="Iniciar Sesion"><a href="loginC.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></div>
        <div class="item-option" title="Mis Compras"><a href="#"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></div>


    </header>
    <div class="main-content">
        <div class="content-page">
            <section>
                <div class="part1">
                    <?php
                    include_once("servicios/_conexion.php");
                    $sql = "SELECT imagen FROM productos";
                    $result = mysqli_query($con, $sql);

                    // Verificar si se encontraron productos
                    if (mysqli_num_rows($result) > 0) {
                        // Recorrer los resultados y mostrar los productos 
                        while ($row = mysqli_fetch_assoc($result)) {

                            $imagen = $row['imagen'];
                            echo '<img src="data:image/jpg;base64,' . base64_encode($imagen) . '" class="card-img-top" alt="...">';
                        }
                    } else {
                        echo "No se encontraron productos.";
                    }
                    ?>
                </div>
                <div class="part2">
                    <h2>Descripcion</h2>
                    <h4>$49.000<span></span></h4>
                </div>
            </section>
            <div class="title-section">Productos descatados</div>
            <a href="">
                <div class="row">
                    <?php
                    // Realizar la consulta
                    include_once("servicios/_conexion.php");
                    $sql = "SELECT imagen, nombre_videojuego, precio, descripcion FROM productos";
                    $result = mysqli_query($con, $sql);

                    // Verificar si se encontraron productos
                    if (mysqli_num_rows($result) > 0) {
                        // Recorrer los resultados y mostrar los productos 
                        while ($row = mysqli_fetch_assoc($result)) {

                            $imagen = $row['imagen'];
                            $nombre_videojuego = $row['nombre_videojuego'];
                            $precio = $row['precio'];
                            $descripcion = $row['descripcion'];
                            $forma_precio = number_format($precio, 0, ",", ".");
                            // echo "<div>";
                            // echo "<img src='$imagen' alt='Imagen del producto'>";
                            // echo "<h3>$nombre</h3>";
                            // echo "<p>Precio: $precio</p>";
                            // echo "</div>";
                            // echo '<div class="card">';
                            // echo '<div class="product-list" "style="width: 18rem;"> ';
                            echo '<div class="product-box">';
                            echo '<a href="">';
                            echo '<div class="product">';
                            echo '<img src="data:image/jpg;base64,' . base64_encode($imagen) . '" class="card-img-top" alt="...">';
                            echo '<div class="card-body">
                        <h5 class="detail-tittle">' . $nombre_videojuego . '</h5>
                        <p class="detail-description">' . $descripcion . '</p>
                        <p class="detail-price">CLP$' . $forma_precio . '</p>
                    </div> 
                    </a> 
                    </div>               
                    </div>';
                        }
                    } else {
                        echo "No se encontraron productos.";
                    }
                    ?>
                </div>
            </a>
        </div>
    </div>
</body>

</html>