<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
	echo "<script language='javascript'>alert('Login terlebih dahulu untuk melakukan konten manajemen');
					window.location = '../login.php'</script>";
}
else{
?>
<html>
<head>
	<title> Asfa Comp. Web Absen Application System Ver. 1.0.</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link type="text/css" href="../js/development-bundle/themes/base/ui.all.css" rel="stylesheet" />   

    <script type="text/javascript" src="../js/development-bundle/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../js/development-bundle/ui/ui.core.js"></script>
    <script type="text/javascript" src="../js/development-bundle/ui/ui.datepicker.js"></script>   
    <script type="text/javascript" src="../js/development-bundle/ui/i18n/ui.datepicker-id.js"></script>
</head>
<body>
<div id="page">
	<div id="page-in">
		<div id="header">
			<div id="header-info">
				<h1><a href="Contohblogspot.com">CURI CARA</a></h1>
				<div class="description">Administrator System</div>
			</div>
	  </div>
		
		<div id="main">
		  <div class="sidebar">
				
			<div class="sidebar-box">
				
			  <h3>Menu Utama</h3>
				<ul>
					<li><a href="?module=home">Home</a></li>
					<li><a href="?module=user">Manajemen User</a></li>
					<li><a href="?module=siswa">Manajemen Siswa</a></li>
					<li><a href="?module=semester">Manajemen Semester</a></li>
					<li><a href="?module=kelas">Manajemen Kelas</a></li>
					<li><a href="?module=absen">Absensi</a></li>
					<li><a href="?module=rekap">Rekap</a></li>
					<li><a href="logout.php">Logout</a>		  </li>
				</ul>
			</div>
		  </div>
		  <div id="content">
            <div class="post">
		<div class="post-title">
			<br>
			<?php include "content.php"; ?>
			
		</div>
	</div>
</div>
</div>
</div>

<div id="footer">System informasi Absensi dengan php dan mysql</div>
</div>
</div>
</body>
</html>
<?php
}
?>