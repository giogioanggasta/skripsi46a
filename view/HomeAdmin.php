<?php
include('../helper/flash_session.php');
include('../model/adminModel.php');

// if (isset($_SESSION['session_login'])) {
//   header('Location:HomeAdmin.php');
// }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
      /* color: white; */
    }

    .login {
      margin-top: 2.5%;
      margin-left: 27.5%;
      float: left;
      text-align: center;
    }

    .loginbutton {
      width: 5%;
      background-color: #183059;
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
      background-color: white;
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


    h5 {
      font-family: navBarFont;
      font-size: 20px;
      color: white;
    }

    .enterbutton {
      width: 82.5%;
      background-color: white;
      border: 1px solid #ccc;
      color: black;
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

    .enterbutton:hover {
      background-color: grey;
      transition: 0.5s;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #11355b">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="HomeAdmin.php"><img src="../images/logo46a.png" style="width:100px;"></a>

  </nav>

  <div class="container mt-5">
    <div class="row ">
      <div class="col-12 text-center mt-5">

        <?php
        if (isset($_SESSION['admin_session_login'])) {
        ?>
          <h5 style="font-weight:bold; color: #11355b">
            Selamat Datang di Halaman Management Administration <form method="post"><button type="submit" name="logOutAdmin" class="btn"><i style="font-size:30px;" class=" bi bi-box-arrow-right"></i> Keluar Akun</button></form>
          </h5>
          <div class="row">
            <div class="col-lg-4 col-sm-12 mt-3">
              <a class="btn text-white btn-lg shadow-lg" style="background-color:#11355b;" href="Kelola.php"><i class="bi bi-pencil-square" style="font-size:100px;"></i><br> Kelola</a>
            </div>
            <div class="col-lg-4 col-sm-12 mt-3">

              <a class="btn text-white btn-lg shadow-lg" style="background-color:#11355b;" href="Laporan.php"><i class="bi bi-clipboard2-data" style="font-size:100px;"></i><br> Laporan</a>
            </div>
            <div class="col-lg-4 col-sm-12 mt-3">
              <a class="btn text-white btn-lg shadow-lg" style="background-color:#11355b;" href="Data.php"><i class="bi bi-bar-chart-line" style="font-size:100px;"></i><br> Data</a>
            </div>
          </div>
        <?php
        } else {
        ?>
          <h5 style="font-weight:bold; color: #11355b">
            Selamat Datang di Halaman Login Administration
          </h5>
          <form method="post">

            <fieldset style="width:100%">
              <div class="isi">
                <br>
                <input type="email" name="email" placeholder="E-mail" style="width: 70vh; height: 2.5vw; border: 1px solid #ccc; padding: 12px; color: black">
                <br><br>
                <input type="password" name="password" placeholder="Password" style="width: 70vh; height: 2.5vw; border: 1px solid #ccc; padding: 6px; color: black">
                <br>
                <?php
                if (isset($_SESSION['admin_login_alert']) && !isset($_POST['enterBtnLoginAdmin'])) {
                  echo $_SESSION['admin_login_alert'];
                  unset($_SESSION['admin_login_alert']);
                }
                ?>
                <br>
                <button type="submit" class="enterbutton" name="enterBtnLoginAdmin">Login</button>
              </div>
            </fieldset>

          </form>

        <?php
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>