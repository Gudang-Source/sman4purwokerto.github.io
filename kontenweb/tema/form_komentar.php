<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("formkomentar");
			frmvalidator.addValidation("nama","req","Nama harus diisi");
			frmvalidator.addValidation("nama","maxlen=30","Nama maksimal 30 karakter");
			frmvalidator.addValidation("nama","minlen=3","Nama minimal 3 karakter");
	  
			frmvalidator.addValidation("email","req","Email harus diisi");
			frmvalidator.addValidation("email","email","Format email salah");
			
			frmvalidator.addValidation("kode","req","Kode verifikasi harus diisi");
			
			frmvalidator.addValidation("komentar","req","Komentar harus diisi");
			frmvalidator.addValidation("komentar","minlen=5","Komentar minimal 5 karakter");
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