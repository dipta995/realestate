<?php include 'header.php'; ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

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
                                      
                                                 $query = "SELECT * FROM properties Order By id desc";
                                                 $result = $con->query($query);
                                                 if ($result->num_rows > 0) {
                                                     foreach ($result as $key => $value) {
                                                         
                                                   
                                                 
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['title']; ?></td>
                                            <td><?php echo $value['bed_room']." Bed ".$value['living_room']."Drowing-Dining".$value['kitchen']."Kitchen".$value['toilet']."Toilet"; ?></td>
                                            <td><?php echo $value['price']; ?></td>
                                            <td><?php echo $value['discount']; ?></td>
                                            <td><img style="height: 50px;width:50px;" src="<?php echo $value['image_one']; ?>" alt=""></td>
                                            <td><a href="#">Edit</a>||<a href="#">Delete</a></td>
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