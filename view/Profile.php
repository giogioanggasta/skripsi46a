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
            <form method="post">
                <div class="row p-4">

                    <div class="col-lg-6 col-sm-12">

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="namaUser" required value="<?= $u->namaUser; ?>" class="form-control">
                            <input type="hidden" name="idUser" required value="<?= $u->idUser; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>

                            <select required class="form-control" name="jenisKelamin" id="">
                                <option <?= ($u->jenisKelamin == 'Pria') ? 'selected' : ''; ?> value="Pria">Pria</option>
                                <option <?= ($u->jenisKelamin == 'Wanita') ? 'selected' : ''; ?> value="Wanita">Wanita</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input required type="date" name="tanggalLahir" value="<?= $u->tanggalLahir ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input required name="nomorTelepon" type="text" value="<?= $u->nomorTelepon ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="<?= $u->email ?>" disabled class="bg-dark text-white form-control">
                            <div class="form-text">email tidak dapat di ganti</div>
                        </div>
                        <div class="form-group">
                            <label for="">Password Baru<span id="wajibPB"></span></label>
                            <input id="pwb" oninput="changePw(this.value)" type="password" name="passwordBaru" class="form-control">
                        </div>
                        <script>
                            function changePw(val) {
                                if (val == '') {

                                    document.getElementById("pwl").setAttribute("readonly", "");
                                    document.getElementById("pwl").value = '';
                                    document.getElementById('wajibPB').innerHTML = "";
                                    document.getElementById('wajibPL').innerHTML = "";
                                    document.getElementById("pwd").removeAttribute("required");
                                    document.getElementById("pwl").removeAttribute("required");
                                } else {

                                    document.getElementById('wajibPB').innerHTML = "*";
                                    document.getElementById('wajibPL').innerHTML = "*";
                                    document.getElementById("pwl").removeAttribute("readonly");
                                    document.getElementById("pwl").setAttribute("required", "");
                                    document.getElementById("pwd").setAttribute("required", "");
                                }

                            }
                        </script>
                        <div class="form-group">
                            <label for="">Password Lama<span id="wajibPL"></span></label>
                            <input id="pwl" type="password" readonly name="passwordLama" class="form-control">
                            <div class="form-text">Jika anda mengganti password baru, anda wajib mengisi password lama</div>
                        </div>
                    </div>
                    <div class="col-12 text-center">

                        <?php
                        if (isset($_SESSION['profile_alert']) && !isset($_POST['saveProfile']) || isset($_SESSION['profile_alert']) && !isset($_POST['btnUpdateFasilitas'])) {
                            echo $_SESSION['profile_alert'];
                        }
                        if (count($_POST) == 0) {
                            unset($_SESSION['profile_alert']);
                        }

                        ?>
                        <button type="submit" name="saveProfile" class=" btn btn-secondary mb-5">Simpan Perubahan Profile</button>

                    </div>
                </div>

            </form>

        </div>

    </div>
</div>
</div>
</div>