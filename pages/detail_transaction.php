<?php
    session_start();
    if(ISSET($_SESSION['username']) && ($_SESSION['role']=="Admin")){
    include('../connection/config.php');
    include('../layout/header.php');
    include('../layout/navbar.php');
    include('../layout/sidebar.php');
    include('../layout/footer.php');

    $id_transaksi = $_GET['id_transaksi']; 
    $query = mysql_query("select * from transaksi where id_transaksi='$id_transaksi'") or die(mysql_error());
    $data = mysql_fetch_array($query);
    //print_r($data);
    $query = mysql_query("SELECT sum(harga*jumlah) as Total FROM transaksi_detail where no_transaksi = '$id_transaksi'");
    $total = mysql_fetch_array($query);
    //var_dump($total);   
?>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Detail Transaksi</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
     <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <table>
                            <tr>
                                <td width="60%"><label>Nama Kasir</label></td>
                                <td width="10%">:</td>
                                <td><?php echo $data['kd_user']; ?></td>
                            </tr>
                            <br/>
                            <tr>
                                <td><label>No Transaksi</label></td>
                                <td>:</td>
                                <td> <?php echo $data['id_transaksi']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <form action="../connection/insert_transaksi.php" method="post">
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nama Product</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>

                            <?php
                                // $total = 0;
                                $query = mysql_query("SELECT a.tanggal_transaksi as tanggal, c.nama_produk as produk, b.harga                  as harga, b.jumlah as jumlah
                                                        FROM transaksi a
                                                      INNER JOIN transaksi_detail b on b.no_transaksi = a.id_transaksi 
                                                      INNER JOIN product c ON c.kd_produk = b.kd_produk  
                                                      WHERE b.no_transaksi='$id_transaksi'") or die(mysql_error());
                                while($data = mysql_fetch_array($query)){
                                //print_r($data);
                                $subtotal = $data['harga'] * $data['jumlah'];
                                
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $data['tanggal']; ?></td>
                                    <td><?php echo $data['produk']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['jumlah']; ?></td>
                                    <td><?php echo $subtotal; ?></td>
                                </tr>
                            </tbody>
                            <?php
                                }                              
                            ?>

                            <tfoot>
                                <tr>
                                    <td colspan="4"><b>Total</b></td>
                                    <td><?php echo $total['Total']; ?></td>
                                </tr>
                            </tfoot>

                               
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                </form>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<?php 
}else{ 
    echo '<script>alert("Anda harus login terlebih dahulu !");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../index.php">';
} 
?>