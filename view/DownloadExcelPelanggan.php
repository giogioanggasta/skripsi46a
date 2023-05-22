<?php include('../model/Model-DownloadExcel.php');

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Transaksi.xls");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <table>
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>E-mail</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Nomor Telepon</th>
            <th>Jenis Member</th>
        </tr>

        <?php
        $sqlHasilTabel = "SELECT * FROM user";
        $restabel = mysqli_query($db, $sqlHasilTabel) or die(mysqli_error($db));
        $check = mysqli_num_rows($restabel);
        while ($row = mysqli_fetch_array($restabel)) {
        ?>
            <tr>
                <td><?php echo $row['idUser'] ?></td>
                <td><?php echo $row['namaUser'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['jenisKelamin'] ?></td>
                <td><?php echo $row['tanggalLahir'] ?></td>
                <td><?php echo $row['noTelepon'] ?></td>
                <td><?php echo $row['tipeMembership'] ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
</body>

</html>