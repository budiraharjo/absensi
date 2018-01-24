<?php
error_reporting(0);
session_start();
include "../koneksi/koneksi.php";
include "../fungsi/library.php";
include "../fungsi/class_paging.php";
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/fungsi_combobox.php";

// Bagian Home
if ($_GET['module']=='home'){
	echo "<h2>Selamat Datang</h2><br><br>
			<p>Hai <b>$_SESSION[nama_lengkap]</b>, selamat datang di halaman Administrator Sistem Absensi.<br> 
			Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website. </p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			
			<p align=right>Login : $hari_ini, ";
			echo tgl_indo(date("Y m d")); 
			echo " | "; 
			echo date("H:i:s");
			echo " WIB</p>";
}

// Bagian Siswa
elseif ($_GET['module']=='siswa'){
	include "modul/mod_siswa/siswa.php";
}

// Bagian kelas
elseif ($_GET['module']=='kelas'){
	include "modul/mod_kelas/kelas.php";
}

// Bagian semester
elseif ($_GET['module']=='semester'){
	include "modul/mod_semester/semester.php";
}

// Bagian rekap
elseif ($_GET['module']=='rekap'){
	include "modul/mod_rekap/rekap.php";
}

// Bagian absensi
elseif ($_GET['module']=='absen'){
	include "modul/mod_absen/absen.php";
}

// Bagian User
elseif ($_GET['module']=='user'){
	include "modul/mod_user/user.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
