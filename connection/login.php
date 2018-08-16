<?php session_start(); 
include "config.php"; 
$username=$_POST['username']; 
$password=md5($_POST['password']);
$query=mysql_query("select * from user where username='$username' and password='$password'"); 
$cek=mysql_num_rows($query); 
echo "<pre>".$query."</pre>";
if(mysql_num_rows($query)==1){
	$sql = mysql_fetch_array($query);
	$_SESSION['id']=$sql['id'];
	$_SESSION['username']= $sql['username'];
	$_SESSION['status']=$sql['status'];
	$_SESSION['role']=$sql['role'];
	if($sql['status']=="Active"){
		echo '<meta http-equiv="Refresh" content="0; url=../pages/dashboard.php">';
	}
	else{
		echo '<script>alert("User Tidak tersedia !");</script>';
		echo '<meta http-equiv="Refresh" content="0; url=../index.php">';
	}
}else{
	echo '<script>alert("Username atau Password Salah !");</script>';
	echo '<meta http-equiv="Refresh" content="0; url=../index.php">';
	echo mysql_error(); 
} 
?> 
