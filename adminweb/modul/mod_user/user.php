<?php
$aksi = "modul/mod_user/aksi_user.php";
switch($_GET[act]){
	default:
	echo "<h3>Manajemen User</h3>";
	echo "<input type=button value='Tambah User' onclick=\"window.location.href='?module=user&act=tambahuser';\">";
	echo "<table border=1>
			<tr>
				<th><font face=tahoma size=2>No</font></th><th><font face=tahoma size=2>Username</font></th><th><font face=tahoma size=2>Password</font></th><th><font face=tahoma size=2>Nama Pengguna</font></th><th><font face=tahoma size=2>Aksi</font></th>
			</tr>";
	$sql = mysql_query("SELECT * FROM tuser ORDER BY username ASC");
	$no =1;
	while($data = mysql_fetch_array($sql)){
	?>
		<tr>
			<td><font face=tahoma size=2><?php echo $no;?></font></td><td><font face=tahoma size=2><?php echo $data[username]; ?></font></td><td><font face=tahoma size=2><?php echo $data[password]; ?></font></td>
			<td><font face=tahoma size=2><?php echo $data[nama_lengkap]; ?></font></td><td><font face=tahoma size=2><a href='?module=user&act=updateuser&id=<?php echo $data[id_user]; ?>'><img src='../images/update.png' title='Update <?php echo $data[username]; ?>'></a> | <a href="<?php echo $aksi; ?>?module=user&act=hapus&id=<?php echo $data[id_user]; ?>" onclick="return confirm('Anda yakin ingin menghapus User <?php echo $data[username]; ?>?');"><img src='../images/hapus.png' title='Hapus <?php echo $data[username]; ?>'> </a></font></td>
		</tr>
	<?php
		$no++;		
	}
	echo "</table>";
			
	break;
	
	case "tambahuser":
	echo "<h3>Tambah User</h3>";
	echo "	<form method=POST action=$aksi?module=user&act=input>
			<table border=1>
				<tr><td><font face=tahoma size=2>Nama Pengguna</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='nama_lengkap'></td></tr>
				<tr><td><font face=tahoma size=2>Username</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='username'></td></tr>
				<tr><td><font face=tahoma size=2>Password</font></td><td><font face=tahoma size=2>:</font></td><td><input type='password' name='password'></td></tr>
				<tr><td><input type=submit value=Simpan></td></tr>
			</table>
			</form>";
	break;
	
	case "updateuser":
	$data = mysql_fetch_array(mysql_query("SELECT * FROM tuser WHERE id_user = '$_GET[id]'"));
	echo "<h3>Ubah User</h3>";
	echo "<form method=POST action=$aksi?module=user&act=update>
			<input type=hidden name=id value='$_GET[id]'>
			<table border=1>
				<tr><td><font face=tahoma size=2>Nama Pengguna</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='nama_lengkap' value='$data[nama_lengkap]'></td></tr>
				<tr><td><font face=tahoma size=2>Username</font></td><td><font face=tahoma size=2>:</font></td><td><input type='text' name='username' value='$data[username]' disabled></td></tr>
				<tr><td><font face=tahoma size=2>Password</font></td><td><font face=tahoma size=2>:</font></td><td><input type='password' name='password'></td></tr>
				<tr><td><input type=submit value=Simpan></td></tr>
			</table>
			</form>";
	break;
}
?>