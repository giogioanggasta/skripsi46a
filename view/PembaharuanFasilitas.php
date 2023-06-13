<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';
$idTransaksi = base64_decode($_GET['aWRUcmFuc2Frc2k']);
$detailTransaksi = $homeM->detailTransaksiRef($idTransaksi);

$idTransaksi = base64_decode($_GET['aWRUcmFuc2Frc2k']);
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

$tambahSatu = 0;
if ($detailTransaksi->awalSewa > date('Y-m-d')) {

  $dateNow = $detailTransaksi->awalSewa;
  $tambahSatu = 0;
} else {
  $dateNow =  date('Y-m-d');
  $tambahSatu = 0;
}

$tanggal1 = $dateNow;
$tanggal2 = $detailTransaksi->akhirSewa;

$date1 = new DateTime($tanggal1);
$date2 = new DateTime($tanggal2);

$interval = $date1->diff($date2);
$selisih_bulan = ($interval->y * 12) + $interval->m + ($tambahSatu);

if ($detailTransaksi->lamaSewa == 1) {
  flash('pesanan_alert', 'Maaf, transaksi anda tidak dapat melakukan pengembalian maupun penambahan', 'red');

?>
  <script>
    window.location.href = "Pesanan.php";
  </script>
<?php
  exit;
}

?>


