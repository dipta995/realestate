<?php
 
session_start();
if ($_SESSION['status']==Null ) {
    header('Location:../login.php');
}
 
$userid = $_SESSION['user_id'];
 $con = new mysqli("localhost", "root", "", "realstate");  
                                
 $query = "SELECT * FROM users WHERE user_id=$userid";
             $res = $con->query($query);
                 $img = mysqli_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if($_SESSION['status']=="agent" ) {
                   echo "Agent";
                }elseif($_SESSION['status']=="agent" ){
                    echo "Admin";
                }else{} ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
.error-msg{
  color:red;
  font-weight: 500;
}
.success-msg{
  color:green;
  font-weight: 500;
}
.admin-image{height: 50px;width:50px;}

</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <?php if($_SESSION['status']=="agent" ) {
                   echo "Agent";
                }else{
                    echo "Admin";
                } ?> <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
            <?php if ($_SESSION['status']!='user') { ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Flat</span>
                </a>
                <?php } ?>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <?php if ($_SESSION['status']=='agent') { ?>
                        <a class="collapse-item" href="crate_flat.php">Create Flat</a>
                        <?php } ?>
                        <?php if ($_SESSION['status']=='agent' || $_SESSION['status']=='admin') { ?>
                        <a class="collapse-item" href="view_flat.php">View Flat</a>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php if ($_SESSION['status']=='admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="order.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Orders</span></a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['status']=='agent') { ?>
            <li class="nav-item">
                <a class="nav-link" href="order-agent.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Orders</span></a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['status']=='admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="sold-out-admin.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Solout </span></a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['status']=='agent') { ?>
            <li class="nav-item">
                <a class="nav-link" href="sold-out.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Solout </span></a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['status']=='admin') { ?>
                <?php if ($img['admin_log']==0) {  ?>
            <li class="nav-item">
                <a class="nav-link" href="category.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Category</span></a>
            </li>
            <?php }} ?>
            <?php if ($_SESSION['status']=='admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="agent.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Agent</span></a>
            </li>
            <?php } ?>
             <?php if ($_SESSION['status']=='admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Contacts</span></a>
            </li>
            <?php if ($img['admin_log']==0) {  ?>
            <li class="nav-item">
                <a class="nav-link" href="createadmin.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Admin Mastering</span></a>
            </li>
            <?php  }} ?>
            <!-- Nav Item - Utilities Collapse Menu -->
    
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

          
               

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  $_SESSION['name'];?></span>
                               
                                <img class="img-profile rounded-circle"
                                    src="../<?php echo $img['image']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="editprofile.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="up_password.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Update Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <?php 
                                if (isset($_GET['logout'])) {
                                    session_destroy();
                                    echo "<script>window.location='../login.php';</script>";
                                }
                                ?>
                                <a class="dropdown-item" href="?logout=logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->