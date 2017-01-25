
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahalumni");
			frmvalidator.addValidation("nama_alumni","req","Nama alumni harus diisi");
			frmvalidator.addValidation("nama_alumni","maxlen=30","Nama alumni maksimal 30 karakter");
			frmvalidator.addValidation("nama_alumni","minlen=3","Nama alumni minimal 3 karakter");
	  
			frmvalidator.addValidation("tahun_lulus","req","Anda belum memilih tahun lulus");
			frmvalidator.addValidation("tahun_lulus","numeric","Tahun lulus hanya boleh ditulis dengan angka");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			frmvalidator.addValidation("jk","selone","Anda belum memilih jenis kelamin");
			frmvalidator.addValidation("kode","req","Kode verifikasi harus diisi");
			//]]>
		</script>

<?php    
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
?>