<div class="container">
  <div class="row">
    <div class="col-12">

      <h3>Silahkan Melakukan Perubahan Fasilitas</h3>
      <?php
      if (isset($_SESSION['pesanan_alert']) && !isset($_POST['btnSavePembayaran']) || isset($_SESSION['pesanan_alert']) && !isset($_POST['btnUpdateFasilitas'])) {
        echo $_SESSION['pesanan_alert'];
      }
      if (count($_POST) == 0) {
        unset($_SESSION['pesanan_alert']);
      }

      ?>
      <div class="form-group">
        <p>Tipe Kamar : <?= $detailTransaksi->namaTipeKamar ?></p>
        <p>Nomor Kamar : <?= $detailTransaksi->nomorKamar ?></p>
        <p>Fasilitas Sekarang : <?= $detailTransaksi->pilihanDetailFasilitas ?></p>
        <p>Lama Sewa Anda : <?= $detailTransaksi->awalSewa ?> sampai <?= $detailTransaksi->akhirSewa ?> (<?= $detailTransaksi->lamaSewa ?> Bulan)</p>
        <p>Sisa Lama Sewa Anda Sekarang : <?= $selisih_bulan ?> bulan</p>
        <hr>
        <p>Total Terakhir Yang Dibayarkan : <?= formatRupiah($detailTransaksi->totalPembayaran) ?></p>
        <p>Pembayaran Perbulan : <?= formatRupiah($detailTransaksi->totalPembayaran / $detailTransaksi->lamaSewa) ?></p>
        <p>Hak pembayaran yang dapat diubah : <?= formatRupiah(($detailTransaksi->totalPembayaran / $detailTransaksi->lamaSewa) * $selisih_bulan)  ?></p>

        <script>
          // Hak pembayaran yang dapat diubah
          var globalTotalPengembalian = 0;
          var globalTotalPenambahan = 0;
        </script>

        <?php
        // echo "<pre>";
        // var_dump($detailTransaksi);

        ?>
      </div>
      <div class="form-group">

        <label for="">Silahkan Pilih Jenis Pengajuan Fasilitas</label>
        <select name="type" class="form-control w-50" onchange="jenisPengajuan(this.value)">
          <option value="" selected hidden>Pilih Jenis Pengajuan</option>
          <option value="Pengurangan Fasilitas">Pengurangan Fasilitas</option>
          <option value="Penambahan Fasilitas">Penambahan Fasilitas</option>

        </select>
        <script>
          // $('#pengurangan').hide()
          // $('#penambahan').hide()

          function jenisPengajuan(jenis) {
            if (jenis == 'Pengurangan Fasilitas') {
              $('#pengurangan').show()
              $('#penambahan').hide()
            } else if (jenis == 'Penambahan Fasilitas') {
              $('#pengurangan').hide()
              $('#penambahan').show()

            }

          }


          function KalkulasiPengurangan(totalKurang) {
            globalTotalPengembalian = globalTotalPengembalian + parseInt(totalKurang);
            $('#totalPengembalian').html(formatRupiah(parseInt(globalTotalPengembalian)))
            $('#totalPengembalianValue').val((parseInt(globalTotalPengembalian)))
          }


          function KalkulasiPenambahan(totalTambah) {
            globalTotalPenambahan = globalTotalPenambahan + parseInt(totalTambah);
            $('#totalPenambahan').html(formatRupiah(parseInt(globalTotalPenambahan)))
            $('#totalPenambahanValue').val((parseInt(globalTotalPenambahan)))
          }
        </script>
      </div>
      <div style="display: none;" class="form-group" id="pengurangan">
        <form method="post">
          <input type="hidden" name="idTransaksi" value="<?= $idTransaksi ?>">

          <input type="hidden" name="totalPembayaranUtuh" value="<?= ($detailTransaksi->totalPembayaran) ?>">
          <h5 class="text-dark">Silahkan Pilih Fasilitas yang dilepas</h5>
          <?php

          $fasiltasNow = explode(',', $detailTransaksi->pilihanDetailFasilitas);
          $id = 0;
          if (!$detailTransaksi->pilihanDetailFasilitas) {
            echo "Tidak ada Fasilitas yang dapat dikurangi!";
          } else {

            foreach ($fasiltasNow as $v) {
              $id++;
          ?>
              <input type="checkbox" id="pilihPenguranganFasilitas<?= $id ?>" onclick="ubahPengembalian<?= $id ?>(this.value)" value="<?= $v ?>|<?= $homeM->searchFasilitas($v)->hargaFasilitas * $selisih_bulan ?>" checked name="fasilitas[]"><?= $v ?>
              <br>
              <script>
                function ubahPengembalian<?= $id ?>(datas) {
                  var harga = datas.split("|")[1];
                  var kondisi = document.getElementById('pilihPenguranganFasilitas<?= $id ?>').checked;
                  console.log(kondisi)
                  if (kondisi == true) {
                    KalkulasiPengurangan(-harga);

                  } else {
                    KalkulasiPengurangan(harga);

                  }
                }
              </script>
          <?php
            }
          }
          // var_dump($fasiltasNow);
          ?>
          <!-- <input type="text"> -->

          <div>
            <h4 class="text-dark mt-3">KalkulasiPengurangan Hak Pengembalian</h4>
            <p>Jumlah Bulan yang dikembalikan : <?= $selisih_bulan ?></p>
            <p>Total Pengembalian : <span id="totalPengembalian">Rp. 0</span></p>
            <input type="hidden" name="totalPengembalianValue" id="totalPengembalianValue">

          </div>
          <?php
          if ($detailTransaksi->pilihanDetailFasilitas) {
          ?>
            <button type="submit" class="btn btn-danger" name="BtnPenguranganFasilitas">Ajukan Pengurangan Fasilitas</button>
          <?php
          }
          ?>


        </form>
      </div>
      <div style="display: none;" class="form-group" id="penambahan">

        <h5 class="text-dark"> Silahkan Pilih Fasilitas yang ditambah </h5>
        <form method="post">
          <input type="hidden" name="idTransaksi" value="<?= $idTransaksi ?>">
          <input type="hidden" name="totalPembayaranUtuh" value="<?= ($detailTransaksi->totalPembayaran) ?>">
          <?php
          $idx = 0;



          foreach ($homeM->showFasilitasPenambahan($detailTransaksi->pilihanDetailFasilitas) as $x => $v) {
            $idx++;
          ?>
            <input type="checkbox" id="pilihPenambahanFasilitas<?= $idx ?>" onclick="ubahPenambahan<?= $idx ?>(this.value)" value="<?= $v->namaFasilitas ?>|<?= $v->hargaFasilitas * $selisih_bulan ?>" name="fasilitas[]"><?= $v->namaFasilitas ?>
            <br>
            <script>
              function ubahPenambahan<?= $idx ?>(datas) {
                var harga = datas.split("|")[1];
                var kondisi = document.getElementById('pilihPenambahanFasilitas<?= $idx ?>').checked;
                console.log(kondisi)
                if (kondisi == true) {
                  KalkulasiPenambahan(harga);

                } else {
                  KalkulasiPenambahan(-harga);

                }
              }
            </script>
          <?php
          }
          ?>

          <div>
            <h4 class="text-dark mt-3">Kalkulasi Penambahan Fasilitas</h4>
            <p>Jumlah Bulan yang dikembalikan : <?= $selisih_bulan ?></p>
            <p>Total Penambahan : <span id="totalPenambahan">Rp. 0</span></p>
            <input type="hidden" name="totalPenambahanValue" id="totalPenambahanValue">
            <input type="hidden" name="fasilitasNow" value="<?= $detailTransaksi->pilihanDetailFasilitas ?>">


          </div>

          <button type="submit" class="btn btn-success" name="BtnPenambahanFasilitas">Ajukan Penambahan Fasilitas</button>
        </form>


      </div>
    </div>
  </div>



</div>

<?php

include 'tmpuser/footer.php';
?>