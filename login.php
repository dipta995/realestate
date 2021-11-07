<?php include 'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
  <?php
                                      session_start();
                                    if($_SESSION['admin']=="admin"){
                                        header('Location:index.php');
                                    }
                                    $con = new mysqli("localhost", "root", "", "realstate");
                                    if(isset($_POST['submit'])){
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                            $query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND status = 'admin'";
                                            
                                            $result = $con->query($query);
                                    
                                            if ($result->num_rows > 0) {
                                                $value = mysqli_fetch_array($result);
                                                //session_destroy();
                                              
                                                $_SESSION['admin'] = "admin";
                                                $_SESSION['name'] = $value['name'];
                                                $_SESSION['email'] = $value['email'];
                                                $_SESSION['user_id'] = $value['user_id'];
                                                  header('Location:index.php');
                                               
                                                 
                                             }else{
                                                 echo "error";
                                             } 
                                            }
                                      
                                    ?>
        <form action="" method="post">

        
            <input type="text" class="form-control" placeholder="Enter Email" name="email">
             
            <input type="password" class="form-control" placeholder=" Password" name="password">

          
            <button type="submit" class="btn btn-success" name="Submit">Login</button>
            <p>Don't have an account ?<a href="pre-register.php">Create</a></p>
        </form>

          


                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>