<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';
?>

<div class="container">


  <div class="row">
    <div class="col-12">
      <h3>Daftar Fasilitas</h3>
    </div>

    <?php
    foreach ($homeM->showFasilitas() as $k => $v) {

    ?>
      <div class="col-4 col-md-6 col-lg-4 mb-3">
        <div class="card" style="border-width:none">
          <img src="../images/thumbnail-fasilitas/<?= $v->fotoFasilitas ?>" style="width:100%"><br>
          <div class="card-body">
            <p class="card-title"><?= $v->namaFasilitas; ?></p>
            <p class="card-text"><?= formatRupiah($v->hargaFasilitas); ?> / bulan</p>
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