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
            <h3 class="page-header">Product</h3>
        </div>
    <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="add_product.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Product</a>
        </div>
    </div>

    <br/>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Product
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th hidden="hidden">No</th>
                                <th>Kode Product</th>
                                <th>Nama Product</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                            $no = 1;
                            $query = mysql_query("select * from product");
                            while($data = mysql_fetch_array($query)){
                        ?>
                            <tr>
                                <td hidden="hidden"><?php echo $no; ?></td>
                                <td><?php echo $data['kd_produk']; ?></td>
                                <td><?php echo $data['nama_produk']; ?></td>
                                <td><?php echo $data['stock']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td><a href="edit_product.php?id=<?php echo $data['id'] ?>">
                                    <i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                                    <a href="../connection/delete_product.php?id=<?php echo $data['id'] ?>" onClick="return confirm('Apakah anda ingin menghapus data?')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
                                </td>
                            </tr>

                        <?php
                            $no++;
                            }
                        ?>
                           
                        
                    </table>
                    <!-- /.table-responsive -->
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