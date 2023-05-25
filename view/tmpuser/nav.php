<body>


  <div class="w3-bar w3-white w3-border " id="menu" style="background-color: #11355b">
    <a href="Home.php" class="w3-bar-item"><img src="../images/logo46a.png" style="width:150px"></a>

    <?php
    if (isset($_SESSION['session_login'])) {
    ?>
      <a href="#" onclick="logOut()" class="w3-bar-item" style="float: right; margin-right: 2.5%; margin-top:4%; text-decoration: none;"><img src="../images/logout.png" style="width:30px"></a>

      <script>
        function logOut() {

          if (confirm('Yakin ingin log out?')) {
            window.location.href = "Home.php?logOut=true";
          }

        }
      </script>

      <a href="Profile.php" class="w3-bar-item" style="float: right; margin-right: 2.5%; margin-top:4%; text-decoration: none;">
        <!-- <img src="../images/user.png" style="width:30px">  -->
        Hai, <?= ($_SESSION['session_login']->namaUser) ?></a>

    <?php
    } else {
    ?>
      <a href="Login.php" class="w3-bar-item" style="float: right; margin-top:4%; margin-right: 2.5%; text-decoration: none; color: white">Login</a>
    <?php
    }
    ?>




    <a href="Fasilitas.php" class="w3-bar-item" style="float: right; margin-top:4%; margin-right: 2.5%; text-decoration: none; color: white">Fasilitas</a>
    <a href="Kamar.php" class="w3-bar-item" style="float: right; margin-top:4%; margin-right: 2.5%; text-decoration: none; color: white">Kamar</a>
    <a href="Pesanan.php" class="w3-bar-item" style="float: right; margin-top:4%; margin-right: 2.5%; text-decoration: none; color: white">Pesanan</a>
  </div>
  <br><br>