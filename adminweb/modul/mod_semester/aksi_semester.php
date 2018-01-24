<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passwordd'])){
	echo "<link href='../../../login.css' rel='stylesheet' type='text/css'>
			<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
}
else{
	include "../../../koneksi/koneksi.php";
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tsemester WHERE id_semester = '$_GET[id]'"));
	if ($data[aktif] == 'N'){
		mysql_query("UPDATE tsemester SET aktif = 'N'");
		mysql_query("UPDATE tsemester SET aktif = 'Y' WHERE id_semester = '$_GET[id]'");
	}
	else{
		mysql_query("UPDATE tsemester SET aktif = 'Y'");
		mysql_query("UPDATE tsemester SET aktif = 'N' WHERE id_semester = '$_GET[id]'");
	}
	header('location: ../../asfa.php?module=semester');
}
?>