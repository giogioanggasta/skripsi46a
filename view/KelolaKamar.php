<?php
$title = "Kelola Kamar";
include('../helper/flash_session.php');
include('tmpadmin/header.php');
include('tmpadmin/nav-kelola.php');
include('../model/kelolaModel.php');
// include('../model/adminModel.php');
?>

<a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Kamar</a>
<?php
if (isset($_SESSION['insert_alert']) && !isset($_POST['btnInsertTipeKamar'])) {
  echo $_SESSION['insert_alert'];
  unset($_SESSION['insert_alert']);
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalHapus" style="float:right; margin-top:8%; margin-right: 1%; background-color:steelblue">
  Hapus
</button>

<!-- The Modal -->
<div class="modal fade" id="modalHapus">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hapus Tipe Kamar</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="namaKamar">ID kamar yang ingin dihapus</label>
            <input type="text" class="form-control" name="namaKamar">
          </div>
          <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <button class="btn btn-primary" type="submit" name="btnInsertTipeKamar"><i class="bi bi-check-square-fill"></i> Save</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah" style="float:right; margin-top:8%; margin-right: 2%; background-color:steelblue">
  Tambah
</button>

<!-- The Modal -->
<div class="modal fade" id="modalTambah">
  <div class="modal-dialog">
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
            <label for="namaKamar">Nomor Kamar</label>
            <input type="text" class="form-control" name="nomorKamar">
          </div>
          <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
          <div class="form-group">
            <label for="namaKamar">Tipe Kamar</label>
            <input type="text" class="form-control" name="tipeKamar">
          </div>

          <div class="form-group">
            <label for="namaKamar">Status</label>
            <input type="text" class="form-control" name="namaKamar">
          </div>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button class="btn btn-primary" type="submit" name="btnInsertTipeKamar"><i class="bi bi-check-square-fill"></i> Save</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>



<div class="w3-container" style="margin-left: -10%;">
  <table class="w3-table-all w3-center w3-hoverable" id="tabelcust" style="font-family: texts; font-size: 15px; width: 90%">
    <thead>
      <tr class="w3-light-grey">
        <th>ID Kamar</th>
        <th>Nomor Kamar</th>
        <th>Tipe Kamar</th>
        <th>Status</th>
      </tr>
    </thead>




    <form class="w3-container" method="POST" enctype="multipart/form-data">
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalUbah-<?= $row["idJasa"] ?>' name='buttonEdit' style="background-color:steelblue">Edit</button></td>
      </tr>
      <!-- The Modal -->
      <div class="modal fade" id="modalUbah-<?= $row["nomorKamar"] ?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Ubah Kamar</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="namaKamar">Nomor Kamar</label>
                  <input type="text" class="form-control" name="nomorKamar" value="">
                </div>
                <input type="hidden" name="idAdmin" value="<?= $_SESSION['admin_session_login']->idAdmin; ?>">
                <div class="form-group">
                  <label for="namaKamar">Tipe Kamar</label>
                  <input type="text" class="form-control" name="tipeKamar" value="">
                </div>

                <div class="form-group">
                  <label for="namaKamar">Status</label>
                  <input type="text" class="form-control" name="namaKamar" value="">
                </div>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                  <button class="btn btn-primary" type="submit" name="btnInsertTipeKamar"><i class="bi bi-check-square-fill"></i> Save</button>
                </div>
            </div>
          </div>
        </div>
    </form>
</div>




</table>

<?php include('tmpadmin/footer.php') ?>