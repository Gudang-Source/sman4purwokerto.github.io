<?php 
session_start();
unset($_SESSION['guru']);
unset($_SESSION['siswa']);
unset($_SESSION['lms']);
unset($_SESSION['nickname']);
unset($_SESSION['nickmail']);
unset($_SESSION['nickurl']);
unset($_SESSION['FORMULASI_UP']);
setcookie("userformulasi", "", time()+40);
setcookie("usermail", "", time()+40);
setcookie("userurl", "", time()+40);
header('location:../../index.php');
?>