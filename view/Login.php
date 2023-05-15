<?php
include('../helper/flash_session.php');
include('../model/userModel.php');

if (isset($_SESSION['session_login'])) {
  header('Location:Home.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Sign In</title>
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
    <a class="navbar-brand" href="Home.php"><img src="../images/logo46a.png" style="width:100px;"></a>

  </nav>

  <button onclick="location.href = 'Login.php'" class="loginbutton" style="color:white">Login</button>
  <button onclick="location.href = 'Signup.php'" class="signupbutton" style="color:black">Signup</button>
  <form method="post">

    <div class="login">
      <fieldset style="width:120%">
        <div class="isi">
          <br>
          <input type="email" name="email" placeholder="E-mail" style="width: 70vh; height: 2.5vw; border: 1px solid #ccc; padding: 12px; color: black">
          <br><br>
          <input type="password" name="password" placeholder="Password" style="width: 70vh; height: 2.5vw; border: 1px solid #ccc; padding: 6px; color: black">
          <br>
          <?php
          if (isset($_SESSION['login_alert']) && !isset($_POST['enterBtnLogin'])) {
            echo $_SESSION['login_alert'];
            unset($_SESSION['login_alert']);
          }
          ?>
          <br>
          <button type="submit" class="enterbutton" name="enterBtnLogin">Login</button>
        </div>
      </fieldset>
    </div>
  </form>


</body>

</html>