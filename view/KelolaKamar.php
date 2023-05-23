<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Kelola Kamar";
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
// include('../model/adminModel.php');
?>
.
<a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Kamar</a>
<?php
if (isset($_SESSION['insert_alert']) && !isset($_POST['btnInsertKamar']) || isset($_SESSION['insert_alert']) && !isset($_POST['btnUpdateKamar'])) {
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
                <h4 class="modal-title">Tambah Kamar</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="nomorKamar">Nomor Kamar</label>
                    <input type="number" class="form-control" name="nomorKamar">
                  </div>
                  <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                  <div class="form-group">
                    <label for="tipeKamar">Tipe Kamar</label>
                    <select name="tipeKamar" class="form-select">
                      <option value="" selected hidden>Pilih Tipe Kamar</option>
                      <?php
                      foreach ($kelolaM->showKamar() as $k => $d) {
                      ?>
                        <option value="<?= $d->idTipeKamar ?>"><?= $d->namaTipeKamar ?></option>
                      <?php
                      }
                      ?>

                    </select>
                    <!-- <input type="text" class="form-control" name="tipeKamar"> -->
                  </div>
                  <div class="form-group">
                    <label for="status">Pilih Gambar</label>
                    <input class="form-control" type="file" accept="image/jpeg,image/png" name="namaFoto[]" multiple>
                    <div class="form-text">Bisa pilih lebih dari 1 Gambar</div>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>

                    <select name="status" class="form-select">
                      <option value="" selected hidden>Pilih Status Kamar</option>
                      <option value="Tersedia">Tersedia</option>
                      <option value="Tidak Tersedia">Tidak Tersedia</option>
                    </select>
                  </div>


                  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button class="btn btn-primary" type="submit" name="btnInsertKamar" value="1"><i class="bi bi-check-square-fill"></i> Save</button>
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
              <th>ID Kamar</th>
              <th>Nomor Kamar</th>
              <th>Tipe Kamar</th>
              <th>Status</th>
              <th>Dibuat Oleh</th>
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
                <td><?= $x->idKamar ?></td>
                <td><?= $x->nomorKamar ?></td>
                <td><?= $x->tipeKamar ?></td>
                <td><?= $x->status ?></td>
                <td><?= $x->namaAdmin ?></td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah<?= $x->idKamar ?>" class="btn btn-secondary">Edit</a>
                  <a onclick="hapusKamar('<?= $x->idKamar ?>','<?= $x->idKamar ?>')" href="#" class="btn btn-danger">Hapus</a>
                </td>
              </tr>

              <!-- The Modal -->
              <div class="modal fade" id="modalTambah<?= $x->idKamar ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Ubah Kamar <?= $x->nomorKamar ?></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="nomorKamar">Nomor Kamar</label>

                          <input type="text" required value="<?= $x->nomorKamar ?>" class="form-control" name="nomorKamar">
                        </div>
                        <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                        <input type="hidden" name="idKamar" value="<?= $x->idKamar ?>">
                        <div class="form-group">
                          <label for="tipeKamar">Tipe Kamar</label>

                          <input type="text" required value="<?= $x->tipeKamar ?>" class="form-control" name="tipeKamar">
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>

                          <input type="text" required value="<?= $x->status ?>" class="form-control" name="status">
                        </div>


                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                          <button class="btn btn-primary" type="submit" name="btnUpdateKamar" value="1"><i class="bi bi-check-square-fill"></i> Update</button>
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
        function hapusKamar(idKamar, nomorKamar) {
          Swal.fire({
            title: '<p style="text-transform:lowercase !important;">yakin menghapus kamar (' + nomorKamar + ') ?</p>',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Cancel',
            denyButtonText: `Hapus`,
            confirmButtonText: 'Batal',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isDenied) {
              window.location.href = "../model/kelolaModel.php?actKamar=hapusKamar&idKamar=" + idKamar;
            }
          })
        }
      </script>



    </div>
  </div>
</div>
<?php include('tmpadmin/footer.php') ?>