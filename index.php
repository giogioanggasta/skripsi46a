
<?php

//check session
session_start();

if (!isset($_SESSION['idUser'])) {
    header("location: view/Login.php", true, 301);
    exit();
} else {
    header("location: view/Home-logged.php", true, 301);
    exit();
}
