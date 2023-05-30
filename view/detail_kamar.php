<?php
include('../helper/flash_session.php');
include('../model/homeModel.php');
// var_dump($_SESSION);
// tipeKamar
$tipeKamar = base64_decode($_GET['dGlwZUthbWFy']);
$result = $homeM->searchTipeKamar($tipeKamar);
if (!$result) {
  header('Location: 404.php');
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Detail Kamar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
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
  <script>
    var globalhargaTipeKamar = <?= $result->hargaTipeKamar ?>;
    var globalpilihanSewa = 1;
    var globalpilihFasilitas = [];
    var globalpilihDetailFasilitas = [];



    function totalKeseluruhan() {

      var totalFasilitas = 0;
      globalpilihFasilitas.forEach((item, index) => {
        totalFasilitas = totalFasilitas + parseInt(item)
      })
      console.log(totalFasilitas)
      var total = (parseInt(globalhargaTipeKamar) + totalFasilitas) * parseInt(globalpilihanSewa)

      $('#totalHargaTransaksi').val(total)
      $('#pilihanDetailFasilitas').val(globalpilihDetailFasilitas)
      $('#totalHarga').text(formatRupiah(total))
    }

    // document.getElementById('totalHarga').innerHTML = hargaTipeKamar
  </script>
  <div class="w3-bar w3-white w3-border " id="menu" style="background-color: #11355b">
    <a href="Home.php" class="w3-bar-item"><img src="../images/logo46a.png" style="width:150px"></a>

    <?php
    if (isset($_SESSION['session_login'])) {
    ?>
      <a href="#" onclick="logOut()" class="w3-bar-item" style="float: right; margin-right: 10.5%; margin-top:-6.4%; text-decoration: none; color: white"><img src="../images/logout.png" style="width:30px"></a>

      <script>
        function logOut() {

          if (confirm('Yakin ingin log out?')) {
            window.location.href = "Home.php?logOut=true";
          }

        }
      </script>

      <a href="Profile.php" class="w3-bar-item" style="float: right; margin-right: 15.5%; margin-top:-6.4%; text-decoration: none; color: white">
        Hai, <?= ($_SESSION['session_login']->namaUser) ?>
      </a>

    <?php
    } else {
    ?>
      <a href="Login.php" class="w3-bar-item" style="float: right; margin-right: 15.5%; margin-top:-6.4%; text-decoration: none; color: white">Login</a>
    <?php
    }
    ?>

    <a href="Fasilitas.php" class="w3-bar-item" style="float: right; margin-top:-6.4%; margin-right: 30.1%; text-decoration: none; color: white;">Fasilitas</a>
    <a href="Kamar.php" class="w3-bar-item" style="float: right; margin-top:-6.4%; margin-right: 40.9%; text-decoration: none; color: white; ">Kamar</a>
    <a href="Pesanan.php" class="w3-bar-item" style="float: right; margin-top:-6.4%; margin-right: 50.9%; text-decoration: none; color: white; ">Pesanan</a>
  </div>

  <?php
  $nomorKamar = explode(',', $result->nomorKamar);
  $fotoKamar = explode(',', $result->foto);
  ?>
  <div class="card-wrapper">
    <div class="card" style="margin-top: 8.62%">
      <!-- card left -->
      <div class="product-imgs">
        <div class="img-display">
          <div class="img-showcase">
            <?php
            foreach ($fotoKamar as $f) {
            ?>
              <img src="../images/img-kamar/<?= $f ?>" alt="shoe image">
            <?php
            }
            ?>
            <!-- <img src="../images/kamar2.jpg" alt="shoe image">
            <img src="../images/kamar3.jpg" alt="shoe image">
            <img src="../images/kamar4.jpg" alt="shoe image"> -->
          </div>
        </div>
        <div class="img-select">

          <?php
          $i = 1;
          if (count($fotoKamar) != 1) {

            foreach ($fotoKamar as $f) {
          ?>
              <div class="img-item">
                <a href="#" data-id="<?= $i ?>">
                  <img src="../images/img-kamar/<?= $f ?>" alt="shoe image">
                </a>
              </div>
          <?php
              $i++;
            }
          }
          ?>


        </div>
      </div>
      <!-- card right -->
      <form method="post">

        <div class="product-content">
          <h2 class="product-title"><?= $result->namaTipeKamar ?></h2>

          <div class="product-price">
            <!-- <p class="last-price">Harga Normal: <span>Rp.2.500.000</span></p> -->
            <p class="new-price">Harga Normal: <span><?= formatRupiah($result->hargaTipeKamar) ?></span></p>
          </div>

          <div class="product-detail">
            <h2>Tentang Kamar <?= $result->namaTipeKamar ?></h2>
            <p class="">
              <?= $result->descTipeKamar ?>
            </p>
          </div>

          <div class="purchase-info">
            <button type="button" class="btn" data-toggle="modal" data-target="#myModal" id="btnFormSewa">
              Pesan Kamar Disini <i class="fas fa-money-bill"></i>
            </button>
          </div>

          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <span class="close">&times;</span>
              <h2>Sewa Kamar <?= $result->namaTipeKamar ?></h2> <br>
              <label for="kamar">Tanggal Awal Sewa:</label> <br>
              <input type="date" min="<?php echo date("Y-m-d") ?>" id="cekTanggal" onchange="pilihTanggalSewa()" name="awalSewa">

              <script>
                function pilihTanggalSewa() {

                  // $('#pilihKamar').hide()
                  cekKamar()
                }
                // $(document).ready(function() {

                //   $('#pilihKamar').hide()
                // });
              </script>
              <br>

              <label for="lamaSewa">Pilih Lama Sewa:</label> <br>
              <select required name="lamaSewa" onchange="changeSewa(this.value)" id="lamaSewa">
                <!-- <option value="">Pilih Lama Sewa</option> -->
                <option value="1">1 Bulan</option>
                <option value="3">3 Bulan</option>
                <option value="6">6 Bulan</option>
                <option value="12">12 Bulan</option>
              </select>
              <br>
              <!-- <button onclick="cekKamar()">Cek Ketersediaan Kamar</button> -->
              <script>
                function cekKamar() {
                  var tgl = document.getElementById('cekTanggal').value;
                  var lamaSewa = document.getElementById('lamaSewa').value;

                  var result = getJSON('../model/ajax_group.php', {
                    act: 'cekTanggalBooking',
                    tanggal: tgl,
                    idTipeKamar: '<?= $_GET['dGlwZUthbWFy'] ?>',
                    lamaSewa: lamaSewa
                  })

                  $('#selectKamar').html(result);
                  $('#pilihKamar').show();
                }
              </script>
              <br>
              <div id="pilihKamar">

                <label for=" kamar">Pilih Kamar:</label> <br>
                <div id="selectKamar"></div>

              </div>

              <br>
              <p>Fasilitas Tambahan:</p>
              <?php
              $dataFasi = $homeM->showFasilitas();
              foreach ($dataFasi as $f) {
              ?>
                <div class="form-group">
                  <label class="checkbox-inline">
                    <input type="checkbox" onclick="klikpilihFasilitas()" name="pilihFasilitas" value="<?= $f->idFasilitas ?>|<?= $f->hargaFasilitas ?>|<?= $f->namaFasilitas ?>"><?= $f->namaFasilitas ?>-<?= formatRupiah($f->hargaFasilitas) ?>
                  </label>&nbsp;&nbsp;
                </div>
              <?php
              }
              ?>

              <script>
                function klikpilihFasilitas() {
                  var checkboxes = document.getElementsByName("pilihFasilitas");
                  var selectedFasilitas = [];
                  var selectedDetailFasilitas = [];
                  for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                      selectedFasilitas.push(checkboxes[i].value.split("|")[1]);
                      selectedDetailFasilitas.push(checkboxes[i].value.split("|")[2]);
                    }
                  }
                  globalpilihDetailFasilitas = selectedDetailFasilitas
                  globalpilihFasilitas = selectedFasilitas
                  totalKeseluruhan()
                }
              </script>
              <br>
              <input type="hidden" name="pilihanDetailFasilitas" id="pilihanDetailFasilitas">
              <input type="hidden" name="totalHargaTransaksi" id="totalHargaTransaksi">
              <br> <br>
              <script>
                function changeSewa(pilihan) {
                  // $('#pilihKamar').hide()
                  cekKamar()
                  if (pilihan != '') {
                    globalpilihanSewa = pilihan
                    totalKeseluruhan()
                  }

                }
              </script>
              <label for="harga">Harga : <span id="totalHarga"><?= formatRupiah($result->hargaTipeKamar) ?></span></label> <br><br>

              <button type="submit" name="saveDetailPesanan" style="background-color: rgb(0, 0, 46); color: white; padding: 10px;">Sewa Sekarang</button>
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


          <div class="social-links">
            <p>Share At: </p>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>

      </form>

    </div>
  </div>


  <script src="script.js?time=<?= time() ?>"></script>
</body>

</html>