<?php if(!isset($_SESSION)){session_start();} error_reporting(0); ?>
<center><p><p><img src="../images/loader.gif"><br>Mohon Tunggu ..!</center>
<?php 
include "../konfigurasi/koneksi.php";
mysql_connect ($SERVER, $NAMAUSER, $PASSWORDUSER) or die ("<h1>Tidak terkoneksi ke server</h1>");
mysql_select_db ($DATABASE) or die ("<h1><meta http-equiv='refresh' content='10; URL=index.php'><h1>Database tidak ditemukan</h1>"); 



unset($_SESSION['pra']);
$_SESSION['seo'] = seo;
//header('location:awal.php'); 

?>
<script language="javascript">
setTimeout("top.location.href = 'awal.php'",2500);
</script>
<?php

 
?>
 
