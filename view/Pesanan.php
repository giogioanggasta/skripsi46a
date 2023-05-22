<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';
?>

  <a class="w3-display-middle" style="color:black;float: center; margin-top: -10%; text-decoration: none;">Pesanan Anda</a>

  <img src="../images/car-wash.png" style="width:150px; margin-left:10%; margin-top: 12%; float:left ">
  <?php
  $sql = "SELECT * FROM transaksi WHERE status != 'Pemesanan Dibatalkan' AND status != 'Pemesanan Ditolak' AND idUser = '$_SESSION[idUser]'";
  $results = mysqli_query($db, $sql) or die(mysqli_error($db));
  $check = mysqli_num_rows($results);
  if ($check > 0) {
    while ($row = mysqli_fetch_array($results)) {

  ?>


      <div class="detail-booking" style="width:50%;float:center; margin-left: 27.5%; margin-top:12%;">
        <p style="margin-bottom: 8px;color: #0a2724;">ID Booking: <?php echo $row["idTransaksi"] . "<br>"; ?> </p>
        <p style="margin-bottom: 8px;color: #0a2724;">Tanggal Pemesanan: <?php $final_tanggal = date_create($row["tanggalTransaksi"]);
                                                                          echo date_format($final_tanggal, "Y-m-d") . "<br>"; ?> </p>
        <p style="margin-bottom: 8px;color: #0a2724;">Waktu Pemesanan: <?php $final_waktu = date_create($row["waktuTransaksi"]);
                                                                        echo date_format($final_waktu, "H:i") . "<br>"; ?> </p>
        <p style="margin-bottom: 8px;color: #0a2724;">Pilihan Jasa 1: <?php echo $row["jasa1"] . "<br>"; ?> </p>
        <p style="margin-bottom: 8px;color: #0a2724;">Pilihan Jasa 2: <?php echo $row["jasa2"] . "<br>"; ?></p>
        <p style="margin-bottom: 8px;color: #0a2724;">Pilihan Jasa 3: <?php echo $row["jasa3"] . "<br>"; ?></p>
        <p style="margin-bottom: 8px;color: #0a2724;">Catatan: <?php echo $row["catatanPelanggan"] . "<br>"; ?></p>
        <p style="margin-bottom: 8px;color: #0a2724;">Total Harga: <?php echo $row["totalHarga"] . "<br>"; ?></p>
        <p style="margin-bottom: 8px;color: #0a2724;"><b>Status Pemesanan:</b> <?php echo $row["status"] . "<br>"; ?></p>
        <p>Bukti Pembayaran :<img src="../model/uploadImage/<?php echo $row["buktiPembayaran"] ?>" alt="" style="width:15%"></p>
        <?php
        echo '<script type="text/javascript">' .
          'console.log(' . $jasa1 . ');</script>';
        ?>
      </div>
      <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReschedule-<?= $row['idTransaksi'] ?>" name="rescheduleBtn" id="rescheduleBtn">Reschedule</button>

      <form action="MyBooking.php" method="post" enctype="multipart/form-data">
        <div class="modal" id="modalReschedule-<?= $row["idTransaksi"] ?>">
          <input type="hidden" id="idTransaksi" name="idTransaksi" value='<?php echo $row["idTransaksi"]; ?>'>
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Reschedule Jadwal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <input type="hidden" id="idTransaksi" name="idTransaksi" value='<?php echo $row["idTransaksi"]; ?>'>
                <input type="hidden" id="tanggalTransaksi" name="tanggalTransaksi" value='<?php echo $row["tanggalTransaksi"]; ?>'>
                <input type="hidden" id="waktuTransaksi" name="waktuTransaksi" value='<?php echo $row["waktuTransaksi"]; ?>'>
                Harap cek jadwal yang tersedia sebelum melakukan Reschedule<br>
                <label><b>Jadwal baru yang diinginkan</b></label>
                <input type="time" id="waktuTransaksi" name="waktuTransaksi" step="3600" min="08:00" max="16:00" style="width: 52vh; height: 2.5vw; border: 1px solid #ccc;">
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                  <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" name="btnReschedule">ENTER</button>
                </div>
              </div>


            </div>
          </div>
        </div>
      </form>

      <button type="submit" class="w3-button w3-red" data-bs-toggle="modal" data-bs-target="#modalBatalkan-<?= $row['idTransaksi'] ?>" name="cancelBtn" id="cancelBtn">Batalkan</button>

      <form action="MyBooking.php" method="post" enctype="multipart/form-data">
        <div class="modal" id="modalBatalkan-<?= $row["idTransaksi"] ?>">
          <input type="hidden" id="idTransaksi" name="idTransaksi" value='<?php echo $row["idTransaksi"]; ?>'>
          <input type="hidden" id="tanggalTransaksi" name="tanggalTransaksi" value='<?php echo $row["tanggalTransaksi"]; ?>'>
          <input type="hidden" id="waktuTransaksi" name="waktuTransaksi" value='<?php echo $row["waktuTransaksi"]; ?>'>
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Pembatalan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <input type="hidden" id="idTransaksi" name="idTransaksi" value='<?php echo $row["idTransaksi"]; ?>'>
                Apakah anda yakin ingin melakukan pembatalan pemesanan ?<br>
                <button type="submit" class="btnUpload" name="btnBatal">Batalkan Pesanan</button> <br><br>
              </div>

            </div>
          </div>
        </div>
      </form>

      <button type="submit" class="w3-button w3-blue btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalConfirmation-<?= $row['idTransaksi'] ?>" name="confirmBtn" id="confirmBtn">Konfirmasi Pembayaran</button>

      <form action="MyBooking.php" method="post" enctype="multipart/form-data">
        <div class="modal" id="modalConfirmation-<?= $row["idTransaksi"] ?>">
          <input type="hidden" id="idTransaksi" name="idTransaksi" value='<?php echo $row["idTransaksi"]; ?>'>
          <input type="hidden" id="tanggalTransaksi" name="tanggalTransaksi" value='<?php echo $row["tanggalTransaksi"]; ?>'>
          <input type="hidden" id="waktuTransaksi" name="waktuTransaksi" value='<?php echo $row["waktuTransaksi"]; ?>'>
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Pembayaran</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <input type="hidden" id="idTransaksi" name="idTransaksi" value='<?php echo $row["idTransaksi"]; ?>'>
                Bayar ke nomor rekening : Mandiri 106-00-1178850-5 a/n C3 Car Care Center. <br>
                Bukti Pembayaran akan di proses maksimal 1x24 jam setelah upload. Anda akan menerima email jika pembayaran sudah diterima.<br>
                <label class="new-button" for="upload"><br>
                  <input type="file" name="file">
                  <button type="submit" class="btnUpload" name="btnUpload">Submit Bukti Pembayaran</button> <br><br>
              </div>

            </div>
          </div>
        </div>
      </form>



  <?php
    }
  }
  ?>


