<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Kelola Tipe Kamar";
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
// include('../model/adminModel.php');

?>
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
        <div class="modal-dialog ">
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
          <div class="modal-dialog modal-lg modal-dialog-centered">
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

                    <input type="text" class="form-control" name="tipeKamar" required>
                  </div>
                  <div class="form-group">
                    <label for="tipeKamar">Harga Tipe Kamar (Rp.)</label>
                    <input type="text" id="hargaTipeKamarFormat" oninput="formatRupiahFungsi(this.value,'hargaTipeKamarFormat','hargaTipeKamar')" class="form-control" name="hargaTipeKamarFormat" required>
                    <input type="hidden" class="form-control" id="hargaTipeKamar" name="hargaTipeKamar" required>
                  </div>
                  <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                  <div class="form-group">
                    <label for="tipeKamar">Deskripsi Tipe Kamar</label>
                    <textarea name="descTipeKamar" id="editor1"></textarea>
                    <!-- <input type="number" class="form-control" name="descTipeKamar" required> -->
                  </div>
                  <div class="form-group">
                    <label for="tipeKamar">Upload Thumbnail</label>
                    <input required type="file" class="form-control" name="fileTipeKamar">
                  </div>
                  <div class="form-group">
                    <label for="status">Detail Foto Kamar</label>
                    <input required class="form-control" type="file" accept="image/jpeg,image/png" name="namaFoto[]" multiple>
                    <div class="form-text">Bisa pilih lebih dari 1 Gambar</div>
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
        <table class=" display" id="Table_ID" width="100%" style="font-family: texts; font-size: 15px;">

          <thead>

            <tr>
              <th>ID Tipe Kamar</th>
              <th>Nama Tipe Kamar</th>
              <th>Harga Tipe Kamar</th>
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
                <td><?= formatRupiah($x->hargaTipeKamar) ?></td>
                <td><img src="../images/thumbnail/<?= $x->thumbnailKamar ?>" class="w-25 img-fluid" alt=""></td>
                <td><?= $x->namaAdmin ?></td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah<?= $x->idTipeKamar ?>" class="btn btn-secondary">Edit</a>
                  <a onclick="hapusTipeKamar('<?= $x->idTipeKamar ?>','<?= $x->namaTipeKamar ?>')" href="#" class="btn btn-danger">Hapus</a>
                </td>
              </tr>

              <!-- The Modal -->
              <div class="modal fade" id="modalTambah<?= $x->idTipeKamar ?>">
                <div class="modal-dialog modal-lg modal-dialog-centered">
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
                        <div class="form-group">
                          <label for="tipeKamar">Ubah Harga Kamar</label>


                          <input type="text" id="hargaTipeKamarFormatUbah<?= $x->idTipeKamar ?>" oninput="formatRupiahFungsi(this.value,'hargaTipeKamarFormatUbah<?= $x->idTipeKamar ?>','hargaTipeKamarUbah<?= $x->idTipeKamar ?>')" required value="<?= formatDot($x->hargaTipeKamar) ?>" class="form-control">
                          <input type="hidden" id="hargaTipeKamarUbah<?= $x->idTipeKamar ?>" required value="<?= $x->hargaTipeKamar ?>" name="hargaTipeKamar">
                        </div>
                        <div class="form-group">
                          <label for="tipeKamar">Ubah Deskripsi Tipe Kamar</label>
                          <textarea name="descTipeKamar" id="editor2<?= $x->idTipeKamar ?>"><?= $x->descTipeKamar ?></textarea>
                          <!-- <input type="number" class="form-control" name="descTipeKamar" required> -->
                        </div>
                        <script>
                          CKEDITOR.replace('editor2<?= $x->idTipeKamar ?>', {});
                        </script>
                        <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                        <input type="hidden" name="idTipeKamar" value="<?= $x->idTipeKamar ?>">

                        <div class="form-group">
                          <label for="tipeKamar">Upload Thumbnail</label>
                          <input type="file" class="form-control" name="fileTipeKamar">

                        </div>
                        <div class="form-text fw-bold text-dark">*Jika tidak ingin mengubah gambar silahkan dikosongi</div>
                        <center>

                          <img src="../images/thumbnail/<?= $x->thumbnailKamar ?>" class=" img-fluid img-thumbnail" alt="">


                        </center>
                        <div class="form-group">
                          <label for="tipeKamar">Upload Detail Kamar</label>
                          <input type="file" class="form-control" name="namaFoto[]" multiple>

                        </div>
                        <div class="form-text fw-bold text-dark">*Jika tidak ingin mengubah gambar silahkan dikosongi</div>
                        <center>

                          <div class="row">

                            <?php
                            foreach ($kelolaM->showAllFotoKamar($x->idTipeKamar) as $k => $d) {
                            ?>
                              <div class="col-3 mt-1 mb-1">

                                <img src="../images/img-kamar/<?= $d->namaFoto ?>" class="mb-3  img-fluid img-thumbnail " alt="">
                                <br>
                                <a class="btn btn-danger" onclick="hapusFotoDetailTipeKamar('<?= $d->idFotoKamar ?>','<?= $d->idTipeKamar ?>')" href="#"><i class="bi bi-trash"></i></a>
                              </div>

                            <?php
                            }
                            ?>
                          </div>


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
        function hapusFotoDetailTipeKamar(idFotoKamar, idTipeKamar) {
          Swal.fire({
            title: '<p style="text-transform:lowercase !important;">yakin menghapus foto yang dipilih ?</p>',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Cancel',
            denyButtonText: `Hapus`,
            confirmButtonText: 'Batal',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isDenied) {
              window.location.href = "?actTipeKamar=hapusFotoDetailTipeKamar&idFotoKamar=" + idFotoKamar + "&idTipeKamar=" + idTipeKamar;
            }
          })
        }


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