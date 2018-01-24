<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passwordd'])){
	echo "<link href='../../../login.css' rel='stylesheet' type='text/css'>
			<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
}
else{
	include "../../../koneksi/koneksi.php";
	include "../../../fungsi/library.php";
	
	$module=$_GET['module'];
	$act=$_GET['act'];
	
	// Hapus Siswa
	//if ($module=='kelas' AND $act=='hapus'){
	//	mysql_query("DELETE FROM tkelas WHERE id_kelas = '$_GET[id]'");
	//	header('location:../../asfa.php?module='.$module);
	//}
	
	// Input Siswa
	if ($module=='siswa' AND $act=='input'){
		$numrows = mysql_num_rows(mysql_query("SELECT nis FROM tsiswa WHERE nis = '$_POST[nis]'"));
		$tgl_lahir = $_POST[thn_lahir]."-".$_POST[bln_lahir]."-".$_POST[tgl_lahir];
		if ($numrows > 0){
			echo "<script language='javascript'>alert('NIS sudah ada, cek kembali');
					window.location = '../../asfa.php?module=$module'</script>";
		}
		else{
			mysql_query("INSERT INTO tsiswa(nis,nama,alamat,tempat_lahir,tanggal_lahir,aktif,email,telp,hp,id_kelas)
							VALUES('$_POST[nis]','$_POST[nama]','$_POST[alamat]','$_POST[tmp_lahir]','$tgl_lahir','$_POST[aktif]','$_POST[email]','$_POST[telp]','$_POST[hp]','$_POST[kelas]')");
			header('location:../../asfa.php?module='.$module);
		}
	}
	
	// Update siswa
	elseif ($module=='siswa' AND $act=='update'){
		$numrows = mysql_num_rows(mysql_query("SELECT nis FROM tsiswa WHERE nis = '$_POST[nis_ubah]'"));
		$tgl_lahir = $_POST[thn_lahir]."-".$_POST[bln_lahir]."-".$_POST[tgl_lahir];
		if ($numrows > 0){
			echo "<script language='javascript'>alert('NIS sudah ada, cek kembali');
					window.location = '../../asfa.php?module=siswa&act=update&nis=$nis'</script>";
		}
		else{
			mysql_query("UPDATE tsiswa SET 	nama = '$_POST[nama]',
											alamat = '$_POST[alamat]',
											tempat_lahir = '$_POST[tmp_lahir]',
											tanggal_lahir = '$tgl_lahir',
											aktif = '$_POST[aktif]',
											email = '$_POST[email]',
											telp = '$_POST[telp]',
											hp = '$_POST[hp]',
											id_kelas = '$_POST[kelas]'
											WHERE nis = '$_POST[nis]'");
			header('location:../../asfa.php?module='.$module);
		}
	}
}
?>