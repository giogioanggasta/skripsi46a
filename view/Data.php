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
      <a target="_blank" href="DataExport.php"> <button style="border: none;
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
                <th>Total Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
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
                  <td><?= formatRupiah($x->totalPembayaran) ?></td>
                  <td><a target="_blank" style="font-size: 12px;" href="<?php
                                                                        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                                        echo str_replace('view/Data.php', 'images/bukti-bayar/', $actual_link) . $x->buktiPembayaran;

                                                                        ?>"><?php
                                                                            $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                                            echo str_replace('view/Data.php', 'images/bukti-bayar/', $actual_link) . $x->buktiPembayaran;

                                                                            ?></a></td>
                  <td><?= $x->status ?></td>
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