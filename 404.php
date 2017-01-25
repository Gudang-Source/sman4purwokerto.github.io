<?php if(!isset($_SESSION)){session_start();}  error_reporting(0);?>
<!DOCTYPE HTML>
<html>
<head>
<title>Halaman Tidak Ditemukan</title>
<script language="javascript">
setTimeout("top.location.href = '<?php echo $_SESSION[urlweb] ; ?>'",5000);
</script>
</head>
<body>
<h1>404 Halaman Tidak Ditemukan</h1>

CMS Formulasi
</body>
</html>