<?php
include('../helper/flash_session.php');
include('../model/kelolaModel.php');
$title = "Data Transaksi";
include('tmpadmin/header.php');
include('tmpadmin/nav-data.php');
// include('../model/adminModel.php');
?>

  <a class="w3-display-middle" style="color:black;float: center; margin-top: -13%; margin-left:45%; text-decoration: none; font-size: 120%">Tabel Transaksi</a>

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
          <th>ID Transaksi</th>
          <th>Tanggal Transaksi</th>
          <th>Waktu Transaksi</th>
          <th>Nomor Kamar</th>
          <th>Lama Sewa</th>
          <th>Total Harga</th>
          <th>Bukti Pembayaran</th>
        </tr>


      </thead>


     
        <form action="DataTransaksi.php" method="post">
          <tr>
          


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