<?php   
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
				include "konfigurasi/koneksi.php";	
				$alamatsekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='12'");
				$a=mysql_fetch_array($alamatsekolah);
				
				$telp=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='9'");
				$te=mysql_fetch_array($telp);
				?>
				<b><a href="index.php" title="Kembali ke halaman utama"><?php    echo "$ns[isi_pengaturan]";?></a></b> | 
				<?php     echo "$a[isi_pengaturan] | Telp: $te[isi_pengaturan]";?>
<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>
