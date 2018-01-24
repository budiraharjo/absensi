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
	
	// Hapus kelas
	if ($module=='kelas' AND $act=='hapus'){
		mysql_query("DELETE FROM tkelas WHERE id_kelas = '$_GET[id]'");
		header('location:../../asfa.php?module='.$module);
	}
	
	// Input kelas
	elseif ($module=='kelas' AND $act=='input'){
		mysql_query("INSERT INTO tkelas(kelas) VALUES('$_POST[kelas]')");
		header('location:../../asfa.php?module='.$module);
	}
	
	// Update kelas
	elseif ($module=='kelas' AND $act=='update'){
		mysql_query("UPDATE tkelas SET kelas = '$_POST[kelas]' WHERE id_kelas = '$_POST[id]'");
		header('location:../../asfa.php?module='.$module);
	}
}
?>