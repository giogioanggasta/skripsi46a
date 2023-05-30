<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
include('../model/transaksiModel.php');
$title = "Kelola Transaksi";
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
// include('../model/adminModel.php');
?>
.
<a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Transaksi</a>
<?php
if (isset($_SESSION['insert_alert']) && !isset($_GET['actTransaksi']) || isset($_SESSION['insert_alert']) && !isset($_POST['btnUpdateFasilitas'])) {
  echo $_SESSION['insert_alert'];
}
if (count($_POST) == 0) {
  unset($_SESSION['insert_alert']);
}

?>
<div class="container">
  <div class="row">
    <div class="col-12">


      <!-- The Modal -->
      <div class="modal fade" id="modalUbah">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Ubah Fasilitas</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

          </div>
        </div>
      </div>




      <div class="col-12 mt-4">
        <table class=" display" id="Table_ID" style="font-family: texts; font-size: 15px;">

          <thead>

            <tr>
              <th>ID Transaksi</th>
              <th>Nama User</th>
              <th>Detail Kamar</th>
              <th>Bukti Pembayaran</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>

            <?php


            foreach ($transaksiM->showTransaksi(array('Proses')) as $s => $x) {
            ?>

              <!-- echo $x->idTipeKamar; -->
              <tr>
                <td><?= $x->idTransaksi ?></td>
                <td><?= $x->namaUser ?></td>
                <td>
                  Tipe Kamar : <?= $x->namaTipeKamar ?> - Nomor Kamar <?= $x->nomorKamar ?><br>
                  Fasilitas Kamar : <?= $x->pilihanDetailFasilitas ?><br>
                  Tgl Pemesanan : <?= formatTgl($x->tanggalWaktuTransaksi) ?> <?= formatWaktu($x->tanggalWaktuTransaksi) ?><br>
                  Lama Sewa : <?= $x->lamaSewa ?> (<?= formatTgl($x->awalSewa) ?> sampai <?= formatTgl($x->akhirSewa) ?>)<br>
                </td>
                <td><a style="font-size:15px" href="../images/bukti-bayar/<?= $x->buktiPembayaran ?>" class="text-danger" target="_blank">Lihat</a></td>
                <td><a href="#" onclick="terimaTransaksi('<?= $x->idTransaksi ?>')" data-bs-toggle="modal" data-bs-target="#modalTambah<?= $x->idFasilitas ?>" class="btn btn-primary">Terima</a>
                  <a onclick="tolakTransaksi('<?= $x->idTransaksi ?>')" href="#" class="btn btn-danger">Tolak</a>
                </td>
              </tr>


            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <script>
        function terimaTransaksi(idTransaksi) {

          if (confirm("Yakin menerima transaksi ini?")) {
            window.location.href = "?actTransaksi=terimaTransaksi&idTransaksi=" + idTransaksi;
          }
        }

        function tolakTransaksi(idTransaksi) {

          let reason = prompt("Isi alasan penolakan transaksi", "");
          if (reason == null || reason == "") {
            alert("wajib mengisi alasan penolakan");
          } else {
            window.location.href = "?actTransaksi=tolakTransaksi&idTransaksi=" + idTransaksi + "&reason=" + reason;
          }
        }
      </script>



    </div>
  </div>
</div>
<?php include('tmpadmin/footer.php') ?>