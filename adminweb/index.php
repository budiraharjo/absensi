<?php
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])){
	echo "<script language='javascript'>alert('Login terlebih dahulu untuk melakukan konten manajemen');
					window.location = '../login.php'</script>";
}
else{
	header('location: Contohphp?module=home');
}
?>