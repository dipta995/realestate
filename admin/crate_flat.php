<?php include 'header.php'; ?>
                <div class="container-fluid">
                    <?php
         function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
                    $con = new mysqli("localhost", "root", "", "realstate");
                    if(isset($_POST['submit'])){
                        $title = validation($_POST['title']);
                        $sqft = $_POST['sqft'];
                        $description = validation($_POST['description']);
                        $description = mysqli_real_escape_string($con,$description);
                        $price = $_POST['price'];
                        $discount = $_POST['discount'];
                        $quantity = $_POST['quantity'];
                        $bed_room = $_POST['bed_room'];
                        $living_room = $_POST['living_room'];
                        $kitchen = $_POST['kitchen'];
                        $parking = $_POST['parking'];
                        $toilet = $_POST['toilet'];
                        $location = $_POST['location'];
                        $cat_id = $_POST['cat_id'];
                        $floar = $_POST['floar'];
                        $belkuni = $_POST['belkuni'];
                        $division = $_POST['division'];

                       $flatcode = time();

                        $filenameone = $_FILES["image_one"]["name"];
                        $filenametwo = $_FILES["image_two"]["name"];
                        $filenamethree = $_FILES["image_three"]["name"];
                        $filenamefour = $_FILES["image_four"]["name"];
                        $tempnameone = $_FILES["image_one"]["tmp_name"];    
                        $tempnametwo = $_FILES["image_two"]["tmp_name"];  
                        $tempnamethree = $_FILES["image_three"]["tmp_name"];  
                        $tempnamefour = $_FILES["image_four"]["tmp_name"];  
                        $div1            = explode('.', $filenameone);
			            $file_ext1       = strtolower(end($div1));
			            $one   = substr(md5(time()), 0, 10).'.'.$file_ext1;
                        $div2            = explode('.', $filenametwo);
			            $file_ext2       = strtolower(end($div2));
			            $two   = substr(md5(time()), 0, 11).'.'.$file_ext2;
                        $div3            = explode('.', $filenamethree);
			            $file_ext3       = strtolower(end($div3));
			            $three   = substr(md5(time()), 0, 12).'.'.$file_ext3;
                        $div4            = explode('.', $filenamefour);
			            $file_ext4       = strtolower(end($div4));
                        $four   = substr(md5(time()), 0, 12).'.'.$file_ext4;
                            $folder1 = "images/".$one;
                            $folder2 = "images/".$two;
                            $folder3 = "images/".$three;
                            $folder4 = "images/".$four;

                        if (empty($title) || empty($description) ||empty($location) ||empty($floar) ||empty($cat_id) ) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }elseif (empty($file_ext1) || empty($file_ext2) || empty($file_ext3)) {
                            echo "<span class='error-msg'>Three image is required</span>";
                    
                        }elseif (empty($file_ext4)) {
                            echo "<span class='error-msg'>Flat Document field is required</span>";
                        }
                        else{
                            $sql = "INSERT INTO properties (title,floar,flatcode,sqft,description,price,discount,status,quantity,bed_room,living_room,kitchen,parking,toilet,location,agent_id,image_one,image_two,image_three,document_file,cat_id,belkuni,division)
                    VALUES ('$title','$floar','$flatcode','$sqft','$description', '$price','$discount','0','$quantity','$bed_room','$living_room','$kitchen','$parking','$toilet','$location','$userid','$folder1','$folder2','$folder3','$folder4','$cat_id','$belkuni','$division')";

                    if ($con->query($sql) === TRUE) {
                       
                            move_uploaded_file($tempnameone, '../'.$folder1);
                            move_uploaded_file($tempnametwo, '../'.$folder2);
                            move_uploaded_file($tempnamethree, '../'.$folder3);
                            move_uploaded_file($tempnamefour, '../'.$folder4);
                    echo "<span class='success-msg'>New record created successfully</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                        }
                        
                    
                    }

                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Create Flat</h1>
                
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                           <form action="" method="post" enctype="multipart/form-data">
                           <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                              <div class="form-group">
                                    <select class="form-control" name="cat_id" id="">
                                        <option value="">--Choose--</option>
                                        <?php
                                            $query = "SELECT * FROM  category where flag=1 Order By cat_id desc";
                                            $result = $con->query($query);
                                            foreach ($result as $key => $value) {
                                    
                                        ?>
                                        <option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-2"></div>
                            </div>
                        <div class="row">
                            <div class="col-md-9">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Division</label>
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
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">sqft</label>
                                    <input type="number" min="0" name="sqft" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Floar location</label>
                                    <input type="text"  name="floar" placeholder="5B" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="number" step="1" min="1" name="price" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Discount</label>
                                    <input type="number" step="1" min="0" value="0"  name="discount" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Belkuni</label>
                                    <input type="number" step="1" min="0" value="1" name="belkuni" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                        </div>
                        <input type="hidden" step="1" min="1" value="1" name="quantity" class="form-control" id="exampleInputEmail1" >
                        <div class="row">
                            
                       
             
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bed Room</label>
                                    <input type="number" step="1" min="1" value="1" name="bed_room" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Living Room</label>
                                    <input type="number" name="living_room" step="1" min="0" value="0" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Kitchen</label>
                                    <input type="number" name="kitchen" step="1" min="1" value="1" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Parking</label>
                                    <input type="number" name="parking" step="1" min="0" value="0" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Toilet</label>
                                    <input type="number" name="toilet" step="1" min="1" value="1" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Image One</label>
                                    <input type="file" name="image_one" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Image two</label>
                                    <input type="file" name="image_two" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Image three</label>
                                    <input type="file" name="image_three" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Flat Importent Document (For varification )</label>
                                    <input type="file" name="image_four" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">location</label>
                                    <input type="text" name="location" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                        </div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Details</label>
                                    <textarea  name="description" class="form-control"></textarea>
                                    
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