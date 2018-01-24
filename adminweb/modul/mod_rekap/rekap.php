<?php
$aksi = "modul/mod_absen/aksi_absen.php";
switch($_GET[act]){
	default:
	echo "<h3>Rekap Absensi</h3>";
	echo "<body style='font-size:65%;'>
		<form method=POST action=?module=rekap>
		<table border=1>
			<tr><td><font face=tahoma size=2>Pilih Kelas</font></td><td><font face=tahoma size=2>:</font></td><td><select name=kelas>";
			$sql = mysql_query("SELECT * FROM tkelas ORDER BY id_kelas ASC");
			while ($data = mysql_fetch_array($sql)){
				echo "<option value=$data[id_kelas]>$data[kelas]</option>";
			}
	echo "</select></td></tr>
		 <tr><td colspan=2></td><td><input type=submit value=Go name=Go></td></tr>
	</table>
	</form></body>";
	
	echo "<p>&nbsp;</p>";
	if(isset($_POST['Go'])){
		$semester = mysql_fetch_array(mysql_query("SELECT * FROM tsemester WHERE aktif = 'Y'"));
		$numrows = mysql_num_rows(mysql_query("SELECT * FROM tabsen,tsiswa WHERE id_semester = '$semester[id_semester]' AND id_kelas = '$_POST[kelas]'
		AND tsiswa.nis = tabsen.nis"));
		
		if($numrows > 0){
			$kelas = mysql_fetch_array(mysql_query("SELECT * FROM tkelas WHERE id_kelas = '$_POST[kelas]'"));
			$semester = mysql_fetch_array(mysql_query("SELECT * FROM tsemester WHERE aktif = 'Y'"));
			echo "<b>Kelas : $kelas[kelas]</b> <br> Semester : $semester[id_semester]";
			echo "<table border=1>
					<tr>
						<th><font face=tahoma size=2>No</font></th><th><font face=tahoma size=2>NIS</font></th><th><font face=tahoma size=2>Nama Siswa</font></th><th><font face=tahoma size=2>S</font></th><th><font face=tahoma size=2>I</font></th><th><font face=tahoma size=2>A</font></th><th><font face=tahoma size=2>H</font></th>
					</tr>";
			$sql = mysql_query("SELECT tsiswa.nis, tsiswa.nama, tabsen.keterangan, tabsen.id_absen FROM tsiswa LEFT JOIN tabsen ON tsiswa.nis = tabsen.nis GROUP BY tabsen.nis");
			$no = 1;
			while ($data = mysql_fetch_array($sql)){
				$h = mysql_num_rows(mysql_query("SELECT id_absen FROM tabsen WHERE nis = '$data[nis]' AND id_semester = '$semester[id_semester]' AND keterangan = 'H'"));
				$s = mysql_num_rows(mysql_query("SELECT id_absen FROM tabsen WHERE nis = '$data[nis]' AND id_semester = '$semester[id_semester]' AND keterangan = 'S'"));
				$i = mysql_num_rows(mysql_query("SELECT id_absen FROM tabsen WHERE nis = '$data[nis]' AND id_semester = '$semester[id_semester]' AND keterangan = 'I'"));
				$a = mysql_num_rows(mysql_query("SELECT id_absen FROM tabsen WHERE nis = '$data[nis]' AND id_semester = '$semester[id_semester]' AND keterangan = 'A'"));
				
				echo "<tr>
						<td><font face=tahoma size=2>$no</font></td><td><font face=tahoma size=2>$data[nis]</font></td><td><font face=tahoma size=2>$data[nama]</font></td><td align=center><font face=tahoma size=2>$s</font></td><td align=center><font face=tahoma size=2>$i</font></td><td align=center><font face=tahoma size=2>$a</font></td><td align=center><font face=tahoma size=2>$h</font></td>
						</tr>";
				$no++;
			}
			echo "</table><br>";
			echo "<a href='modul/mod_rekap/export_excel.php?idk=$_POST[kelas]'><img src='../images/excel.png'> Download</a>";
		}
		else{
			echo "Hasil: <b>Data tidak ditemukan.</b>";
		}
	}
			
	break;
	
	case "tambahabsen":
	echo "<h3>Tambah Absen</h3>";
	echo "	<body style='font-size:65%;'><form method=POST action=$aksi?module=absen&act=input>
			<table border=1>
				<tr><td><font face=tahoma size=2>NIS</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='nis' size=32></td></tr>
				<tr><td><font face=tahoma size=2>Tanggal</font></td><td><font face=tahoma size=2>:</font></td><td><input id='tanggal' type='text' name='tanggal' size=32> </td></tr>
				<tr><td><font face=tahoma size=2>Keterangan</font></td><td><font face=tahoma size=2>:</font></td>
				<td><font face=tahoma size=2><input type='radio' name='keterangan' value='H'> Hadir 
				<input type='radio' name='keterangan' value='S'> Sakit 
				<input type='radio' name='keterangan' value='I'> Izin
				<input type='radio' name='keterangan' value='A'> Alpha 
				</font></td></tr>
				<tr><td><input type=submit value=Simpan></td></tr>
			</table>
			</form></body>";
	break;
	
	case "updatekelas":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tkelas WHERE id_kelas = '$_GET[id]'"));
	echo "<h3>Ubah Kelas</h3>";
	echo "	<form method=POST action=$aksi?module=kelas&act=update>
			<input type=hidden name=id value=$data[id_kelas]>
			<table border=1>
				<tr><td><font face=tahoma size=2>ID Kelas</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='kelas' value='$data[id_kelas]' disabled></td></tr>
				<tr><td><font face=tahoma size=2>Nama Kelas</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='kelas' value='$data[kelas]'></td></tr>
				<tr><td><input type=submit value=Update></td></tr>
			</table>
			</form>";
	break;
}
?>