<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Kelola Diskon";
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
// include('../model/adminModel.php');
?>
.
<a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Diskon</a>
<?php
if (isset($_SESSION['insert_alert']) && !isset($_POST['btnInsertDiskon']) || isset($_SESSION['insert_alert']) && !isset($_POST['btnUpdateDiskon'])) {
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
              <h4 class="modal-title">Ubah Diskon</h4>
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
                <h4 class="modal-title">Tambah Diskon</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="namaDiskon">Kode Diskon</label>

                    <input type="text" class="form-control" required name="namaDiskon">
                  </div>
                  <div class="form-group">
                    <label for="namaDiskon">Desc/Benefit Diskon</label>

                    <textarea class="form-control" required name="descDiskon"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="namaDiskon">Potongan Harga Diskon</label>

                    <input type="number" required class="form-control" name="potonganHarga">
                  </div>
                  <div class="form-group">
                    <label for="namaDiskon">Limit Diskon</label>

                    <input type="number" required class="form-control" name="limitDiskon">
                  </div>
                  <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">

                  <div class="form-group">
                    <label for="fotoDiskon">Banner Diskon</label>
                    <input type="file" required class="form-control" name="gambarDiskon">
                  </div>
                  <div class="form-group">
                    <label for="namaDiskon">Tanggal Awal</label>
                    <input type="date" min="<?= date('Y-m-d'); ?>" required class="form-control" name="tglAwal">
                  </div>

                  <div class="form-group">
                    <label for="namaDiskon">Tanggal Akhir</label>
                    <input type="date" min="<?= date('Y-m-d'); ?>" required class="form-control" name="tglAkhir">
                  </div>

                  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button class="btn btn-primary" type="submit" name="btnInsertDiskon" value="1"><i class="bi bi-check-square-fill"></i> Save</button>
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
              <th>ID Diskon</th>
              <th>Kode Diskon</th>
              <th>Potongan Harga Diskon</th>
              <th>Limit Diskon</th>
              <th>Banner Diskon</th>
              <th>Tanggal Berlaku</th>
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
            foreach ($kelolaM->showDiskon() as $s => $x) {
            ?>

              <!-- echo $x->idTipeKamar; -->
              <tr>
                <td><?= $x->idDiskon ?></td>
                <td><?= $x->namaDiskon ?></td>
                <td><?= formatRupiah($x->potonganHarga) ?></td>
                <td><?= ($x->limit) ?></td>
                <td><img src="../images/thumbnail-diskon/<?= $x->gambarDiskon ?>" class="w-25 img-fluid" alt=""></td>
                <td><?= formatTgl($x->tglAwal) ?> sampai <?= formatTgl($x->tglAkhir) ?></td>
                <td><?= $x->namaAdmin ?></td>
                <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah<?= $x->idDiskon ?>" class="btn btn-secondary">Edit</a>
                  <a onclick="hapusDiskon('<?= $x->idDiskon ?>','<?= $x->namaDiskon ?>')" href="#" class="btn btn-danger">Hapus</a>
                </td>
              </tr>

              <!-- The Modal -->
              <div class="modal fade" id="modalTambah<?= $x->idDiskon ?>">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Ubah Diskon <?= $x->namaDiskon ?></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="namaDiskon">Ubah Kode Diskon</label>

                          <input type="text" value="<?= $x->namaDiskon ?>" class="form-control" required name="namaDiskon">
                        </div>
                        <div class="form-group">
                          <label for="namaDiskon">Ubah Desc/Benefit Diskon</label>

                          <textarea class="form-control" required name="descDiskon"><?= $x->descDiskon ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="namaDiskon">Ubah Potongan Harga Diskon</label>

                          <input type="number" required class="form-control" value="<?= $x->potonganHarga ?>" name="potonganHarga">
                        </div>
                        <div class="form-group">
                          <label for="namaDiskon">Ubah Limit Diskon</label>

                          <input type="number" value="<?= $x->limit ?>" required class="form-control" name="limitDiskon">
                        </div>
                        <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                        <input type="hidden" name="idDiskon" value="<?= $x->idDiskon ?>">
                        <div class="form-group">
                          <label for="fotoDiskon">Ubah Banner Diskon</label>
                          <input type="file"  class="form-control" name="gambarDiskon">
                          <div class="form-text fw-bold text-dark">*Jika tidak ingin mengubah gambar silahkan dikosongi</div>
                          <center>

                            <img src="../images/thumbnail-diskon/<?= $x->gambarDiskon ?>" class=" img-fluid img-thumbnail " alt="">
                          </center>
                        </div>
                        <div class="form-group">
                          <label for="namaDiskon">Ubah Tanggal Awal</label>
                          <input type="date" min="<?= date('Y-m-d'); ?>" value="<?= $x->tglAwal ?>" required class="form-control" name="tglAwal">
                        </div>

                        <div class="form-group">
                          <label for="namaDiskon">Ubah Tanggal Akhir</label>
                          <input type="date" min="<?= date('Y-m-d'); ?>" value="<?= $x->tglAkhir ?>" required class="form-control" name="tglAkhir">
                        </div>





                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                          <button class="btn btn-primary" type="submit" name="btnUpdateDiskon" value="1"><i class="bi bi-check-square-fill"></i> Update</button>
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
        function hapusDiskon(idDiskon, namaDiskon) {
          Swal.fire({
            title: '<p style="text-transform:lowercase !important;">yakin menghapus diskon (' + namaDiskon + ') ?</p>',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Cancel',
            denyButtonText: `Hapus`,
            confirmButtonText: 'Batal',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isDenied) {
              window.location.href = "../model/kelolaModel.php?actDiskon=hapusDiskon&idDiskon=" + idDiskon;
            }
          })
        }
      </script>



    </div>
  </div>
</div>
<?php include('tmpadmin/footer.php') ?>