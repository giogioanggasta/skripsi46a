<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Kelola Kamar";
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
// include('../model/adminModel.php');
?>
.
<a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Tipe Kamar</a>
<?php
if (isset($_SESSION['insert_alert']) && !isset($_POST['btnInsertTipeKamar']) || isset($_SESSION['insert_alert']) && !isset($_POST['btnUpdateTipeKamar'])) {
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
              <h4 class="modal-title">Ubah Transaksi</h4>
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
                <h4 class="modal-title">Tambah Tipe Kamar</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="tipeKamar">Tipe Kamar</label>

                    <input type="text" class="form-control" name="tipeKamar">
                  </div>
                  <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">

                  <div class="form-group">
                    <label for="tipeKamar">Upload Thumbnail</label>
                    <input type="file" class="form-control" name="fileTipeKamar">
                  </div>

                  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button class="btn btn-primary" type="submit" name="btnInsertTipeKamar" value="1"><i class="bi bi-check-square-fill"></i> Save</button>
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
              <th>ID Tipe Kamar</th>
              <th>Nama Tipe Kamar</th>
              <th width="25%">Thumbnail Kamar</th>
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
            foreach ($kelolaM->showKamar() as $s => $x) {
            ?>

              <!-- echo $x->idTipeKamar; -->
              <tr>
                <td><?= $x->idTipeKamar ?></td>
                <td><?= $x->namaTipeKamar ?></td>
                <td><img src="../images/thumbnail/<?= $x->thumbnailKamar ?>" class="w-25 img-fluid" alt=""></td>
                <td><?= $x->namaAdmin ?></td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah<?= $x->idTipeKamar ?>" class="btn btn-secondary">Edit</a>
                  <a onclick="hapusTipeKamar('<?= $x->idTipeKamar ?>','<?= $x->namaTipeKamar ?>')" href="#" class="btn btn-danger">Hapus</a>
                </td>
              </tr>

              <!-- The Modal -->
              <div class="modal fade" id="modalTambah<?= $x->idTipeKamar ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Ubah Tipe Kamar <?= $x->namaTipeKamar ?></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="tipeKamar">Tipe Kamar</label>

                          <input type="text" required value="<?= $x->namaTipeKamar ?>" class="form-control" name="tipeKamar">
                        </div>
                        <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                        <input type="hidden" name="idTipeKamar" value="<?= $x->idTipeKamar ?>">

                        <div class="form-group">
                          <label for="tipeKamar">Upload Thumbnail</label>
                          <input type="file" class="form-control" name="fileTipeKamar">

                        </div>
                        <div class="form-text fw-bold text-dark">*Jika tidak ingin mengubah gambar silahkan dikosongi</div>
                        <center>

                          <img src="../images/thumbnail/<?= $x->thumbnailKamar ?>" class=" img-fluid img-thumbnail " alt="">
                        </center>
                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                          <button class="btn btn-primary" type="submit" name="btnUpdateTipeKamar" value="1"><i class="bi bi-check-square-fill"></i> Update</button>
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
        function hapusTipeKamar(idTipeKamar, namaTipeKamar) {
          Swal.fire({
            title: '<p style="text-transform:lowercase !important;">yakin menghapus tipe kamar (' + namaTipeKamar + ') ?</p>',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Cancel',
            denyButtonText: `Hapus`,
            confirmButtonText: 'Batal',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isDenied) {
              window.location.href = "../model/kelolaModel.php?actTipeKamar=hapusTipeKamar&idTipeKamar=" + idTipeKamar;
            }
          })
        }
      </script>



    </div>
  </div>
</div>
<?php include('tmpadmin/footer.php') ?>