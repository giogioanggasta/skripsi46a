<?php
include 'tmpuser/header.php';
include 'tmpuser/nav.php';

$u = $userM->profileUser();
?>
<div class="container">
    <div class="row mb-5">
        <div class="col-12 " style="background-color: #11355b; color:white !important;">
            <center>
                <img src="../images/user.png" class="text-center mt-3">
                <h4>Selamat Datang, <?= $u->namaUser ?> </h4>


            </center>
            <form action="../controller/UserController.php" method="post">
                <div class="row p-4">

                    <div class="col-lg-6 col-sm-12">

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" value="<?= $u->namaUser; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>

                            <select class="form-control" name="jenisKelamin" id="">
                                <option <?= ($u->jenisKelamin == 'Pria') ? 'selected' : ''; ?> value="Pria">Pria</option>
                                <option <?= ($u->jenisKelamin == 'Wanita') ? 'selected' : ''; ?> value="Wanita">Wanita</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" value="<?= $u->tanggalLahir ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text" value="<?= $u->nomorTelepon ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="<?= $u->email ?>" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class="float-right btn btn-secondary mb-5">Save</button>

                    </div>
                </div>

            </form>

        </div>

    </div>
</div>
</div>
</div>