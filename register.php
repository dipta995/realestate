<?php include'header.php';?>
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
                    $con = new mysqli("localhost", "root", "", "realstate");  
                    
                    if (isset($_GET['otp']) && isset($_GET['otp'])!=NULL && !empty($_GET['otp']) ) {
                            $otp = $_GET['otp'];
                              $query = "SELECT * FROM users WHERE otp='$otp'";
                                            
                                $result = $con->query($query);
                        
                                if ($result->num_rows > 0) {
                                  $value = mysqli_fetch_array($result);
                                  $userid = $value['user_id'];
                                  $emailaddress = $value['email'];
                                
                                }else{
                                  echo "<script>window.location='invalid.php';</script>";
                                }
                              }else{
                                echo "<script>window.location='invalid.php';</script>";
                              }
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $email = $emailaddress;
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        $status = $_POST['status'];     
                        $division = $_POST['division'];                  
                       $otpnum = time();

                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div            = explode('.', $file_name);
                        $file_ext       = strtolower(end($div));
                        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "images/".$unique_image;
                        
                
                            $queryb = "SELECT * FROM users WHERE  phone='$phone'";
                            $resa = $con->query($queryb);


                        if (empty($name) ||empty($phone) | empty($password) ||empty($address) ||empty($division) ||empty($status)) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }

                        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                         echo "<span class='error-msg'>Only letters and white space allowed for first Name</span>";
                        }
                         
                         elseif ( strlen ($password) < 8) {  
                                        echo "<span class='error-msg'>Password Minimum 8 Digit</span>";  
                                     
                            } elseif ( strlen ($phone) != 11) {  
                                echo "<span class='error-msg'>Phone Only 11 Digit</span>";  
                                         
                            }elseif ( strlen ($address) > 120) {  
                                echo "<span class='error-msg'>Address maximum 120 words</span>";  
                                         
                            } 
                            elseif (mysqli_num_rows($resa)>0){
                               echo "<span class='error-msg'>This Mobile Number Already been Registered </span>";
                                 
                            }








                        elseif (empty($file_ext)) {
                            echo "<span class='error-msg'>Image is required</span>";
                        }

                         else if ($file_size >1048567) {
                          return "<span class='error'>Image Size should be less then 1MB! </span>";
                         } elseif (in_array($file_ext, $permited) === false) {
                          return "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                         }



                        else{
                          $sql = "UPDATE users 
                          SET
                          name       ='$name',
                          phone      ='$phone',
                          status     ='$status',
                          password   ='$password',
                          address    ='$address',
                          division    ='$division',
                          otp        ='$otpnum',
                          about_me   ='$name',
                          image      ='$uploaded_image'

                          WHERE user_id=$userid";
                            

                    if ($con->query($sql) === TRUE) {
                       
                            move_uploaded_file($file_temp,$uploaded_image);
                            
                    echo "<span class='success-msg'>New record created successfully</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error__;
                    }
                        }
                        
                    
                    }

                    ?>


<form action="" method="post" enctype="multipart/form-data">


                <input type="text" required class="form-control" placeholder="Full Name" name="name">
                <!-- <input type="text" class="form-control" placeholder="Enter Email" name="email"> -->
                <input required type="number" min="0" class="form-control" placeholder="Mobile No" name="phone">
                <input required type="password" class="form-control" placeholder=" Password" name="password">

                <textarea rows="6" class="form-control" placeholder="Address" name="address"></textarea>
                <input type="file" class="form-control" name="image">

                 <select required class="form-control" name="division" id="">
                  <option value="">Choose division</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Khulna">Khulna</option>
                  <option value="Rajshahi">Rajshahi</option>
                  <option value="Chattogram">Chattogram</option>
                  <option value="Barishal">Barishal</option>
                  <option value="Sylhet">Sylhet</option>
                  <option value="Barishal">Rangpur</option>
                  <option value="Sylhet">Mymensingh</option>
                </select>

                <select required class="form-control" name="status" id="">
                  <option  value="">Choose Account type</option>
                  <option value="user">Customer</option>
                  <option value="agent">Agent</option>
                </select>

      <button type="submit" name="submit" class="btn btn-success" name="Submit">Register</button>
          
      </form>

                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>