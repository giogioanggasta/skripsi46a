<?php
include('../helper/flash_session.php');
include('../model/dataModel.php');
$title = "Data Pelanggan";
include('tmpadmin/header.php');
include('tmpadmin/nav-data.php');
// include('../model/adminModel.php');
?>


<div class="container">
  <div class="row">
    <div class="col-12">

      <a class="w3-display-middle" style="color:black;text-decoration: none; font-size: 120%">Data Pelanggan</a>
      <br>
      <a target="_blank" href="DataPelangganExport.php"> <button style="border: none;
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
              <th>ID Pelanggan</th>
              <th>Nama Pelanggan</th>
              <th>Jenis Kelamin Pelanggan</th>
              <th>Tanggal Lahir Pelanggan</th>
              <th>Nomor Telp Pelanggan</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>

            <?php


            foreach ($dataM->showDataUser() as $s => $x) {
            ?>

              <!-- echo $x->idTipeKamar; -->
              <tr>
                <td><?= $x->idUser ?></td>
                <td><?= $x->namaUser ?></td>
                <td><?= $x->jenisKelamin ?></td>
                <td><?= formatTgl($x->tanggalLahir) ?></td>
                <td><?= $x->nomorTelepon ?></td>
                <td><?= $x->email ?></td>

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