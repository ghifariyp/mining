<?php
//panggil file config.php untuk menghubung ke server
include('config.php');
 
//tangkap data dari form
$kode = $_POST['kd_produk'];
$nm_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];
 
//simpan data ke database
$query = mysql_query("insert into product values('', '$kode', '$nm_produk', '$harga', '$stock')") or die(mysql_error());
// echo $query;
if ($query) {
	echo '<script>alert("Add Product Success !!");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../pages/add_product.php">';
}
?>
