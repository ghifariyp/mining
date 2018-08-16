<?php
    session_start();
    if(ISSET($_SESSION['username']) && ($_SESSION['role']=="Admin")){
    include('../connection/config.php');
    include('../layout/header.php');
    include('../layout/navbar.php');
    include('../layout/sidebar.php');
    include('../layout/footer.php');

    $id = $_GET['id'];
    
    $query = mysql_query("select * from user where id='$id' ");
    $data = mysql_fetch_array($query);
    $role = $data['role'];
    $status = $data['status'];
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">User</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Registration
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="../connection/update_user.php" method="post">
                                <div class="form-group">
                                    <label hidden="">Id</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $data['id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="nama_user" class="form-control" placeholder="Full Name" value="<?php echo $data['nama_user'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" placeholder="Password" value="<?php echo $data['password'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" placeholder="Password" value="<?php echo $data['password'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control" name="role">
                                        <option hidden="">--Choose--</option>
                                        <option value="Admin" <?php if($role=="Admin"){echo "selected";} ?>>Admin</option>
                                        <option value="Kasir" <?php if($role=="Kasir"){echo "selected";} ?>>Kasir</option>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>User Status</label>
                                    <select class="form-control" name="status">
                                        <option hidden="">--Choose--</option>
                                        <option value="Active" <?php if($status=="Active"){echo "selected";} ?>>Active</option>
                                        <option value="Not Active" <?php if($status=="Not Active"){echo "selected";} ?>>Not Active</option>
                                    </select>
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