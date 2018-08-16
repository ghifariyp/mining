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
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
       
       
      
        
    <!-- /.row -->
    <div class="row">
        
        <!-- /.col-lg-8 -->
        <div class="col-lg-12">
            <div>
                  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                Selamat Datang
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>

<?php 
}else{ 
    echo '<script>alert("Anda harus login terlebih dahulu !");</script>';
    echo '<meta http-equiv="Refresh" content="0; url=../index.php">';
} 
?>