<?php 
define("CLIENT_ID","ATe8IdikWEG_1Y0CQ1hy_wJxTJzeVJI_VUtme9OQJjg3LU1REAZnhgveqCr5coxci_zchsEiCb6iHnWA");
define("CURRENCY","USD");
define("KEY_TOKEN","APR.wqc-354*");
define("MONEDA","CLP$");

session_start();
$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}
?>