<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passwordd'])){
	echo "<link href='../../../adminstyle.css' rel='stylesheet' type='text/css'>
			<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
}
else{
	include "../../../koneksi/koneksi.php";
	include "../../../fungsi/library.php";
	
	$module=$_GET['module'];
	$act=$_GET['act'];
	
	// Hapus user
	if ($module=='user' AND $act=='hapus'){
		mysql_query("DELETE FROM tuser WHERE id_user = '$_GET[id]'");
		header('location:../../asfa.php?module='.$module);
	}
	
	// Input user
	elseif ($module=='user' AND $act=='input'){
		$password = md5($_POST['password']);
		mysql_query("INSERT INTO tuser(username,password,nama_lengkap,last_login) VALUES('$_POST[username]','$password','$_POST[nama_lengkap]','')");
		header('location:../../asfa.php?module='.$module);
	}
	
	// Update user
	elseif ($module=='user' AND $act=='update'){
		if (!empty($_POST['password'])){
			$password = md5($_POST['password']);
			mysql_query("UPDATE tuser SET password = '$password',nama_lengkap='$_POST[nama_lengkap]' WHERE id_user = '$_POST[id]'");
			header('location:../../asfa.php?module='.$module);
		}
		else{
			mysql_query("UPDATE tuser SET nama_lengkap='$_POST[nama_lengkap]' WHERE id_user = '$_POST[id]'");
			header('location:../../asfa.php?module='.$module);
		}
	}
}
?>