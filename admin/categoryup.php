<?php include 'header.php'; ?>
                <div class="container-fluid">
                    <?php
                    
                    $con = new mysqli("localhost", "root", "", "realstate");
                   
                    if (!isset($_GET['catid'])||isset($_GET['catid'])==NULL||empty($_GET['catid'])) {
                       
                        header('Location:category.php');
                    }else{
                        $catid = $_GET['catid'];
                        $query = "SELECT * FROM category WHERE cat_id='$catid'";
                                            
                        $result = $con->query($query);
                
                        if ($result->num_rows > 0) {
                            $value = mysqli_fetch_array($result);
                        }else{
                            echo "<script>window.location='category.php';</script>";
                        }
                        if(isset($_POST['submit'])){
                            $cat_name = $_POST['cat_name'];
                            
     
    
                            if (empty($cat_name) ) {
                                echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                            } 
                            else{
                                $sql = "UPDATE category 
                                SET
                                cat_name       = '$cat_name'
                                
                                WHERE cat_id=$catid";
    
                        if ($con->query($sql) === TRUE) {
                           
                               
                           echo "<script>window.location='category.php';</script>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $con->error;
                        }
                            }
                            
                        
                        }
                    }
                    if (isset($_GET['activecatid'])) {
                        $activecatid = $_GET['activecatid'];
                        $sql = "UPDATE category 
                        SET
                        flag       = '1'
                        
                        WHERE cat_id=$activecatid";
                         if ($con->query($sql) === TRUE) { 
                            echo "<script>window.location='category.php';</script>";
                         }

                    }
                    if (isset($_GET['deactivecatid'])) {
                        $deactivecatid = $_GET['deactivecatid'];
                        $sql = "UPDATE category 
                        SET
                        flag       = '0'
                        
                        WHERE cat_id=$deactivecatid";
                         if ($con->query($sql) === TRUE) { 
                            echo "<script>window.location='category.php';</script>";
                         }

                    }

                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Create New Category</h1>
                  
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                           <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <input type="text" value="<?php echo $value['cat_name'];?>" name="cat_name" class="form-control" id="exampleInputEmail1" >
                                    
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>

                    </form> 
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Title</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th>NO</th>
                                            <th>Title</th>
                                       
                                            <th>Action</th>
                                        </tr>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                      
                                         $con = new mysqli("localhost", "root", "", "realstate");
                                      
                                                 $query = "SELECT * FROM  category Order By cat_id desc";
                                                 $result = $con->query($query);
                                                 if ($result->num_rows > 0) {
                                                     foreach ($result as $key => $value) {
                                                         
                                                   
                                                 
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['cat_name']; ?> </td>
                                             
                                            <td><?php if ($value['flag']==0) {
                                                
                                                echo "<a style='margin-right:5px;' class='btn btn-info' href='categoryup.php?catid=".$value['cat_id']."'>Update</a>";
                                                echo "<a class='btn btn-success' href='?activecatid=".$value['cat_id']."'>Active</a>";
                                            }else{
                                                echo "<a style='margin-right:5px;' class='btn btn-info' href='categoryup.php?catid=".$value['cat_id']."'>Update</a>";
                                                echo "<a class='btn btn-danger' href='?deactivecatid=".$value['cat_id']."'>Deactive</a>"; 
                                            }
                                            
                                            
                                            
                                            ?></td>
       

                                        </tr>
                                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    

                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>