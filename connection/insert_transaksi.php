<?php session_start();
include ("config.php");
$user = $_SESSION['username'];

//menangkap data yang dipostkan pembeli
$kd_produk	= $_POST['kd_produk'];
$harga		= $_POST['harga'] ;
$jumlah		= $_POST['jumlah'] ;
$count = count($kd_produk);
$tanggal_transaksi = date("Y-m-d H:i:s");
$no_transaksi = "TR".mt_rand(100000,999999); 

//perintah query insert ke table pemesanan
$sql = "insert into transaksi_detail (no_transaksi, kd_produk, harga, jumlah) values";
				
//perintah seleksi data pesanan kecuali yang 0 //
$seleksi="SELECT * FROM transaksi_detail WHERE jumlah <>'0' and no_transaksi='$no_transaksi'";

//perintah hapus row yang qty = 0 //
$hapusrow="DELETE FROM transaksi_detail WHERE jumlah='0'";


for( $i=0; $i < $count; $i++ )
{
    $sql .= "('$no_transaksi','{$kd_produk[$i]}','{$harga[$i]}','{$jumlah[$i]}')";
    $sql .= ",";
}
 
$sql = rtrim($sql,",");
//eksekusi query insert
$insert = mysql_query($sql);
// echo $sql;

if( !$insert )
{
    echo "gagal insert : $insert ";
}else{

//eksekusi hapus row yang qty = 0 //
	$hapus = mysql_query($hapusrow);

	//insert tabel transaksi
	$tanggal_transaksi = date("Y-m-d H:i:s");

	//perintah query insert ke table pemesanan
	$sql = "insert into transaksi values ('$no_transaksi', '$user', '$tanggal_transaksi')";
	$qry = mysql_query($sql);

	echo '<script>alert("Transaction Success !!");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../pages/add_transaksi.php">';
}