<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Data Pelanggan";
include('tmpadmin/header.php');
include('tmpadmin/nav-data.php');
// include('../model/adminModel.php');
?>

  <a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left: 45%; text-decoration: none; font-size: 120%">Tabel Pelanggan</a>

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
          <th>ID Pelanggan</th>
          <th>Nama Pelanggan</th>
          <th>Jenis Kelamin</th>
          <th>Email</th>
          <th>Nomor Telepon</th>
        </tr>


      </thead>


      
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
       
      
    </table>
  </div>



</body>

</html>