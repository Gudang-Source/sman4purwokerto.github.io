<!DOCTYPE HTML>
<?php  include "../konfigurasi/koneksi.php"; ?>
<html>
<head>
<title>Formulasi CMS Admin</title>
<link rel="stylesheet" type="text/css" href="css/gaya.css">



    <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<style type="text/css">
		.labelfrm {
			display:block;
			font-size:small;
			margin-top:5px;
		}
		.error {
			font-size:small;
			color:red;
		}
		</style>


 		<script type="text/javascript">
			jQuery(document).ready(function() {
			
			    jQuery.validator.addMethod(
				'ContainsAtLeastOneDigit',
				function (value) { 
				    return /[0-9]/.test(value); 
				},  
				'Your password must contain at least one digit.'
			    );  
			
			    jQuery.validator.addMethod(
				'ContainsAtLeastOneCapitalLetter',
				function (value) { 
				    return /[A-Z]/.test(value); 
				},  
				'Your password must contain at least one capital letter.'
			    );
			
			    var Validator = jQuery('#editpassword').validate({
				rules: {
				    'password': { // this is from the name="password" attribute, not id="password-id" attribute
					required: true,
					rangelength: [6, 14],
					ContainsAtLeastOneDigit: true,
					ContainsAtLeastOneCapitalLetter: true
				    },
				    'password2': { // this is from the name="password2" attribute, not id="password2-id" attribute
					required: true,
					equalTo: '#password2-id'
				    }
				}
			    });
			
			});
 			
		
		</script>
		

</head>