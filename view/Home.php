<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';
?>

<div class="header">
  <a href="Kamar-logged.php" class="btn btn-info" role="button" style="position:absolute; top: 65%; left: 7.5%; ">Pesan Kamar</a>
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
              <a href="detail_kamar.html"><button type="button" class="btn">
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
    <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=C3%20car%20care%20center%20medan&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
      <style>
        .mapouter {
          position: relative;
          text-align: right;
          height: 500px;
          width: 600px;
        }
      </style><a href="https://www.embedgooglemap.net">google maps html widget</a>
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