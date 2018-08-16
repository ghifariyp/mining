<?php
    session_start();
    if(ISSET($_SESSION['username']) && ($_SESSION['role']=="Admin")){
    include('../connection/config.php');
    include('../layout/header.php');
    include('../layout/navbar.php');
    include('../layout/sidebar.php');
    include('../layout/footer.php');

    $id = $_GET['id']; 
    $query = mysql_query("select * from product where id='$id'") or die(mysql_error());
    $data = mysql_fetch_array($query);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit Product</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Edit Product
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="../connection/update_product.php" method="post">
                                <div class="form-group">
                                    <label hidden="hidden">Id</label>
                                    <input type="hidden" name="id" class="form-control" placeholder="Kode Barang" value="<?php echo $data['id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="kd_produk" class="form-control" placeholder="Kode Barang" value="<?php echo $data['kd_produk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Barang" value="<?php echo $data['nama_produk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stock" class="form-control" placeholder="Stok" value="<?php echo $data['stock'] ?>">
                                </div>
                                <div class="form-group">
                                	<label>Harga</label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" class="form-control" name="harga" placeholder="" value="<?php echo $data['harga'] ?>">         
                                </div>                  
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
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