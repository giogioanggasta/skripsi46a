<?php include('../model/Model-DataTransaksi.php') ?>
<?php include('../model/SendMail.php') ?>


<!DOCTYPE html>


<head>
<title>Kelola Kamar</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    @font-face {
      font-family: header;
      src: url("../fonts/Ailerons-Typeface.otf");
    }

    @font-face {
      font-family: texts;
      src: url("../fonts/Renner_ 400 Book.ttf");
    }

    @font-face {
      font-family: navBarFont;
      src: url("../fonts/Kiona-Regular.ttf");
      font-style: bold;
    }

    h1 {
      font-family: header;
      font-size: 70px;
      color: #373737;
    }

    a {
      font-family: navBarFont;
      font-size: 25px;
      color: #868B8E;
      font-style: bold;
    }


    h2 {
      font-family: navBarFont;
      font-size: 30px;
      color: white;
      margin-top: 40px;
      margin-bottom: 40px;
    }

    h5 {
      font-family: navBarFont;
      font-size: 20px;
      color: white;
    }

    .enterbutton {
      width: 20%;
      background-color: grey;
      border: none;
      color: white;
      padding: 14px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 8px 0;
      margin-left: 75%;
      margin-top: 5%;
      cursor: pointer;
      border-radius: 4px;
      transition: 0.5s;
    }

    .button {
      width: 82.5%;
      background-color: white;
      border: 1px solid #ccc;
      color: white;
      padding: 14px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 8px 0;
      cursor: pointer;
      border-radius: 4px;
      transition: 0.5s;
    }


    .button:hover {
      background-color: grey;
      transition: 0.5s;
    }

    h5 {
      font-family: navBarFont;
      font-size: 20px;
      color: white;
    }

    table {
      width: 70%;
      color: black;
      margin-left: 10%;
      margin-top: 2.5%;
    }

    table,
    tr,
    td {
      padding: 10px;
    }

    input[type=submit] {
      width: 20%;
      background-color: grey;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      margin-top: 5%;
      margin-left: 55%;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .tablecust {
      font-family: texts2;
      font-size: 15px;
      color: #373737;
    }
  </style>
</head>

<body>



    <div class="w3-bar w3-white w3-border " id="menu" style="background-color: #11355b">
        <a href="HomeAdmin.php" class="w3-bar-item"><img src="../images/logo46a.png" style="width:150px"></a>
        <a href="Kelola.php" class="w3-bar-item" style="float: right; margin-right: 2.5%; margin-top:4%; text-decoration: none; color: white">Kamar</a>
        <a href="KelolaTipeKamar.php" class="w3-bar-item" style="float: right; margin-right: 2.5%; margin-top:4%; text-decoration: none; color: white">Tipe Kamar</a>
        <a href="KelolaFasilitas.php" class="w3-bar-item" style="float: right; margin-top:4%; margin-right: 2.5%; text-decoration: none; color: white">Fasilitas</a>
      </div>
      <br><br>

  <a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%;">Tabel Kamar</a>

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
          <form class="w3-container" action="DataJasa.php" method="POST">
            <br>
            <label><b>Kode Tipe Kamar yang ingin dihapus</b></label>
            <input class="w3-input w3-border" type="text" placeholder="" name="kodeJasa">
            <br>
            <br>
            <br>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnHapus">HAPUS</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>


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

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah" style="float:right; margin-top:8%; margin-right: 2%; background-color:steelblue">
    Tambah
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Tipe Kamar</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form class="w3-container" action="DataJasa.php" method="POST" enctype="multipart/form-data">
            <br>
            <label><b>Nama Tipe Kamar</b></label>
            <input class="w3-input w3-border" type="text" placeholder="" name="tambahNamaTipe">
            <label><b>ThumbnailKamar</b></label>
            <input class="w3-input w3-border" type="file" name="tambahFoto">
            

            <br>
            <br>
            <br>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnInsert">ENTER</button>
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
          <th>ID Tipe Kamar</th>
          <th>Nama Tipe Kamar</th>
          <th>Thumbnail Kamar</th>
        </tr>
      </thead>

      <?php
      $sql = "SELECT * FROM m_tipekamar";
      $results = mysqli_query($db, $sql) or die(mysqli_error($db));

      while ($row = mysqli_fetch_array($results)) {



      ?>


        <form class="w3-container" action="DataJasa.php" method="POST" enctype="multipart/form-data">
          <tr>
            <td><?php echo $row["idJasa"] ?></td>
            <td><?php echo $row["kodeJasa"] ?></td>
            <td><?php echo $row["namaJasa"] ?></td>
            <td><img src="../model/uploadImage/<?php echo $row['fotoJasa'] ?>" style="width:25%"> </td>
            <td><?php echo $row["keteranganJasa"] ?></td>
            <td><?php echo $row["hargaJasa"] ?></td>
            <td><input type="hidden" name="idJasa" value="<?php echo $row["idJasa"]; ?>"></td>
            <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalUbah-<?= $row["idJasa"] ?>' name='buttonEdit' style="background-color:steelblue">Edit</button></td>
          </tr>
          <!-- The Modal -->
          <div class="modal fade" id="modalUbah-<?= $row["idJasa"] ?>">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Ubah Jasa</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <br>
                    <label><b>Nama Tipe Kamar</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="" name="editNama" value="<?php echo $row["namaTipeKamar"] ?>" required>
                    <label><b>Thumbnail Tipe Kamar</b></label>
                    <input class="w3-input w3-border" type="file" name="editFoto">
                    

                    <br>
                    <br>
                    <br>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                      <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnEdit">ENTER</button>
                    </div>
                </div>
              </div>
            </div>
        </form>


      <?php
      }

      ?>

    </table>







  </div>



</body>

</html>
