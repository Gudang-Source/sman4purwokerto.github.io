<?php 
 if(!isset($_SESSION)){session_start();}   
?>
<html>
<head>
<title>Bukti Pendaftaran</title>

<style type="text/css" media="print">
@page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    body 
    {
        background-color:#FFFFFF; 
        border: solid 1px black ;
        margin: 0px;  /* this affects the margin on the content before sending to printer */
   }
</style>
</head>
<?php      
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


 if(isset($_SESSION['no_sttb_psb'])){
 
 ?>

<body onload="printpage()">
<script type="text/javascript">
<!--

window.print();

//-->
</script>

<table align="left" style="border:0px;" width="700">	
<tr class="form"><td>
<table class="garis" align="left" style="border:1px;" width="700">	
<tr class="form"><td>
<table class="garis" >	
<tr class="form">
	<th  style="text-align: center"><img src="images/<?php echo $_SESSION['sekolah_logo']?>" border="0" width='80px'></th>
	<th style="text-align: center;line-height:120%;">
	Panitia Penerimaan Peserta Didik Baru<br>
	<span style="font-size:20pt;"><?php echo $_SESSION['sekolah_nama']?></span><br>
	<?php  echo $_SESSION['sekolah_alamat']?><br>Telepone : <?php  echo $_SESSION['sekolah_tlp']?>
	</th>
</tr>
<tr class="form">
	<th  style="text-align: center;line-height:20%;" colspan="2"><hr>
	</th>
</tr>
<tr class="form">
	<th  style="text-align: center" colspan="2">
		<table class="garis">	<tr class="form"><th class="garis" colspan="2" style="text-align: center">BUKTI PENDAFTARAN PSB ONLINE<hr></th></tr>
				<tr class="form" ><th  style="text-align: center"><table border="1" width='100px' height="150"><tr><td valign="middle" align="center">PAS FOTO<br>dilengkapi saat konfirmasi pendaftaran</td></tr></table></th><th valign="top" style="text-align: left">
				
			<table style="margin-left:10px">	
				<tr class="form"><td width="200"><b>No. Peserta Ujian Nasional</b></td><td>:</td><td><?php echo $_SESSION['no_sttb_psb']?></td></tr>
				<tr class="form"><td><b>Nama</b></td><td>:</td><td><?php echo $_SESSION['nama_psb'] ?></td></tr>
				<?php  if ($_SESSION['jk_psb']=='L'){ $jks="Laki-laki";}else {$jks="Perempuan";} ?>			
				<tr class="form"><td><b>Jenis Kelamin</b></td><td>:</td><td><?php echo $jks?></td></tr>
				<tr class="form"><td><b>Tempat, Taggal Lahir</b></td><td>:</td><td><?php echo $_SESSION['tmp_psb'] ?>,<?php echo $_SESSION['tgl_psb'] ?></td></tr>
				<tr class="form"><td><b>Asal <?php echo $_SESSION['Bsekolah']; ?></b></td><td>:</td><td><?php echo $_SESSION['sekolah_asal_psb'] ?></td></tr>
				<tr class="form"><td><b>Tanggal Pendaftaran</b></td><td>:</td><td><?php echo $_SESSION['tgldaf_psb'] ?></td></tr>				
			</table>	
		</th></tr>
		<tr class="form"><th  colspan="2" style="text-align: center"><br><br><hr>Bukti Pendaftaran ini harus dibawa saat daftar ulang<br>
			<br>TTD.<br><br>Admin<br><?php echo $_SESSION['urlweb'] ?>
		</th></tr>
		</table>	
	</th>
</tr></table>	
	</td>
</tr></table>
</td></tr><tr><td>
<br><br><br>
<script>var pfHeaderImgUrl = 'http://www.formulasi.or.id/favicon.ico';var pfHeaderTagline = 'Formulasi';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;margin:0 6px"  src="http://cdn.printfriendly.com/pf-print-icon.gif" width="16" height="15" alt="Print Friendly Version of this page" />Print <img style="border:none;margin:0 6px"  src="http://cdn.printfriendly.com/pf-pdf-icon.gif" width="12" height="12" alt="Get a PDF version of this webpage" />PDF</a>
	</td>
</tr></table>
<?php    
} else{
?>
<center><h1>Silahkan Lakukan Pendaftaran terlebih dahulu</h1></center>
<?php 
}
?>
</body>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>