<?php
include('../helper/flash_session.php');
include('../model/homeModel.php');
$tipeKamar = base64_decode($_GET['dGlwZUthbWFy']);
$type = base64_decode($_GET['dHlwZQ']);
$idTransaksi = base64_decode($_GET['aWRUcmFuc2Frc2k']);

// echo $type;
// echo '<br>';
// echo $tipeKamar;
// echo '<br>';
// echo $idTransaksi;
// exit;
$result = $homeM->searchTipeKamar($tipeKamar);
if (!$result) {
  header('Location: 404.php');
  exit;
}

$detailTransaksi = $homeM->detailTransaksi($idTransaksi);
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
    var globalpilihanDiskon = 0;
    var globalpilihFasilitas = [];
    var globalpilihDetailFasilitas = [];

    function totalKeseluruhan() {

      var totalFasilitas = 0;
      globalpilihFasilitas.forEach((item, index) => {
        totalFasilitas = totalFasilitas + parseInt(item)
      })
      console.log(totalFasilitas)

      var total = (parseInt(globalhargaTipeKamar) + totalFasilitas) * parseInt(globalpilihanSewa)

      var totalDiskon = total - globalpilihanDiskon;

      $('#totalHargaTransaksi').val(totalDiskon)
      $('#pilihanDetailFasilitas').val(globalpilihDetailFasilitas)

      $('#totalHargaTransaksiDiskon').val(globalpilihanDiskon)
      $('#totalHargaTransaksiNormal').val(total)

      $('#hargaDiskon').text(formatRupiah(globalpilihanDiskon))
      $('#totalHargaNormal').text(formatRupiah(total))
      $('#totalHarga').text(formatRupiah(totalDiskon))
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
  <br>
  <h1 style="margin-left:20px;">Silahkan Melakukan Transaksi Perpanjangan</h1>
  <?php
  $nomorKamar = explode(',', $result->nomorKamar);
  $fotoKamar = explode(',', $result->foto);
  ?>
  <div class="card-wrapper">
    <div class="card" style="margin-top: 1.62%">
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
            <?php

            if (!isset($_SESSION['session_login'])) {
            ?>
              <button type="button" class="btn" onclick="klikLogin()">
                Ajukan Perpanjangan <i class=" fas fa-money-bill"></i>
              </button>
              <script>
                function klikLogin() {

                  alert('Tidak dapat mengakses menu, silahkan login terlebih dahulu');
                }
              </script>
            <?php
              // header('Location:Login.php');

            } else {
            ?>
              <button type="button" class="btn" data-toggle="modal" data-target="#myModal" id="btnFormSewa">
                Ajukan Perpanjangan <i class="fas fa-money-bill"></i>
              </button>
            <?php
            }
            ?>

          </div>

          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">


                <span class="close">&times;</span>
              </div>
              <div class="modal-body">
                <table class="">
                  <tr>
                    <td>
                      <h2>Pengajuan Perpanjangan Kamar <?= $result->namaTipeKamar ?></h2> <br>
                      <label for="kamar">Tanggal Awal Sewa:</label> <br>

                      <?php
                      if ($type == 'perpanjangan') {
                      ?>

                        Masa Aktif Sewa anda saat ini (<?= $detailTransaksi->awalSewa ?> sampai <?= $detailTransaksi->akhirSewa ?>) <br>
                        <input type="date" min="<?= tambah1Hari($detailTransaksi->akhirSewa) ?>" value="<?= tambah1Hari($detailTransaksi->akhirSewa) ?>" id="cekTanggal" onchange="pilihTanggalSewa()" name="awalSewa">

                      <?php
                      } else {
                      ?>
                        <!-- <input type="date" min="<?= tambah1Hari($detailTransaksi->akhirSewa) ?>" value="<?= tambah1Hari($detailTransaksi->akhirSewa) ?>" id="cekTanggal" onchange="pilihTanggalSewa()" name="awalSewa"> -->

                      <?php
                      }
                      ?>

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
                      Masa Aktif Sewa saat ini anda di kamar nomor <?= $detailTransaksi->nomorKamar ?>
                      <br>
                      <label for="lamaSewa">Pilih Lama Sewa:</label> <br>
                      <select required name="lamaSewa" onchange="changeSewa(this.value)" id="lamaSewa">
                        <option value="" selected hidden>Pilih Lama Sewa</option>
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
                      Masa Aktif Sewa saat ini Fasilitas sebaga berikut: <?= $detailTransaksi->pilihanDetailFasilitas ?>
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
                      <input type="hidden" name="totalHargaTransaksiNormal" id="totalHargaTransaksiNormal">
                      <input type="hidden" name="idTransaksiRefrensi" value="<?= $idTransaksi ?>">
                      <input type="hidden" name="totalHargaTransaksiDiskon" id="totalHargaTransaksiDiskon">
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
                      <br>
                      <h3>Diskon</h3>
                      <input type="text" oninput="kalkukasiUlangDiskon()" onchange="kalkukasiUlangDiskon()" name="namaDiskon" id="namaDiskon" class="form-control w-25">
                      <br>
                      <span style="color:red;" id="alert_diskon"></span>
                      <br>
                      <label for="harga">Potongan Diskon: <span id="hargaDiskon"><?= formatRupiah(0) ?></span></label> <br>
                      <label for="harga">Harga Normal: <span id="totalHargaNormal"><?= formatRupiah($result->hargaTipeKamar) ?></span></label> <br>
                      <label for="harga">Total Harga: <span id="totalHarga"><?= formatRupiah($result->hargaTipeKamar) ?></span></label> <br><br>

                      <button type="submit" name="saveDetailPesananPerpanjangan" style="background-color: rgb(0, 0, 46); color: white; padding: 10px;">Ajukan Perpanjangan Sekarang</button>

                    </td>
                    <td>
                      <style>
                        div.gfg {
                          margin: 5px;
                          padding: 5px;
                          width: 450px;
                          height: 600px;
                          overflow: auto;
                          text-align: justify;
                        }
                      </style>
                      <h3>
                        <center>Ambil Promo</center>
                      </h3>
                      <div class="gfg">
                        <?php
                        foreach ($homeM->showDiskonKamar() as $k => $v) {
                        ?>
                          <table class="table table-primary" style="width:100%;    overflow: scroll;">
                            <tr>
                              <td colspan="3">
                                <img style="width:400px !important;" src="../images/thumbnail-diskon/<?= $v->gambarDiskon ?>" alt="">
                                <h3><?= $v->namaDiskon ?></h3>
                                <p>
                                  <?= $v->descDiskon ?>
                                </p>
                                <button type="button" onclick="pakaiDiskon('<?= $v->namaDiskon ?>','<?= $v->potonganHarga ?>')">Pakai Promo</button>
                                <br>
                                <br>
                              </td>
                            </tr>
                          </table>

                          <hr>



                        <?php
                        }
                        ?>
                      </div>

                      <script>
                        function kalkukasiUlangDiskon() {
                          var varDiskon = document.getElementById('namaDiskon').value
                          if (varDiskon == '') {
                            $('#alert_diskon').hide()

                            globalpilihanDiskon = 0;
                          } else {
                            var result = getJSON('../model/ajax_group.php', {
                              act: 'cekListDiskon',
                              namaDiskon: varDiskon
                            })
                            if (result.status) {

                              globalpilihanDiskon = result.dataResult.potonganHarga;
                              $('#alert_diskon').hide()
                            } else {
                              globalpilihanDiskon = 0;
                              document.getElementById('alert_diskon').innerHTML = 'Kode Diskon tidak valid';
                              // $('#alert_diskon').val('Kode Diskon tidak valid')
                              $('#alert_diskon').show()
                            }
                          }
                          totalKeseluruhan()
                        }

                        function pakaiDiskon(namaDiskon, potonganHarga) {
                          document.getElementById('namaDiskon').value = namaDiskon;
                          kalkukasiUlangDiskon()
                          totalKeseluruhan()
                        }
                      </script>


                    </td>
                  </tr>
                </table>

              </div>
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



        </div>

      </form>

    </div>
  </div>


  <script src="script.js?time=<?= time() ?>"></script>
</body>

</html>