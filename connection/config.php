<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mining';
$connect = mysql_connect($host, $user, $pass) or die();
$db_select = mysql_select_db ($db, $connect) or die();
?>