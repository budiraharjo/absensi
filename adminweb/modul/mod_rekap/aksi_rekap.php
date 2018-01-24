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
	
	// Hapus Absen
	if ($module=='absen' AND $act=='hapus'){
		mysql_query("DELETE FROM tabsen WHERE id_absen = '$_GET[id]'");
		header('location:../../asfa.php?module='.$module);
	}
	
	// Input Absen
	elseif ($module=='absen' AND $act=='input'){
		$data = mysql_fetch_array(mysql_query("SELECT * FROM tsemester WHERE aktif = 'Y'"));
		$numrows = mysql_num_rows(mysql_query("SELECT * FROM tabsen WHERE nis = '$_POST[nis]' AND id_semester = '$data[id_semester]' AND tanggal = '$_POST[tanggal]'"));
		$numrowsNis = mysql_num_rows(mysql_query("SELECT * FROM tsiswa WHERE nis = '$_POST[nis]'"));
				
		if ($numrows > 0){
			echo "<script language='javascript'>alert('Data Absen sudah dimasukkan sebelumnya.');
						window.location = '../../asfa.php?module=$module'</script>";
		}
		else{
			if ($numrowsNis > 0){
				mysql_query("INSERT INTO tabsen(nis,id_semester,tanggal,keterangan) VALUES('$_POST[nis]','$data[id_semester]','$_POST[tanggal]','$_POST[keterangan]')");
				header('location:../../asfa.php?module='.$module);
			}
			else{
				echo "<script language='javascript'>alert('Data NIS tidak terdaftar.');
						window.location = '../../asfa.php?module=$module'</script>";
			}
		}
	}
	
	// Update kelas
	elseif ($module=='kelas' AND $act=='update'){
		mysql_query("UPDATE tkelas SET kelas = '$_POST[kelas]' WHERE id_kelas = '$_POST[id]'");
		header('location:../../asfa.php?module='.$module);
	}
}
?>