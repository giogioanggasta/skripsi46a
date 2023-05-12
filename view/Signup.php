<?php
include('../model/userModel.php');
include('../helper/flash_session.php');
?>

<!DOCTYPE html>

<head>
  <title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    @font-face {
      font-family: header;
      src: url("../fonts/Ailerons-Typeface.otf");
    }

    @font-face {
      font-family: texts;
      src: url("../fonts/Renner_ 400 Book.ttf");
    }

    @font-face {
      font-family: navBarFont;
      src: url("../fonts/Kiona-Regular.ttf");
      font-style: bold;
    }

    body {
      font-family: texts;
      color: white;
    }

    .login {
      margin-top: 2.5%;
      margin-left: 27.5%;
      float: left;
      text-align: center;
    }

    .loginbutton {
      width: 5%;
      background-color: white;
      border: none;
      color: white;
      padding: 14px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 8px 0;
      margin-left: 27.5%;
      margin-top: 7.5%;
      cursor: pointer;
      border-radius: 4px;
      transition: 0.5s;
    }

    .signupbutton {
      width: 5%;
      background-color: #11355b;
      border: none;
      color: black;
      padding: 14px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 8px 0;
      margin-left: 0%;
      margin-top: 7.5%;
      cursor: pointer;
      border-radius: 4px;
      transition: 0.5s;
    }

    .enterbutton {
      width: 20%;
      background-color: grey;
      border: none;
      color: white;
      padding: 14px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 8px 0;
      margin-left: 55%;
      margin-top: 6.5%;
      cursor: pointer;
      border-radius: 4px;
      transition: 0.5s;
    }

    .button {
      width: 82.5%;
      background-color: white;
      border: 1px solid #ccc;
      color: white;
      padding: 14px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 8px 0;
      cursor: pointer;
      border-radius: 4px;
      transition: 0.5s;
    }


    .button:hover {
      background-color: grey;
      transition: 0.5s;
    }

    h5 {
      font-family: navBarFont;
      font-size: 20px;
      color: white;
    }

    table {
      width: 50%;
      color: black;
      margin-left: 25%;
      margin-top: 2.5%;
    }

    table,
    tr,
    td {
      padding: 10px;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #11355b">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="Home.php"><img src="../images/logo46a.png" style="width:100px;"></a>

  </nav>

  <button onclick="location.href = 'Login.php'" class="loginbutton" style="color:black">Login</button>
  <button onclick="location.href = 'Signup.php'" class="signupbutton" style="color:white">Signup</button>

  <?php
  $userM = new UserModel();
  ?>
  <?php
  if (isset($_POST['enterBtn']) && !$_SESSION['signup_alert']) {

    // $nama, $jenisKelamin, $tanggalLahir, $noTelepon, $email, $password
    $userM->saveSignUp($_POST['nama'], $_POST['jenisKelamin'], $_POST['tanggalLahir'], $_POST['nomorTelepon'], $_POST['email'], $_POST['password']);
  }
  ?>
  <form method="post">

    <div class="signup">
      <table style="width:50%; color: black;">
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" placeholder="" required style="width: 25vh; height: 2.5vw; border: 1px solid #ccc;"></td>
          <td>E-mail</td>
          <td><input type="text" name="email" placeholder="" required style="width: 25vh; height: 2.5vw; border: 1px solid #ccc;"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td><select id="jenisKelamin" name="jenisKelamin" required style="width: 25vh; height: 2.5vw; border: 1px solid #ccc;">
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </td>
          <td>Password</td>
          <td><input type="password" name="password" placeholder="" required style="width: 25vh; height: 2.5vw; border: 1px solid #ccc;"></td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td>
            <form action="/action_page.php">
              <input type="date" id="tanggalLahir" name="tanggalLahir" required style="width: 25vh; height: 2.5vw; border: 1px solid #ccc;">
            </form>

          </td>
        </tr>
        <tr>
          <td>Nomor Telepon</td>
          <td><input type="text" name="nomorTelepon" placeholder="" style="width: 25vh; height: 2.5vw; border: 1px solid #ccc;"></td>
      </table>
    </div>

    <a class="w3-display-middle" style="color:black;float: center; margin-top: 15%; text-decoration: none;">Dengan menekan tombol Enter, anda setuju dengan <b>persyaratan penggunaan dan kebijakan privasi</b> dan menyetujui untuk menerima terkait informasi</a>

    <?php
    if (isset($_SESSION['signup_alert']) && !isset($_POST['enterBtn'])) {
      echo $_SESSION['signup_alert'];
      unset($_SESSION['signup_alert']);
    }
    ?>

    <button type="submit" value="" class="enterbutton" name="enterBtn">Enter</button>
  </form>


</body>

</html>