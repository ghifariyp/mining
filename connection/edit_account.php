<?php
include ('config.php');

$id = $_POST['id'];
$password = md5($_POST['password']);

$query = "update user set password='$password' where id='$id'";
$qry = mysql_query($query);
echo $qry;

if ($qry) {
	echo '<script>alert("Account has Changed ! ");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../pages/account_setting.php">';
} 	
?>