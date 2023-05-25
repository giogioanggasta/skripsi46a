<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Kelola Fasilitas";
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
// include('../model/adminModel.php');
?>
.
<a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Transaksi</a>
<?php
if (isset($_SESSION['insert_alert']) && !isset($_POST['btnInsertFasilitas']) || isset($_SESSION['insert_alert']) && !isset($_POST['btnUpdateFasilitas'])) {
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
              <th>ID Admin</th>
              <th>Bukti Pembayaran</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>

            <?php


            foreach ($kelolaM->showTransaksi() as $s => $x) {
            ?>

              <!-- echo $x->idTipeKamar; -->
              <tr>
                <td><?= $x->idTransaksi ?></td>
                <td><?= $x->namaAdmin ?></td>
                <td><img src="../images/foto-transaksi/<?= $x->fotoTransaksi ?>" class="w-25 img-fluid" alt=""></td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah<?= $x->idFasilitas ?>" class="btn btn-primary">Terima</a>
                  <a onclick="hapusFasilitas('<?= $x->idFasilitas ?>','<?= $x->namaFasilitas ?>')" href="#" class="btn btn-danger">Tolak</a>
                </td>
              </tr>

              <!-- The Modal -->
              <div class="modal fade" id="modalTambah<?= $x->idTransaksi ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Terima Transaksi <?= $x->idTransaksi ?></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="namaFasilitas">Nama Fasilitas</label>

                          <input type="text" required value="<?= $x->namaFasilitas ?>" class="form-control" name="namaFasilitas">
                        </div>
                        <div class="form-group">
                          <label for="namaFasilitas">Harga Fasilitas</label>

                          <input type="number" required value="<?= $x->hargaFasilitas ?>" class="form-control" name="hargaFasilitas">
                        </div>

                        <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                        <input type="hidden" name="idFasilitas" value="<?= $x->idFasilitas ?>">

                        <div class="form-group">
                          <label for="fasilitas">Upload Thumbnail</label>
                          <input type="file" class="form-control" name="fileFasilitas">

                        </div>
                        <div class="form-text fw-bold text-dark">*Jika tidak ingin mengubah gambar silahkan dikosongi</div>
                        <center>

                          <img src="../images/thumbnail-fasilitas/<?= $x->fotoFasilitas ?>" class=" img-fluid img-thumbnail " alt="">
                        </center>
                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                          <button class="btn btn-primary" type="submit" name="btnUpdateFasilitas" value="1"><i class="bi bi-check-square-fill"></i> Update</button>
                        </div>
                      </form>

                    </div>

                  </div>
                </div>
              </div>

            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <script>
        function tolakTransaksi(idTransaksi) {
          Swal.fire({
            title: '<p style="text-transform:lowercase !important;">yakin menghapus fasilitas (' + namaFasilitas + ') ?</p>',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Cancel',
            denyButtonText: `Hapus`,
            confirmButtonText: 'Batal',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isDenied) {
              window.location.href = "../model/kelolaModel.php?actFasilitas=hapusFasilitas&idFasilitas=" + idFasilitas;
            }
          })
        }
      </script>



    </div>
  </div>
</div>
<?php include('tmpadmin/footer.php') ?>