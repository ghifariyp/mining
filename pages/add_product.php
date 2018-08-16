<?php
    session_start();
    if(ISSET($_SESSION['username']) && ($_SESSION['role']=="Admin")){
    include('../connection/config.php');
    include('../layout/header.php');
    include('../layout/navbar.php');
    include('../layout/sidebar.php');
    include('../layout/footer.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add Product</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Product
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="../connection/insert_product.php" method="post">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="kd_produk" class="form-control" placeholder="Kode Barang" >
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stock" class="form-control" placeholder="Stok">
                                </div>
                                <div class="form-group">
                                	<label>Harga</label>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" class="form-control" name="harga" placeholder="">         
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