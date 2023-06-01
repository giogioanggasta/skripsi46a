<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';

if (!isset($_SESSION['session_login'])) {
?>
  <script>
    alert('Tidak dapat mengakses menu, silahkan login terlebih dahulu');
    window.location.href = "Home.php";
  </script>
<?php
  // header('Location:Login.php');
  exit;
}
?>


<div class="container">
  <a class="w3-display-middle" style="color:black;float: center; margin-top: -10%; text-decoration: none;">Pesanan Anda</a>
  <?php
  if (isset($_SESSION['pesanan_alert']) && !isset($_POST['btnSavePembayaran']) || isset($_SESSION['pesanan_alert']) && !isset($_POST['btnUpdateFasilitas'])) {
    echo $_SESSION['pesanan_alert'];
  }
  if (count($_POST) == 0) {
    unset($_SESSION['pesanan_alert']);
  }

  ?>
  <div class="row">



    <?php
    $pesanan = $userM->showPesanan();

    foreach ($pesanan as $k => $d) {


    ?>
      <div class="col-4">

        <div class="card mb-3" style="max-width: 540px;">


          <img class="img-fluid h-100" src="../images/thumbnail/<?= $d->thumbnailKamar ?>" alt="...">


          <div class="card-body">
            <h4 class="text-center card-title text-dark">Detail Sewa</h4>
            <h6 class="text-center"><?= $d->namaTipeKamar; ?></h6>
            <p class="card-text">
            <p style="margin-bottom: 8px;color: #0a2724;">ID transaksi: <?= $d->idTransaksi . "<br>"; ?> </p>
            <p style="margin-bottom: 8px;color: #0a2724;">Tanggal pemesanan: <?php $final_tanggal = date_create($d->tanggalWaktuTransaksi);
                                                                              echo date_format($final_tanggal, "Y-m-d") . "<br>"; ?> </p>
            <p style="margin-bottom: 8px;color: #0a2724;">Jam pemesanan: <?php $final_waktu = date_create($d->tanggalWaktuTransaksi);
                                                                          echo date_format($final_waktu, "H:i") . "<br>"; ?> </p>



            <p style="margin-bottom: 8px;color: #0a2724;">Nomor kamar: <?= $d->nomorKamar . "<br>"; ?> </p>
            <p style="margin-bottom: 8px;color: #0a2724;">Lama sewa: <?= $d->lamaSewa . "<br>"; ?></p>
            <p style="margin-bottom: 8px;color: #0a2724;">Tanggal Lama Sewa: <br><?php echo $d->awalSewa . " sampai " . $d->akhirSewa . "<br>"; ?> </p>
            <p style="margin-bottom: 8px;color: #0a2724;">Total Harga: <?= formatRupiah($d->totalPembayaran) . "<br>"; ?></p>
            <p style="margin-bottom: 8px;color: #0a2724;"><b>Status Pemesanan:</b> <?= $d->status . "<br>"; ?></p>

            </p>
            <?php
            if ($d->status == 'Menunggu Pembayaran') {
            ?>
              <div class="card-bottom bg-secondary p-2 text-white">

                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Upload Bukti Pembayaran</label>
                    <input type="hidden" name="idTransaksi" value="<?= $d->idTransaksi ?>">
                    <input class="form-control" required type="file" accept="image/jpeg,image/png" name="buktiPembayaran">
                    <div class="form-text">Bayar ke nomor rekening : Mandiri 106-00-1178850-5 a/n C3 Car Care Center. <br>
                      Bukti Pembayaran akan di proses maksimal 1x24 jam setelah upload. Anda akan menerima email jika pembayaran sudah diterima.<br></div>
                  </div>
                  <button type="submit" class="w3-button w3-blue btn btn-primary" name="btnSavePembayaran">Upload Pembayaran</button>
                </form>
              </div>

            <?php
            } else if ($d->status == 'Diterima') {
            ?>
              <p>Bukti Pembayaran :&nbsp;<a style="font-size:15px" href="../images/bukti-bayar/<?= $d->buktiPembayaran ?>" class="text-danger" target="_blank">Lihat</a></p>

              <div class="card-bottom bg-success p-2 text-white">
                <h4>Transaksi anda telah di <?= $d->status ?> oleh Admin terimakasih</h4>
              </div>

              <a href="detail_kamar.php?<?= base64_encode('tipeKamar') ?>=<?= base64_encode($d->idTipeKamar) ?>" class="btn btn-secondary mt-2 btn-block">Perpanjangan Sewa Kamar</a>
            <?php
            } else if ($d->status == 'Ditolak') {
            ?>
              <p>Bukti Pembayaran :&nbsp;<a style="font-size:15px" href="../images/bukti-bayar/<?= $d->buktiPembayaran ?>" class="text-danger" target="_blank">Lihat</a></p>

              <div class="card-bottom bg-danger p-2 text-white">
                <h4>Mohon Maaf, Transaksi anda telah di <?= $d->status ?> oleh Admin.<br>Catatan : <br><?= $d->reason ?></h4>
              </div>
              <a href="Kamar.php" class="btn btn-secondary mt-2 btn-block">Pilih Kamar Lainnya</a>
            <?php
            } else if ($d->status == 'Proses') {
            ?>
              <p>Bukti Pembayaran :&nbsp;<a style="font-size:15px" href="../images/bukti-bayar/<?= $d->buktiPembayaran ?>" class="text-danger" target="_blank">Lihat</a></p>

              <div class="card-bottom bg-primary p-2 text-white">
                <h4>Transaksi sedang di <?= $d->status ?> oleh Admin Mohon sabar menunggu</h4>
              </div>
            <?php
            }
            ?>

          </div>
        </div>



      </div>




    <?php
    }

    ?>
  </div>
</div>