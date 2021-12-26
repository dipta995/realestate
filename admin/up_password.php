<?php include 'header.php'; ?>
                <div class="container-fluid">
                    <?php
                    
                    $con = new mysqli("localhost", "root", "", "realstate");
                    $userid=$_SESSION['user_id'];
                    if(isset($_POST['submit'])){
                        $password1 = mysqli_real_escape_string($con,$_POST['password1']);
                        $password2 = mysqli_real_escape_string($con,$_POST['password2']);
                        
 

                        if (empty($password1) || empty($password2) ) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        } elseif($password1 != $password2){
                             echo "<span class='error-msg'>Password and confirm password doesnot match</span>"; 
                        }elseif ( strlen ($password1) < 8) {  
                                echo "<span class='error-msg'>Address Minimum 8 digit</span>";  
                                         
                            } 
                        else{
                               $sql = "UPDATE users 
                          SET
                          password       ='$password1'
                          
                          WHERE user_id=$userid";
                            

                    if ($con->query($sql) === TRUE) {
                       
                           
                    echo "<span class='success-msg'>Your password Updated</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                        }
                        
                    
                    }
                     

                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update your password</h1>
                  
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                           <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" name="password1" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" name="password2" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="row">
                       
                       
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                        

                    </form> 
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                   
                    

                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>