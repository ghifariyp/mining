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
            <h1 class="page-header">Transaksi</h1>
        </div>
    <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="add_transaksi.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Transaksi</a>
        </div>
    </div>

    <br/>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Transaksi
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Kode User</th>
                                <th>No Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                            $sql = mysql_query("select * from transaksi");
                            while($data = mysql_fetch_array($sql)){
                        ?>
                            <tr>
                                <td><?php echo $data['kd_user']; ?></td>
                                <td><?php echo $data['id_transaksi']; ?></td>
                                <td><?php echo $data['tanggal_transaksi']; ?></td>
                                <td><a href="detail_transaction.php?id_transaksi=<?php echo $data['id_transaksi'] ?>">
                                    <i class="glyphicon glyphicon-zoom-in" title="View Transaction"></i></a>
                                </td>
                            </tr>
                        <?php
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