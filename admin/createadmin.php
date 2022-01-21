<?php include 'header.php'; ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Message Box</h1>
                   
                    <div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                        <?php
                          $con = new mysqli("localhost", "root", "", "realstate");

                          if (isset($_GET['deleteadmin'])) {
                             $delid = $_GET['deleteadmin'];
                             $delquery = "DELETE FROM users WHERE user_id = $delid";
                             if($con->query($delquery)==true)
                             {
                                echo "<script>window.location='createadmin.php';</script>";
                             }
                          }




                          if(isset($_POST['submit'])){
                            $name = $_POST['name'];
                          
                            $phone = $_POST['phone'];
                            $password = $_POST['password'];
                            $address = $_POST['address'];
                               
                            $division = $_POST['division'];                  
                            $admin_log = $_POST['admin_log'];                  
                            $email = $_POST['email'];                  
                           $otpnum = time();
    
                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];
    
                            $div            = explode('.', $file_name);
                            $file_ext       = strtolower(end($div));
                            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "images/".$unique_image;
                            $image_location = "../images/".$unique_image;

                                $emailchk = "SELECT * FROM users WHERE  email='$email'";
                                $emailchk = $con->query($emailchk);
                                $queryb = "SELECT * FROM users WHERE  phone='$phone'";
                                $resa = $con->query($queryb);
                            if (empty($name) ||empty($phone) | empty($password)  ||empty($division)) {
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
                                elseif (mysqli_num_rows($emailchk)>0){
                                   echo "<span class='error-msg'>Email Address Already been Registered </span>";
                                     
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
                              $sql = "INSERT INTO users(`name`,`email`,`phone`,`status`,`password`,`division`,`address`,`image`,`admin_log`)VALUES('$name','$email','$phone','admin','$password','$division','$address','$uploaded_image','$admin_log')";
                                
                        if ($con->query($sql) === TRUE) {
                           
                                move_uploaded_file($file_temp,$image_location);
                                
                        echo "<span class='success-msg'>New Admin Role Created</span>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $con->error__;
                        }
                            }
                            
                        
                        }
                        ?>
                        
                   <form action="" method="post" enctype="multipart/form-data">


<input type="text" required class="form-control" placeholder="Full Name" name="name">
<!-- <input type="text" class="form-control" placeholder="Enter Email" name="email"> -->
<input required type="email" class="form-control" placeholder="email address" name="email">
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

<select required class="form-control" name="admin_log" id="">
  <option  value="">Choose Account type</option>
  <option value="0">Super Admin</option>
  <option value="1">Admin</option>
</select>

<button type="submit" name="submit" class="btn btn-success" name="Submit">Register</button>

</form>

                  
                    </div>
                    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                        <table  class="table table-bordered" >
                            <thead>

                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
    
                                </tr>
                            </thead>
                            <tbody>
<?php
$trash = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>';
$sql = "SELECT * FROM users WHERE status='admin'";
$result = $con->query($sql);
foreach ($result as $key => $value) {
?>
                                <tr>
                                    <td><?php echo $value['name']?></td>
                                    <td><?php echo $value['phone']?></td>
                                    <td><?php
                                    if($value['admin_log']==0){
                                        echo "Super Admin";
                                    }else {
                                        echo "Admin";
                                    }?></td>
                                   
                                    <td>
                                        <?php
                                            if ($_SESSION['user_id']!=$value['user_id']) {
                                            
                                        ?>
                                        
                                    <a style="color:red;"href="?deleteadmin=<?php echo $value['user_id'] ?>"><?php echo $trash; ?></a>
                                <?php } ?>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>