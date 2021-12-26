<!DOCTYPE html>
<html lang="en">
<head>
<title>Realestate  </title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

</head>

<body>
 


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="index.php">Home</a></li>
             <!--    <li><a href="about.php">About</a></li> -->
                <li><a href="agents.php">Agents</a></li>  
                <?php 
                $con = new mysqli("localhost", "root", "", "realstate");
                 session_start();

                 if (isset($_GET['logout'])&& $_GET['logout']=='logout') {
                  session_destroy();
                  echo "<script>window.location='login.php';</script>";
              }
              
                  if (isset($_SESSION['admin'])=='admin') { ?>
                    <li><span style="color:white;">(<?php echo $_SESSION['name']; ?>)</span><a href="?logout=logout">Logout</a></li>
                    <?php }else{ ?>   
                      <li><a href="login.php">Login</a></li>
                <?php } ?>
                <li><a href="admin/index.php">Admin</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">
<a href="index.php"><img src="images/logo.png" alt="Realestate"></a>

              <ul class="pull-right">
                <?php
                   $query = "SELECT * FROM  category where flag=1 Order By cat_id desc";
                   $result = $con->query($query);
                   foreach ($result as $key => $value) {
                ?>
                <li><a href="allproduct.php?categoryid=<?php echo $value['cat_id']?>"><?php echo $value['cat_name']?></a></li>
                <?php } ?>
                <!-- <li><a href="buysalerent.php">Sale</a></li>         
                <li><a href="buysalerent.php">Rent</a></li> -->
              </ul>
</div>
<!-- #Header Starts -->
</div>