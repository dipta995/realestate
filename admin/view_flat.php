<?php include 'header.php'; ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Title</th>
                                            <th>sqft</th>
                                            <th>Rooms</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th>NO</th>
                                            <th>Title</th>
                                            <th>sqft</th>
                                            <th>Rooms</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                      
                                         $con = new mysqli("localhost", "root", "", "realstate");

                                         if ($_SESSION['status']=='admin') {  
                                      
                                                 $query = "SELECT * FROM properties left join users on properties.agent_id = users.user_id Order By properties.id desc";
                                         }else{
                                            $query = "SELECT * FROM properties left join users on properties.agent_id = users.user_id where agent_id=$userid Order By properties.id desc";
                                         }
                                                 $result = $con->query($query);
                                                 if ($result->num_rows > 0) {
                                                     foreach ($result as $key => $value) {
                                                         
                                                   
                                                 
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['title']; ?> </td>
                                            <td><?php echo $value['sqft']; ?> Sqft BY <?php echo $value['name']; ?></td>
                                            <td><?php echo $value['bed_room']." Bed ".$value['living_room']."Drowing-Dining".$value['kitchen']."Kitchen".$value['toilet']."Toilet"; ?></td>
                                            <td><?php echo $value['price']; ?></td>
                                            <td><?php echo $value['discount']; ?></td>
                                            <td><img class="admin-image" src="../<?php echo $value['image_one']; ?>" alt=""></td>
                                           
                                            <td>
                                            <?php  if ($_SESSION['status']=='agent') { ?>
                                            <a href="edit_flat.php?id=<?php echo $value['id'];?>">Edit</a>|| <?php } ?> <a href="?delete=<?php echo $value['id'];?>">Delete</a></td>
                                        </tr>
                                                        <?php }}
                                                          if (isset($_GET['delete'])) {
                                                            $delid=$_GET['delete'];
                                                            $query = "DELETE FROM properties WHERE id=$delid";
                                                            $result = $con->query($query);
                                                            if ($result) {
                                                                echo "<script>window.location='view_flat.php';</script>";
                                                            }
                                                               // echo "<script>window.location='view_flat.php';</script>";
                                                        }
                                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>