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

        /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #ededed;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

  </style>




  </head>
  <body>
    
  <div class="w3-bar w3-white w3-border " id="menu" style="background-color: #11355b">
    <a href="Home-logged.php" class="w3-bar-item"><img src="../images/logo46a.png" style="width:150px"></a>
    <a href="Home.php" class="w3-bar-item" style="float: right; margin-right: 2.5%; margin-top:-6.05%; text-decoration: none;"><img src="../images/logout.png" style="width:30px"></a>
    <a href="Profile.php" class="w3-bar-item" style="float: right; margin-right: 7%; margin-top:-6.05%; text-decoration: none;"><img src="../images/user.png" style="width:30px"></a>
    <a href="Fasilitas-logged.php" class="w3-bar-item" style="float: right; margin-right: 11.5%; margin-top:-6.4%; text-decoration: none; color: white">Fasilitas</a>
    <a href="Kamar-logged.php" class="w3-bar-item" style="float: right; margin-top:-6.4%; margin-right: 22.1%; text-decoration: none; color: white;">Kamar</a>
    <a href="Pesanan.php" class="w3-bar-item" style="float: right; margin-top:-6.4%; margin-right: 30.9%; text-decoration: none; color: white; ">Pesanan</a>
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

          <div class="form-booking">
                <div class = "purchase-info">
                  <button type = "button" class = "btn" data-toggle="modal" data-target="#myModal" id="btnFormSewa">
                    Pesan Kamar Disini <i class = "fas fa-money-bill"></i>
                  </button>
                  </div>
      
                  <!-- The Modal -->
                  <div id="myModal" class="modal">
      
                  <!-- Modal content -->
                  <div class="modal-content">
                      <span class="close">&times;</span>
                      <h2>Sewa Kamar Kost 46A</h2> <br>
                      
                      <label for="kamar">Pilih Kamar:</label> <br>
                      <select name="kamar" id="kamar">
                          <option value="101">Kamar 101</option>
                          <option value="102">Kamar 102</option>
                          <option value="103">Kamar 103</option>
                          <option value="104">Kamar 104</option>
                      </select>
                      <br>
                      <p>Fasilitas Tambahan:</p>
                      <label class="checkbox-inline">
                          <input type="checkbox" value=""> TV
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" value=""> Kulkas Mini                  
                      </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" value=""> AC
                        </label>
                        <br>
                        <label for="lamaSewa">Pilih Lama Sewa:</label> <br>
                        <select name="lamaSewa" id="lamaSewa">
                            <option value="1b">1 Bulan</option>
                            <option value="3b">3 Bulan</option>
                            <option value="6b">6 Bulan</option>
                            <option value="12b">12 Bulan</option>
                        </select> <br> <br>
      
                        <button type="submit" style="background-color: rgb(0, 0, 46); color: white; padding: 10px;">Sewa Sekarang</button>
                  </div>
                  
              </div>
      
              <script>
                  // Get the modal
                  var modal = document.getElementById("myModal");
                  
                  // Get the button that opens the modal
                  var btn = document.getElementById("btnFormSewa");
                  
                  // Get the <span> element that closes the modal
                  var span = document.getElementsByClassName("close")[0];
                  
                  // When the user clicks the button, open the modal 
                  btn.onclick = function() {
                    modal.style.display = "block";
                  }
                  
                  // When the user clicks on <span> (x), close the modal
                  span.onclick = function() {
                    modal.style.display = "none";
                  }
                  
                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal.style.display = "none";
                    }
                  }
                  </script>

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