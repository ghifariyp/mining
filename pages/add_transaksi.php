<?php
    session_start();
    if(ISSET($_SESSION['username'])){
    include('../connection/config.php');
    include('../layout/header.php');
    include('../layout/navbar.php');
    include('../layout/sidebar.php');
    include('../layout/footer.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Form Transaksi</h2>
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
                                <td width="50%"><label>Nama Kasir</label></td>
                                <td width="10%">:</td>
                                <td><?php echo $_SESSION['username']; ?></td>
                            </tr>
                            <br/>
                            <tr>
                                <td><label>Tanggal Transaksi </label></td>
                                <td>:</td>
                                <td> <?php echo date('d-m-Y H:m:s'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <form action="../connection/insert_transaksi.php" method="post">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th hidden="hidden"></th>
                                    <th>Nama Product</th>
                                    <th>Stock</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <?php
                                $no = 1;
                                $query = mysql_query("select * from product");
                                while($data = mysql_fetch_array($query)){
                            ?>
                                <tr>
                                    <td hidden="hidden"><?php echo $data['kd_produk']; ?><input type="hidden" name="kd_produk[]" value="<?php echo $data['kd_produk']; ?>"></td>
                                    <td><?php echo $data['nama_produk']; ?></td>
                                    <td><?php echo $data['stock']; ?></td>
                                    <td><?php echo $data['harga']; ?><input type="hidden" name="harga[]" value="<?php echo $data['harga']; ?>"></td>
                                    <td><input type="text" name="jumlah[]" size="30"></td>
                                </tr>

                            <?php
                                $no++;
                                }
                            ?>
                               
                            
                        </table>
                        <!-- /.table-responsive -->
                        <button type="submit" class="btn btn-primary">Submit</button>
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