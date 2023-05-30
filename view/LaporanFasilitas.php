<?php
include('../helper/flash_session.php');
include('../model/laporanModel.php');
$title = "Laporan Fasilitas";
include('tmpadmin/header.php');
include('tmpadmin/nav-laporan.php');
// include('../model/adminModel.php');
?>



<div class="container">
  <div class="row">
    <div class="col-12">

      <a class="w3-display-middle" style="color:black;text-decoration: none; font-size: 120%">Laporan Fasilitas</a>
      <br>
      <a target="_blank" href="LaporanFasilitasExport.php"> <button style="border: none;
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
        <table class=" display" id="Table_ID" style="font-family: texts; font-size: 15px;">

          <thead>

            <tr>
              <th>ID Pengelolaan</th>
              <th>ID Fasilitas</th>
              <th>Nama Fasilitas</th>
              <th>Harga Fasilitas</th>
              <th>Tanggal Perubahan</th>
              <th>Diubah Oleh</th>
            </tr>
          </thead>
          <tbody>

            <?php


            foreach ($laporanM->showLaporanFasilitas() as $s => $x) {
            ?>

              <!-- echo $x->idTipeKamar; -->
              <tr>
                <td><?= $x->idPengelolaan ?></td>
                <td><?= $x->idFasilitas ?></td>
                <td><?= $x->namaFasilitas ?></td>
                <td><?= formatRupiah($x->hargaFasilitas) ?></td>
                <td><?= formatTgl($x->created_at) ?> <?= formatWaktu($x->created_at) ?> </td>
                <td><?= $x->namaAdmin ?></td>
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


<?php include('tmpadmin/footer.php') ?>