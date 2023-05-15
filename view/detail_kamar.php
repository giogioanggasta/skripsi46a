<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Detail Kamar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  <style>
   @font-face {
      font-family: navBarFont;
      src: url("../fonts/Kiona-Regular.ttf");
      font-style: bold;
    }

    a {
      font-family: navBarFont;
      font-size: 25px;
      color: #868B8E;
      font-style: bold;
    }
  </style>




  </head>
  <body>
    
      <div class="w3-bar w3-white w3-border " id="menu" style="background-color: #11355b">
          <a href="Home.php" class="w3-bar-item"><img src="../images/logo46a.png" style="width:150px"></a>
          <a href="Login.php" class="w3-bar-item" style="float: right; margin-right: 2.5%; margin-top:-6.4%; text-decoration: none; color: white">Login</a>
          <a href="Fasilitas.php" class="w3-bar-item" style="float: right; margin-top:-6.4%; margin-right: 10.1%; text-decoration: none; color: white;">Fasilitas</a>
          <a href="Kamar.php" class="w3-bar-item" style="float: right; margin-top:-6.4%; margin-right: 20.9%; text-decoration: none; color: white; ">Kamar</a>
        </div>

    <div class = "card-wrapper">
      <div class = "card" style="margin-top: 8.62%">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "../images/kamar1.jpg" alt = "shoe image">
              <img src = "../images/kamar2.jpg" alt = "shoe image">
              <img src = "../images/kamar3.jpg" alt = "shoe image">
              <img src = "../images/kamar4.jpg" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "../images/kamar1.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "../images/kamar2.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "../images/kamar3.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "../images/kamar4.jpg" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">Kamar Deluxe</h2>

          <div class = "product-price">
            <p class = "last-price">Harga Normal: <span>Rp.2.500.000</span></p>
            <p class = "new-price">Harga Diskon: <span>Rp.1.500.000</span></p>
          </div>

          <div class = "product-detail">
            <h2>Tentang Kamar Deluxe Kost 46A</h2>
            <p>Kamar deluxe adalah kamar terbesar dari semua tipe kamar di kost 46A. Jumlah dari kamar ini cukup terbatas dibanding tipe kamar lain</p>
            <p>Kamar ini dapat dihuni untuk maksimal 2 orang, sudah memiliki kamar mandi dalam dan furnitur bawaan seperti meja, lemari, dan kasur</p>
            <ul>
              <li>Ukuran Kamar: <span>4x4 Meter</span></li>
              <li>Kamar Mandi: <span>Kamar mandi dalam</span></li>
              <li>Kloset: <span>Kloset Duduk</span></li>
              <li>Kamar untuk: <span>Max 2 Orang</span></li>
            </ul>
          </div>

          <div class = "purchase-info">
            <button type = "button" class = "btn">
              Pesan Kamar Disini <i class = "fas fa-money-bill"></i>
            </button>
          </div>

          <div class = "social-links">
            <p>Share At:   </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    
    <script src="script.js"></script>
  </body>
</html>