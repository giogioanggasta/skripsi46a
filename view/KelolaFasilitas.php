<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Kelola Fasilitas";
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
// include('../model/adminModel.php');
?>
.
<a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Fasilitas</a>
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

      <div class="col-12">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah" style=" background-color:steelblue">
          <i class="bi bi-plus-lg"></i> Tambah
        </button>

        <!-- The Modal -->
        <div class="modal fade" id="modalTambah">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Tambah Fasilitas</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="namaFasilitas">Nama Fasilitas</label>

                    <input type="text" class="form-control" required name="namaFasilitas">
                  </div>
                  <div class="form-group">
                    <label for="namaFasilitas">Harga Fasilitas</label>

                    <input type="text" required oninput="formatRupiahFungsi(this.value,'hargaFasilitasFormat','hargaFasilitas')" id="hargaFasilitasFormat" class="form-control">
                    <input type="hidden" required id="hargaFasilitas" name="hargaFasilitas">
                  </div>
                  <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">

                  <div class="form-group">
                    <label for="fotoFasilitas">Upload Thumbnail</label>
                    <input type="file" required class="form-control" name="fileFasilitas">
                  </div>

                  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button class="btn btn-primary" type="submit" name="btnInsertFasilitas" value="1"><i class="bi bi-check-square-fill"></i> Save</button>
                  </div>
                </form>

              </div>

            </div>
          </div>
        </div>

      </div>


      <div class="col-12 mt-4">
        <table class=" display" id="Table_ID" style="font-family: texts; font-size: 15px;">

          <thead>

            <tr>
              <th>ID Fasilitas</th>
              <th>Nama Fasilitas</th>
              <th>Harga Fasilitas</th>
              <th width="25%">Foto Fasilitas</th>
              <th>Dibuat oleh</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>

            <?php

            // echo "<br><pre>";
            // $data = array('nama' => 'gio', 'umur' => '25');
            // var_dump($data);
            // var_dump($kelolaM->showKamar());/
            foreach ($kelolaM->showFasilitas() as $s => $x) {
            ?>

              <!-- echo $x->idTipeKamar; -->
              <tr>
                <td><?= $x->idFasilitas ?></td>
                <td><?= $x->namaFasilitas ?></td>
                <td><?= formatRupiah($x->hargaFasilitas) ?></td>
                <td><img src="../images/thumbnail-fasilitas/<?= $x->fotoFasilitas ?>" class="w-25 img-fluid" alt=""></td>
                <td><?= $x->namaAdmin ?></td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah<?= $x->idFasilitas ?>" class="btn btn-secondary">Edit</a>
                  <a onclick="hapusFasilitas('<?= $x->idFasilitas ?>','<?= $x->namaFasilitas ?>')" href="#" class="btn btn-danger">Hapus</a>
                </td>
              </tr>

              <!-- The Modal -->
              <div class="modal fade" id="modalTambah<?= $x->idFasilitas ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Ubah Fasilitas <?= $x->namaFasilitas ?></h4>
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

                          <input type="text" oninput="formatRupiahFungsi(this.value,'hargaFasilitasFormatUbah<?= $x->idFasilitas ?>','hargaFasilitasUbah<?= $x->idFasilitas ?>')"  required id="hargaFasilitasFormatUbah<?= $x->idFasilitas ?>" value="<?= formatDot($x->hargaFasilitas) ?>" class="form-control">
                          <input type="hidden" required id="hargaFasilitasUbah<?= $x->idFasilitas ?>" value="<?= $x->hargaFasilitas ?>" name="hargaFasilitas">
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
        function hapusFasilitas(idFasilitas, namaFasilitas) {
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