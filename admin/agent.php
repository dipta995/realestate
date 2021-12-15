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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile No</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                            <th>Image</th>
                                          
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th>NO</th>
                                             <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile No</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                      
                                         $con = new mysqli("localhost", "root", "", "realstate");
                                         // if (isset($_GET['delid'])) {
                                         //     $delid = $_GET['delid'];
                                         //     $DELquery ="DELETE FROM orders WHERE order_id = $delid";
                                         //       $delete = $con->query($DELquery);
                                         //       if ($delete) {
                                         //           echo "<script>window.location='order.php';</script>";
                                         //       }
                                         // }
                                      
                                                 $query = "SELECT * FROM users Where status='agent'";
                                                 $result = $con->query($query);
                                                 if ($result->num_rows > 0) {
                                                     foreach ($result as $key => $value) {
                                                         
                                                   
                                                 
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                             <td><?php echo $value['name']; ?> </td>
                                            <td><?php echo $value['email']; ?> </td>
                                            <td><?php echo $value['phone']; ?></td>
                                            
                                            <td><?php echo $value['address']; ?></td>
                                            <td><?php echo $value['created_at']; ?></td>
                                   
                                            <td><img class="admin-image" src="../<?php echo $value['image']; ?>" alt=""></td>
                                           

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