<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                          <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <?php
                                      session_start();
                                    if(isset($_SESSION['status'])=="admin"){
                                        header('Location:index.php');
                                    }else{
                                        //header('Location:../login.php');
                                    }
                                    $con = new mysqli("localhost", "root", "", "realstate");
                                    if(isset($_POST['submit'])){
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                                            
                                            $result = $con->query($query);
                                    
                                            if ($result->num_rows > 0) {
                                                $value = mysqli_fetch_array($result);
                                                //session_destroy();
                                              
                                               $_SESSION['admin'] = "admin";
                                                $_SESSION['name'] = $value['name'];
                                                $_SESSION['email'] = $value['email'];
                                                $_SESSION['phone'] = $value['phone'];
                                                $_SESSION['user_id'] = $value['user_id'];
                                                $_SESSION['status'] = $value['status'];
                                                  header('Location:index.php');
                                               
                                                 
                                             }else{
                                                 echo "error";
                                             } 
                                            }
                                      
                                    ?>
                                    <form class="user" action="" method="post"> 
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                     
                                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                             
                                      
                                       
                                    </form>
                                    <!-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>