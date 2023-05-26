<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';
?>

<div class="header">
  <a href="Kamar.php" class="btn btn-info" role="button" style="position:absolute; top: 65%; left: 7.5%; ">Pesan Kamar</a>
  <img src="../images/header.jpg" style="width:100%; float:center; margin-top: -3.4%">
  <div class="teks" style="color:white; font-size: 500%; margin-top: 5%">Professional service is our specialty</div>

</div>


<br><br><br>
<a style="color:black; float: center; margin-left: 43%; text-decoration: none;"><b>Pilihan Kamar</b></a>

<div class="container">
  <div class="row">

    <?php
    foreach ($homeM->showKamar() as $k => $v) {

    ?>
      <div class="col-4 col-md-6 col-lg-4 mt-2">
        <div class="card" style="border-width:none">
          <img class="img-fluid" style="width:726px; height:409px;" src="../images/thumbnail/<?= $v->thumbnailKamar ?>"><br>
          <div class="card-body">
            <p class="card-title"><?= $v->namaTipeKamar ?></p>
            <!-- <p class="card-text">keterangan kamar</p> -->
            <p class="card-text"><?= formatRupiah($v->harga) ?> / bulan</p>
            <div class="purchase-info">
              <a href="detail_kamar.php?<?= base64_encode('tipeKamar') ?>=<?= base64_encode($v->idTipeKamar) ?>"><button type="button" class="btn">
                  Pesan Kamar Disini <i class="fas fa-money-bill"></i></button>
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php

    }
    ?>




  </div>
</div>
</div>


</div>

<br><br>
<h3 style="margin-left: 11%">Lokasi terdekat</h3>
<div class="container">
  <div class="card-columns">
    <div class="card bg-light">
      <div class="card-body text-center">
        <img src="../images/unpar.png" style="width:30%; float:left"><br>
        <p class="card-text">Universitas Katolik</p>
        <p class="card-text">Parahyangan</p>
      </div>
    </div>

    <div class="card bg-light">
      <div class="card-body text-center">
        <img src="../images/itb.png" style="width:30%; float:left"><br>
        <p class="card-text">Institut Teknologi</p>
        <p class="card-text">Bandung</p>
      </div>
    </div>

    <div class="card bg-light">
      <div class="card-body text-center">
        <img src="../images/unpad.png" style="width:30%; float:left"><br>
        <p class="card-text">Universitas</p>
        <p class="card-text">Padjajaran</p>
      </div>
    </div>

    <div class="card bg-light">
      <div class="card-body text-center">
        <img src="../images/unikom.png" style="width:30%; float:left"><br>
        <p class="card-text">Universitas Komputer</p>
        <p class="card-text">Indonesia</p>
      </div>
    </div>

    <div class="card bg-light">
      <div class="card-body text-center">
        <img src="../images/maranatha.png" style="width:30%; float:left"><br>
        <p class="card-text">Universitas Kristen</p>
        <p class="card-text">Maranatha</p>
      </div>
    </div>
  </div>



</div>



<div class="teksmaps" style="color:black; font-size: 250%; margin-left:10%; margin-top: 5%; padding-bottom:5%">Alamat Kos 46A pada Google Maps</div>
<div align="center">
  <div class="mapouter">
    <div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.124045254148!2d107.60374777558488!3d-6.875738093123076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6ee367d53ad%3A0x1a3ab4a64b4f1afe!2sJl.%20Bukit%20Jarian%20No.46A%2C%20Hegarmanah%2C%20Kec.%20Cidadap%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040141!5e0!3m2!1sen!2sid!4v1685099586388!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></a><br>
      <style>
        .mapouter {
          position: relative;
          text-align: right;
          height: 500px;
          width: 600px;
        }
      <style>
        .gmap_canvas {
          overflow: hidden;
          background: none !important;
          height: 500px;
          width: 600px;
        }
      </style>
    </div>
  </div>
  <style>
    .gmap_canvas {
      overflow: hidden;
      background: none !important;
      height: 500px;
      width: 600px;
    }
  </style>
</div>
</div>
</div>


<?php
include 'tmpuser/footer.php';
?>