<?php session_start();
    if($_SESSION['role']=="Admin"){
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="../pages/dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
 
            <li>
                <a href="../pages/product.php"><i class="fa fa-table fa-fw"></i> Product</a>
            </li>
            <li>
                <a href="../pages/transaksi.php"><i class="fa fa-file fa-fw"></i> Transaksi</a>
            </li>
            <li>
                <a href="proses.php"><i class="fa fa-paste fa-fw"></i> Proses Mining</a>
            </li>
            <li>
                <a href="user.php"><i class="fa fa-user fa-fw"></i> User Registration</a>
            </li>
            
        </ul>
    </div>
    <!-- sidebar-collapse -->
</div>
<?php        
}else{
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="../pages/dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
 
            <li>
                <a href="../pages/transaksi.php"><i class="fa fa-file fa-fw"></i> Transaksi</a>
            </li>            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<?php
}
?>