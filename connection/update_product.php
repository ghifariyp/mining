<?php
include ('config.php');

$id = $_POST['id'];
$kd_brg = $_POST['kd_produk'];
$nm_brg = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];

$query = mysql_query("update product set kd_produk='$kd_brg', nama_produk='$nm_brg', harga='$harga', stock='$stock' 
					  where id='$id'") or die();

if ($query) {
	echo '<script>alert("Data berhasil di Update ! ");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../pages/product.php">';
} 	
?>