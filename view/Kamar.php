<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Daftar Kamar</h3>
    </div>

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




<?php
include 'tmpuser/footer.php';
?>