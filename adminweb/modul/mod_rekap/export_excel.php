<?php
set_time_limit(1800);
$namaFile = "rekap-kelas".date('Y-m-d').".xls";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=$namaFile");
header("Content-Transfer-Encoding: binary ");

include "../../../koneksi/koneksi.php";
include "../../../fungsi/fungsi_indotgl.php";

$kelas = $_GET['idk'];

$kelas = mysql_fetch_array(mysql_query("SELECT * FROM tkelas WHERE id_kelas = '$kelas'"));
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
?>