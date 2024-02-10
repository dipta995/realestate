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
                                             <th>Flat Id</th>
                                            <th>Title</th>
                                            <th>sqft</th>
                                            <th>Rooms</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Name||Email||Phone</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th>NO</th>
                                            <th>Flat Id</th>
                                            <th>Title</th>
                                            <th>sqft</th>
                                            <th>Rooms</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                             
                                            <th>Name||Email||Phone</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                      
                                         $con = new mysqli("localhost", "root", "", "realstate");
                                         if (isset($_GET['delid'])) {
                                             $delid = $_GET['delid'];
                                             $DELquery ="DELETE FROM orders WHERE order_id = $delid";
                                               $delete = $con->query($DELquery);
                                               if ($delete) {
                                                   echo "<script>window.location='order.php';</script>";
                                               }
                                         }
                                      
                                                 $query = "SELECT * FROM orders left join properties on properties.id = orders.property_id and  orders.status=1 Order By orders.created_at desc";
                                                 $result = $con->query($query);
                                                 if ($result->num_rows > 0) {
                                                     foreach ($result as $key => $value) {
                                                         
                                                   
                                                 
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                             <td><?php echo $value['id']; ?> </td>
                                            <td><?php echo $value['title']; ?> </td>
                                            <td><?php echo $value['sqft']; ?> Sqft BY <?php echo $value['name']; ?></td>
                                            <td><?php echo $value['bed_room']." Bed ".$value['living_room']."Drowing-Dining".$value['kitchen']."Kitchen".$value['toilet']."Toilet"; ?></td>
                                            <td><?php echo $value['price']; ?></td>
                                            <td><?php echo $value['discount']; ?></td>
                                            <td><?php echo $value['name']."||".$value['email']."||".$value['phone']; ?></td>
                                            <td><img class="admin-image" src="../<?php echo $value['image_one']; ?>" alt=""></td>
                                            <td><a class="btn btn-danger" href="?delid=<?php echo $value['order_id']; ?>">Delete</a></td>

                                        </tr>
                                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>