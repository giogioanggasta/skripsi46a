<?php
include('../helper/flash_session.php');
include('../model/dataModel.php');
$title = "Data Transaksi";
include('tmpadmin/header.php');
include('tmpadmin/nav-data.php');
// include('../model/adminModel.php');
?>


<div class="container">
  <div class="row">
    <div class="col-12">

      <a class="w3-display-middle" style="color:black;text-decoration: none; font-size: 120%">Data Transaksi</a>
      <br>
      <a target="_blank" id="targetHrefExport" href="DataExport.php?startDate=<?= (isset($_GET['startDate']) ? $_GET['startDate'] : '') ?>&endDate=<?= (isset($_GET['endDate']) ? $_GET['endDate'] : '') ?>"> <button style="border: none;
                outline: 0;
                padding: 6px;
                color: white;
                background-color: steelblue;
                text-align: center;
                cursor: pointer;
                font-size: 16px;
              
             
                margin-right: 35px;
               ">Download as Excel</button> </a>




      <div class="col-12 mt-4">
        <div class="row">
          <div class="col-lg-3 col-sm-6">

            <div class="form-group">
              <label for="">Start Date</label>
              <input type="date" class="form-control " value="<?= (isset($_GET['startDate']) ? $_GET['startDate'] : '') ?>" id="startDate" name="start_date">
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">

            <div class="form-group">
              <label for="">End Date</label>
              <input type="date" class="form-control " value="<?= (isset($_GET['endDate']) ? $_GET['endDate'] : '') ?>" id="endDate" name="end_date">
            </div>
          </div>
          <script>
            function filterDate() {
              var startDate = document.getElementById('startDate').value;
              var endDate = document.getElementById('endDate').value;

              window.location.href = "?startDate=" + startDate + '&endDate=' + endDate;

            }
          </script>
          <div class="col-lg-3 col-sm-6">

            <div class="form-group">
              <label for="">&nbsp;</label>
              <input type="button" name="filter_date" onclick="filterDate()" class="form-control btn-primary" value="Filter Date">

            </div>

          </div>
          <div class="col-lg-3 col-sm-6">

            <div class="form-group">
              <label for="">&nbsp;</label>
              <input type="button" onclick="window.location.href='Data.php'" name="showAll" class="form-control btn-primary" value="Show All">

            </div>

          </div>
        </div>

      </div>



      <div class="col-12">
        <div class="table-responsive">
          <table class=" display" id="Table_ID" style="font-family: texts; font-size: 15px;">

            <thead>

              <tr>
                <th>ID User</th>
                <th>Nama User</th>
                <th>Email User</th>
                <th>Nomor Telp User</th>
                <th>Jenis Kelamin User</th>
                <th>ID Transaksi</th>
                <th>Nama Tipe Kamar</th>
                <th>Nomor Kamar</th>
                <th>Fasilitas Kamar</th>
                <th>Tgl Transaksi</th>
                <th>Lama Sewa</th>
                <th>Awal Sewa</th>
                <th>Akhir Sewa</th>
                <th>Kode Diskon</th>
                <th>Potongan Harga Diskon</th>
                <th>Total Pembayaran Normal</th>
                <th>Total Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status Transaksi</th>
                <th>Type Transaksi</th>
              </tr>
            </thead>
            <tbody>

              <?php


              foreach ($dataM->showDataTransaksi() as $s => $x) {
              ?>

                <!-- echo $x->idTipeKamar; -->
                <tr>
                  <td><?= $x->idUser ?></td>
                  <td><?= $x->namaUser ?></td>
                  <td><?= $x->email ?></td>
                  <td><?= $x->nomorTelepon ?></td>
                  <td><?= $x->jenisKelamin ?></td>
                  <td><?= $x->idTransaksi ?></td>
                  <td><?= $x->namaTipeKamar ?></td>
                  <td><?= $x->nomorKamar ?></td>
                  <td><?= $x->pilihanDetailFasilitas ?></td>
                  <td><?= formatTgl($x->tanggalWaktuTransaksi) . " " . formatWaktu($x->tanggalWaktuTransaksi) ?></td>
                  <td><?= $x->lamaSewa ?></td>
                  <td><?= formatTgl($x->awalSewa) ?></td>
                  <td><?= formatTgl($x->akhirSewa) ?></td>
                  <td><?= ($x->potonganHarga == 0) ? '-' : $x->namaDiskon ?></td>
                  <td><?= formatRupiah($x->potonganHarga) ?></td>
                  <td><?= formatRupiah($x->totalPembayaranNormal) ?></td>
                  <td><?= formatRupiah($x->totalPembayaran) ?></td>
                  <td><a target="_blank" style="font-size: 12px;" href="<?php
                                                                        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                                        echo str_replace('view/Data.php', 'images/bukti-bayar/', $actual_link) . $x->buktiPembayaran;

                                                                        ?>"><?php
                                                                            $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                                            echo str_replace('view/Data.php', 'images/bukti-bayar/', $actual_link) . $x->buktiPembayaran;

                                                                            ?></a></td>
                  <td><?= $x->status ?></td>
                  <td><?= $x->type ?></td>
                </tr>


              <?php
              }
              ?>
            </tbody>
          </table>
        </div>

      </div>




    </div>
  </div>
</div>

<?php include('tmpadmin/footer.php') ?>