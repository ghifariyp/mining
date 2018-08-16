<?php
include('config.php');
 
$id = $_GET['id'];
 
$query = mysql_query("delete from user where id='$id'") or die(mysql_error());

if ($query) {
    echo '<meta http-equiv="Refresh" content="0; url=../pages/user.php">';
}
?>