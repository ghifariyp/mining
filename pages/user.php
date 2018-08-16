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
            <h3 class="page-header">User Registration</h3>
        </div>
    <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="add_user.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add User</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data User
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                                $no = 1;
                                $sql = mysql_query("select * from user");
                                while($data = mysql_fetch_array($sql)){
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['nama_user']; ?></td>
                                    <td><?php echo $data['role']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><a href="edit_user.php?id=<?php echo $data['id'] ?>">
                                        <i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                                        <a href="../connection/delete_user.php?id=<?php echo $data['id'] ?>" onClick="return confirm('Apakah anda ingin menghapus data?')">
                                        <i class="glyphicon glyphicon-trash" title=Delete"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                                }
                            ?>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
</div>

<?php 
}else{ 
    echo '<script>alert("Anda harus login terlebih dahulu !");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../index.php">';
} 
?>