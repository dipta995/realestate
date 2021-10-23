<?php include 'header.php'; ?>
                <div class="container-fluid">
                    <?php
                   

                    $con = new mysqli("localhost", "root", "", "realstate");
                    if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        $discount = $_POST['discount'];
                        $quantity = $_POST['quantity'];
                        $bed_room = $_POST['bed_room'];
                        $living_room = $_POST['living_room'];
                        $kitchen = $_POST['kitchen'];
                        $parking = $_POST['parking'];
                        $toilet = $_POST['toilet'];
                        $location = $_POST['location'];

                       

                        $filenameone = $_FILES["image_one"]["name"];
                        $filenametwo = $_FILES["image_two"]["name"];
                        $filenamethree = $_FILES["image_three"]["name"];
                        $tempnameone = $_FILES["image_one"]["tmp_name"];    
                        $tempnametwo = $_FILES["image_two"]["tmp_name"];  
                        $tempnamethree = $_FILES["image_three"]["tmp_name"];  
                        $div1            = explode('.', $filenameone);
			            $file_ext1       = strtolower(end($div1));
			            $one   = substr(md5(time()), 0, 10).'.'.$file_ext1;
                        $div2            = explode('.', $filenametwo);
			            $file_ext2       = strtolower(end($div2));
			            $two   = substr(md5(time()), 0, 10).'.'.$file_ext2;
                        $div3            = explode('.', $filenamethree);
			            $file_ext3       = strtolower(end($div3));
			            $three   = substr(md5(time()), 0, 10).'.'.$file_ext3;
                            $folder1 = "../images/".$one;
                            $folder2 = "../images/".$two;
                            $folder3 = "../images/".$three;

                        if (empty($title) || empty($description) ||empty($location) ) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }elseif (empty($file_ext1) || empty($file_ext2)||empty($file_ext3)) {
                            echo "<span class='error-msg'>Three image is required</span>";
                        }
                        else{
                            $sql = "INSERT INTO properties (title,description,price,discount,status,quantity,bed_room,living_room,kitchen,parking,toilet,location,agent_id,image_one,image_two,image_three)
                    VALUES ('$title','$description', '$price','$discount','0','$quantity','$bed_room','$living_room','$kitchen','$parking','$toilet','$location',1,'$folder1','$folder2','$folder3')";

                    if ($con->query($sql) === TRUE) {
                       
                            move_uploaded_file($tempnameone, $folder1);
                            move_uploaded_file($tempnametwo, $folder2);
                            move_uploaded_file($tempnamethree, $folder3);
                    echo "<span class='success-msg'>New record created successfully</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                        }
                        
                        
                       
                    
                    }
                    if (empty($_GET['id']) || $_GET['id']==NULL|| !isset($_GET['id'])) {
                        echo "<script>window.location='view_flat.php';</script>";
             
                    }
                    else {
                        $flatid=$_GET['id'];
                        $query = "SELECT * FROM properties WHERE id=$flatid";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $value = mysqli_fetch_array($result);
                        }
                    }

                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Flat</h1>
                  
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                           <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" value="<?php echo $value['title'];?>" name="title" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="number" value="<?php echo $value['price'];?>" step="1" min="1" name="price" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Discount</label>
                                    <input type="number" value="<?php echo $value['discount'];?>" step="1" min="0" value="0"  name="discount" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">quantity</label>
                                    <input type="number" value="<?php echo $value['quantity'];?>" step="1" min="1" value="1" name="quantity" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bed Room</label>
                                    <input type="number" value="<?php echo $value['bed_room'];?>" step="1" min="1" value="1" name="bed_room" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Living Room</label>
                                    <input type="number" value="<?php echo $value['living_room'];?>" name="living_room" step="1" min="0" value="0" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Kitchen</label>
                                    <input type="number" value="<?php echo $value['kitchen'];?>" name="kitchen" step="1" min="1" value="1" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Parking</label>
                                    <input type="number" value="<?php echo $value['parking'];?>" name="parking" step="1" min="0" value="0" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Toilet</label>
                                    <input type="number" value="<?php echo $value['toilet'];?>" name="toilet" step="1" min="1" value="1" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Image One</label>
                                    <input type="file" name="image_one" class="form-control" id="exampleInputEmail1" ><br>
                                    <img class="admin-image" src="<?php echo $value['image_one'];?>" alt="">
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Image two</label>
                                    <input type="file" name="image_two" class="form-control" id="exampleInputEmail1" ><br>
                                    <img class="admin-image" src="../<?php echo $value['image_two'];?>" alt="">
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Image three</label>
                                    <input type="file" name="image_three" class="form-control" id="exampleInputEmail1" ><br>
                                    <img class="admin-image" src="../<?php echo $value['image_three'];?>" alt="">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">location</label>
                                    <input type="text" value="../<?php echo $value['location'];?>" name="location" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                        </div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Details</label>
                                    <textarea name="description" class="form-control"><?php echo $value['description'];?></textarea>
                                    
                                </div>

                            </div>

                           
                               
                            
                        </div>
                        
                        <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                        </div>
                      
                    </form> 
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>