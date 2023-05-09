<?php include('../model/Model-DataTransaksi.php') ?>
<?php include('../model/SendMail.php') ?>


<!DOCTYPE html>


<head>
<title>Kelola Tipe Kamar</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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

  <a class="w3-display-middle" style="color:black; float: center; margin-left: 45%; margin-top: -13%; text-decoration: none; font-size: 120%">Tabel Tipe Kamar</a>

  <a target="_blank" href="DownloadExcelTransaksi.php" style="margin-left: -48px;"> <button style="border: none;
                outline: 0;
                padding: 6px;
                color: white;
                background-color: steelblue;
                text-align: center;
                cursor: pointer;
                font-size: 16px;
                width: 15%;
                margin-top: 45px;
                margin-right: 35px;
                float: right;">Download as Excel</button> </a>






  <div class="w3-container" style="margin-left: -10%; margin-top: 5%">
    <table class="w3-table-all w3-center w3-hoverable" id="tabelcust" style="font-family: texts; font-size: 15px; width: 90%">
      <thead>
        <tr class="w3-light-grey">
          <th>ID Tipe Kamar</th>
          <th>Nama Tipe Kamar</th>
          <th>Harga Kamar</th>
          <th>Foto Kamar</th>
          <th>Stok</th>
          <th></th>
          <th></th>
        </tr>


      </thead>


      <?php
      $sql = "SELECT * FROM transaksi ";
      $results = mysqli_query($db, $sql) or die(mysqli_error($db));

      while ($row = mysqli_fetch_array($results)) {

      ?>
        <form action="DataTransaksi.php" method="post">
          <tr>
            <td><?php echo $row["idTransaksi"] ?></td>
            <td><?php echo $row["tanggalTransaksi"] ?></td>
            <td><?php echo $row["waktuTransaksi"] ?></td>
            <td><?php echo $row["jenisMobil"] ?></td>
            <td><?php echo $row["platKendaraan"] ?></td>
            <td><?php echo $row["jasa1"] ?></td>
            <td><?php echo $row["jasa2"] ?></td>
            <td><?php echo $row["jasa3"] ?></td>
            <td><?php echo $row["catatanPelanggan"] ?></td>
            <td><?php echo $row["totalHarga"] ?></td>
            <td><img src="../model/uploadImage/<?php echo $row['buktiPembayaran'] ?>" style="width:25%" alt="Customer belum mengupload bukti pembayaran"> </td>
            <td><?php echo $row["waktuPembayaran"] ?></td>
            <td><?php echo $row["status"] ?></td>
            <td><input type="hidden" name="idTransaksi" value="<?php echo $row["idTransaksi"]; ?>"></td>
            <td><input type="hidden" name="emailTujuan" value="<?php echo $row["email"]; ?>"></td>
            <td><input type="hidden" name="nama" value="<?php echo $row["namaUser"]; ?>"></td>
            <td><input type="hidden" name="tanggalTransaksi" value="<?php echo $row["tanggalTransaksi"]; ?>"></td>
            <td><input type="hidden" name="waktuTransaksi" value="<?php echo $row["waktuTransaksi"]; ?>"></td>
            <td><button type="submit" class="w3-button btn btn-primary" name="buttonTerima" style="border-color:#e7e7e7; background-color:steelblue">Terima</button>
            <td><button type='button' class="w3-button btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPembatalan-<?= $row['idTransaksi'] ?>" name="confirmBtn" style="border-color:#e7e7e7; background-color:red">Batalkan Pesanan</button></td>


          </tr>
          <div class="modal fade" id="modalPembatalan-<?= $row["idTransaksi"] ?>">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Masukkan Alasan Pembatalan</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <br>
                    <label><b>Alasan Pembatalan</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="" name="alasanPembatalan">
                    <br>
                    <br>
                    <br>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <input type="hidden" name="emailTujuan" value="<?php echo $row["email"]; ?>">
                    

                      <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnBatal">ENTER</button>
                    </div>
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