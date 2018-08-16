<?php
include ('config.php');

$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama_user'];
$password = md5($_POST['password']);
$role = $_POST['role'];
$status = $_POST['status'];

$query = mysql_query("update user set username='$username', nama_user='$nama', password='$password', role='$role', 
					  status='$status' where id='$id'") or die();

if ($query) {
	echo '<script>alert("Data User telah di Update ! ");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../pages/user.php">';
} 	
?>