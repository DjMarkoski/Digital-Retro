<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Digital Retro Store</title>
  <script type="text/javascript" src="js/jquery-3.7.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    :root {
      --main-header-color: linear-gradient(45deg, #ef971e, #ffbc6a);
      --main-red: #c71212;
    }

    body,
    html {
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #f3f3f3;
    }

    header {
      height: 40px;
      padding: 10px;
      width: calc(100% - 20px);
      line-height: 40px;
      display: flex;
      background: var(--main-header-color);
      position: fixed;
      top: 0;
      left: 0;
    }

    .logo-place {
      width: 150px;
      justify-content: center;
      align-items: center;
      margin-top: 7px;
    }

    .logo-place img {
      width: 20%;
    }

    .search-place {
      width: calc(100% - 440px);
      display: flex;
      padding: 0px 20px;
    }

    input {
      padding: 10px;
      font-size: 15px;
      background-color: #fefefe;
      border: 1px solid #ccc;
      width: calc(100% - 62px);
      font-family: 'Sen', sans-serif;
    }

    input:placeholder {
      color: #ccc;
    }

    .search-place input {
      padding: 10px;
      font-size: 15px;
      background-color: #fefefe;
      border: 1px solid #ccc;
      width: calc(100% - 62px);
      font-family: 'Sen', sans-serif;
    }

    .search-place input:placeholder {
      color: #ccc;
    }

    .btn-main {
      padding: 10px;
      font-size: 15px;
      background-color: #fefefe;
      border-style: none;
      border: 1px solid #ccc;
      cursor: pointer;
    }

    .btn-search {
      width: 40px;
      color: #333;
    }

    .options-place {
      width: 250px;
      display: flex;
      justify-content: flex-end;
    }

    .item-option {
      padding: 5px 10px;
      line-height: 30px;
      font-size: 30px;
      cursor: pointer;
      color: #fff;
      font-family: 'Sen', sans-serif;
      display: flex;
    }

    .item-option p {
      font-size: 15px;
      margin: 0;
      margin-left: 5px;
    }

    .main-content {
      margin-top: 60px;
      width: 100%;
      font-family: 'Sen', sans-serif;
    }

    .content-page {
      margin: auto;
      padding: 10px;
      width: calc(100% - 20px);
      max-width: 1180px;
    }

    .content-page section {
      display: flex;
      background: #fff;
    }

    .part1 {
      padding: 10px;
      width: calc(60% - 20px);
    }

    .part2 {
      padding: 10px;
      width: calc(40% - 20px);
      border-left: 1px solid #ddd;
    }

    .part1 img {
      width: 100%;
    }

    .part2 * {
      margin: 10px 0;
      font-family: 'Sen', sans-serif;
    }

    .part2 h2 {
      color: #333;
      font-size: 30px;
    }

    .part2 h1 {
      color: var(--main-red);
      font-size: 45px;
    }

    .part2 h1 span {
      color: #c71212;
      font-size: 30px;
    }

    .part2 h3 {
      color: #333;
      font-weight: normal;
    }

    button {
      border-style: none;
      border-radius: 5px;
      padding: 13px 20px;
      color: #fff;
      background: #c71212;
      cursor: pointer;
      font-size: 16px;
    }

    .part2 button {
      border-style: none;
      border-radius: 5px;
      padding: 13px 20px;
      color: #fff;
      background: #c71212;
      cursor: pointer;
      font-size: 16px;
    }

    .title-section {
      padding: 10px 0;
      font-size: 20px;
      color: #666;
      font-family: 'Sen', sans-serif;
    }

    .products-list {
      display: table;
      width: 100%;
    }

    .product-box {
      display: inline-table;
      padding: 10px;
      width: calc(100%/5 - 20px);
    }

    .product-box a {
      text-decoration: none;
    }

    .product {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 0 8px 3px #ccc;
      background-color: #fff;
      font-family: 'Sen', sans-serif;
    }

    .product img {
      width: 100%;
      border-radius: 10px 10px 0 0;
    }

    .detail-title {
      padding: 5px;
      text-align: center;
      font-size: 18px;
      color: #333;
      width: calc(100% - 10px);
      height: 35px;
    }

    .detail-description {
      text-align: center;
      font-size: 14px;
      color: #333;
      padding: 5px;
      width: calc(100% - 10px);
      height: 34px;
    }

    .detail-price {
      text-align: center;
      font-size: 25px;
      color: var(--main-red);
      padding: 5px;
      width: calc(100% - 10px);
    }

    .detail-price span {
      font-size: 15px;
    }

    a {
      color: #fff;
    }

    .body-pedidos {
      width: 100%;
    }

    .item-pedido {
      display: flex;
      border: 1px #ccc solid;
      margin-bottom: 5px;
      background: #fff;
    }

    .pedido-img {
      width: 200px;
    }

    .pedido-img img {
      width: 100%;
    }

    .pedido-detalle {
      padding: 10px;
      width: calc(100% - 220px);
    }

    .pedido-detalle h3,
    .pedido-detalle p {
      margin: 5px 0;
    }

    .ipt-procom {
      width: 250px;
      margin-bottom: 5px;
    }

    .p-line {
      display: flex;
    }

    .p-line div {
      width: 150px;
      font-weight: 600;
    }

    .metodo-pago {
      display: flex;
      width: 100%;
    }

    input[type="radio"] {
      width: 20px;
      height: 20px;
      margin: 0 5px 5px 5px;
    }

    .metodo-pago label {
      width: calc(100% - 30px);
    }

    .content-page h4 {
      margin: 5px 0;
    }
    .nombre{
      width: 20px;
      justify-content: left;
      align-items: left;
      color: #fff;
      position: left;
    }
  </style>
</head>

<body>
  <header>
    <div class="logo-place"><img src="images/logo.jpg"></div>
    <div class="nombre">Digital Retro</div>
    <div class="search-place">
      <input type="text" id="idbusqueda" placeholder="Encuentra todo los que necesitas">
      <button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <div class="option-place"></div>
    <div class="item-option" title="Registrate"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
    <div class="item-option" title="Ingresar"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
    <div class="item-option" title="Mis Compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>

  </header>
  <div class="main-content">
    <div class="content-page">
      <div class="title-section">Productos descatados</div>
      <div class="product-list">
        <div class="product-box">
          <a href="">
            <div class="product">
              <img src="images/god-of-war-ps5.jpg">
              <div class="detail-tittle">God Of War</div>
              <div class="detail-description">Juego de aventuras</div>
              <div class="detail-price">$49.990</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>