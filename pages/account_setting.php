<?php
    session_start();
    if(ISSET($_SESSION['username'])){
    include('../connection/config.php');
    include('../layout/header.php');
    include('../layout/navbar.php');
    include('../layout/sidebar.php');
    include('../layout/footer.php');

    $id = $_GET['id'];
    $password = md5($get['password']);
    
    $query = mysql_query("select * from user where id='$id' ");
    $data = mysql_fetch_array($query);
    $role = $data['role'];
    $status = $data['status'];
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"> Account Setting</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Account
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="../connection/edit_account.php" method="post">
                                <div class="form-group">
                                    <label hidden="">Id</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $data['id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="nama_user" class="form-control" placeholder="Full Name" value="<?php echo $data['nama_user'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" placeholder="Password" value="<?php echo $data['password'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label required="required">New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>                       
                                <button type="submit" class="btn btn-primary">Submit</button>
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