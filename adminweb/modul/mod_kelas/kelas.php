<?php
$aksi = "modul/mod_kelas/aksi_kelas.php";
switch($_GET[act]){
	default:
	echo "<h3>Manajemen Kelas</h3>";
	echo "<input type=button value='Tambah Kelas' onclick=\"window.location.href='?module=kelas&act=tambahkelas';\">";
	echo "<table border=1>
			<tr>
				<th><font face=tahoma size=2>No</font></th><th><font face=tahoma size=2>ID Kelas</font></th><th><font face=tahoma size=2>Nama Kelas</font></th><th><font face=tahoma size=2>Aksi</font></th>
			</tr>";
	$sql = mysql_query("SELECT * FROM tkelas ORDER BY kelas ASC");
	$no =1;
	while($data = mysql_fetch_array($sql)){
	?>
		<tr>
			<td><font face=tahoma size=2><?php echo $no;?></font></td><td><font face=tahoma size=2><?php echo $data[id_kelas]; ?></font></td><td><font face=tahoma size=2><?php echo $data[kelas]; ?></font></td>
			<td><font face=tahoma size=2><a href='?module=kelas&act=updatekelas&id=<?php echo $data[id_kelas]; ?>'><img src='../images/update.png' title='Update <?php echo $data[kelas]; ?>'></a> | <a href="<?php echo $aksi; ?>?module=kelas&act=hapus&id=<?php echo $data[id_kelas]; ?>" onclick="return confirm('Anda yakin ingin menghapus Kelas <?php echo $data[kelas]; ?>?');"><img src='../images/hapus.png' title='Hapus <?php echo $data[kelas]; ?>'> </a></font></td>
		</tr>
	<?php
		$no++;		
	}
	echo "</table>";
			
	break;
	
	case "tambahkelas":
	echo "<h3>Tambah Kelas</h3>";
	echo "	<form method=POST action=$aksi?module=kelas&act=input>
			<table border=1>
				<tr><td><font face=tahoma size=2>Nama Kelas</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='kelas'></td></tr>
				<tr><td><input type=submit value=Simpan></td></tr>
			</table>
			</form>";
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