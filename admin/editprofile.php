<?php include 'header.php'; ?>
                <div class="container-fluid">
                    <?php
                    $con = new mysqli("localhost", "root", "", "realstate");  
                  
                            $userid = $_SESSION['user_id'];
                              $query = "SELECT * FROM users WHERE user_id='$userid'";
                                            
                                $result = $con->query($query);
                        
                                  $value = mysqli_fetch_array($result);

                                  
                                
                               
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $address = $_POST['address'];
                         $about_me = $_POST['about_me'];   
                        $division = $_POST['division'];                  

                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div            = explode('.', $file_name);
                        $file_ext       = strtolower(end($div));
                        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "images/".$unique_image;
                        $move_image = "../images/".$unique_image;
                
                          
                        if (empty($name) || empty($address) ||empty($about_me) ) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }

                        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                         echo "<span class='error-msg'>Only letters and white space allowed for first Name</span>";
                        }
                         
                       elseif ( strlen ($address) > 120) {  
                                echo "<span class='error-msg'>Address maximum 120 words</span>";  
                                         
                            } 
                            elseif ( strlen ($about_me) > 150) {  
                                echo "<span class='error-msg'>About Me maximum 120 words</span>";  
                                         
                            } 
                           


                        elseif (empty($file_ext)) {
                            $sql = "UPDATE users 
                          SET
                          name       ='$name',
                          division    ='$division',
                          about_me   ='$about_me',
                          address      ='$address'
                          WHERE user_id=$userid";
                            

                    if ($con->query($sql) === TRUE) {
                       
                            move_uploaded_file($file_temp,$uploaded_image);
                            
                    echo "<span class='success-msg'>Profile Content Updated</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error__;
                    }
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
                          division    ='$division',
                          about_me   ='$about_me',
                          address      ='$address',
                          image      ='$uploaded_image'

                          WHERE user_id=$userid";
                            

                    if ($con->query($sql) === TRUE) {
                       
                            move_uploaded_file($file_temp,$move_image);
                            
                    echo "<span class='success-msg'>Profile Content Updated</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error__;
                    }
                        }
                        
                    
                    }

                    ?>


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
                <label>Name</label>
                <input type="text" required class="form-control" value="<?php echo $value['name']; ?>" placeholder="Full Name" name="name">
            </div>
            <div class="form-group">
                 <label>Address</label>
                <textarea rows="6" class="form-control" placeholder="Address" name="address"><?php echo $value['address']; ?></textarea>
            </div>
            <div class="form-group">
                 <label>About Me</label>
                <textarea rows="6" class="form-control" placeholder="About yourself In 150 words" name="about_me"><?php echo $value['about_me']; ?></textarea>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="image">
                <img style="height: 100px;width: 100px;" src="../<?php echo $value['image']; ?>">
            </div>
            <div class="form-group">

                 <select required class="form-control" name="division" id="">
                  <option value="<?php echo $value['division']; ?>"><?php echo $value['division']; ?></option>

                  <option value="Dhaka">Dhaka</option>
                  <option value="Khulna">Khulna</option>
                  <option value="Rajshahi">Rajshahi</option>
                  <option value="Chattogram">Chattogram</option>
                  <option value="Barishal">Barishal</option>
                  <option value="Sylhet">Sylhet</option>
                  <option value="Barishal">Rangpur</option>
                  <option value="Sylhet">Mymensingh</option>
                </select>

                </div>
                <div class="form-group">

      <button type="submit" name="submit" class="btn btn-success" name="Submit">Register</button>
  </div>
          
      </form>
  </div>
    <div class="col-md-2"></div>
</div>

                        
                        

                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>