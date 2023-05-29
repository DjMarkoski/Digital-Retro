<?php 
    include_once "bdecommerce.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    $nombre_videojuego=$_POST['nombreV'];
    $precio=$_POST['precio'];
    $plataformas=array(1=>"PS5", 2=>"PS4", 3=>"Steam", 4=>"XBOX S", 5=>"XBOX X", 6=>"Epic Games", 7=>"EA Play", );
    $plataforma=$plataformas[$_POST['plataforma']];
    $key_videojuego=$_POST['keyV'];
    $stock=$_POST['stock'];
    $descripcion= $_POST['descrip'];
    $categoria=$_POST['categ'];
    $fecha_lanzamiento=$_POST['fechaV'];
    $clasificacion=$_POST['clasificacion'];
    $sql ="INSERT INTO productos (nombre_videojuego, precio, plataforma, key_videojuego, stock, descripcion, categoria, fecha_lanzamiento, clasificacion) VALUES ('$nombre_videojuego','$precio','$plataforma','$key_videojuego','$stock','$descripcion','$categoria','$fecha_lanzamiento','$clasificacion')";
    $query = mysqli_query($con,$sql);

    if($query === TRUE) {
         header("Location: panel.php?modulo=productos");
         
    }
 
?>