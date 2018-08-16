<?php
//panggil file config.php untuk menghubung ke server
include('config.php');
 
//tangkap data dari form
$username = $_POST['username'];
$nama = $_POST['nama_user'];
$password = md5($_POST['password']);
$role = $_POST['role'];
$status = $_POST['status'];
//$created_date = date('Y-m-d'); 
 
//simpan data ke database
$query = mysql_query("insert into user values('', '$username', '$nama', '$password', '$role', '$status')") 
		 or die(mysql_error());
 
if ($query) {
	echo '<script>alert("Create User Success !!");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../pages/user.php">';
}
?>
