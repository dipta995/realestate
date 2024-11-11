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
                            <th>ID NO</th>
                            <th>Title(Quantity)</th>
                            <th>Category</th>
                            <th>sqft</th>
                            <th>Flat Location</th>
                            <th>Rooms</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>

                        <tr>
                            <th>ID NO</th>
                            <th>Title(Quantity)</th>
                            <th>Category</th>
                            <th>sqft</th>
                            <th>Flat Location</th>
                            <th>Rooms</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        <?php

                        $con = new mysqli("localhost", "root", "", "realstate");

                        if ($_SESSION['status'] == 'admin') {

                            $query = "SELECT properties.*, 
                 users.name as agent_name, 
                 category.cat_name 
          FROM properties 
          LEFT JOIN users ON properties.agent_id = users.user_id 
          LEFT JOIN category ON properties.cat_id = category.cat_id 
          ORDER BY properties.id DESC";
                        } else {
                            $query = "SELECT properties.*, 
                 category.cat_name, 
                 users.name as agent_name 
          FROM properties 
          LEFT JOIN category ON properties.cat_id = category.cat_id 
          LEFT JOIN users ON properties.agent_id = users.user_id 
          WHERE properties.agent_id = $userid 
          ORDER BY properties.id DESC";
                        }
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {



                        ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['title'] . "(" . $value['quantity'] . ")"; ?> </td>
                                    <td><?php echo $value['cat_name']; ?> </td>
                                    <td><?php echo $value['sqft']; ?> Sqft BY <?php echo $value['agent_name']; ?></td>
                                    <td><?php echo $value['floar']; ?> </td>
                                    <td><?php echo $value['bed_room'] . " Bed " . $value['living_room'] . "Drowing-Dining" . $value['kitchen'] . "Kitchen" . $value['toilet'] . "Toilet"; ?></td>
                                    <td><?php echo $value['price']; ?></td>
                                    <td><?php echo $value['discount']; ?></td>
                                    <td><img class="admin-image" src="../<?php echo $value['image_one']; ?>" alt=""></td>
                                    <td><?php if ($value['status'] == 0) {
                                            echo '<strong class="text-danger">Pending</strong>';
                                        } else {
                                            echo '<strong class="text-info">Confirm</strong>';
                                        }
                                        if ($_SESSION['status'] == 'admin') {  ?>
                                            <a class="btn btn-success" href="../<?php echo $value['document_file']; ?>" target="_blank"><i class="fas fa-eye"></i></a>
                                            <?php
                                            if ($value['status'] == 0) {
                                            ?>
                                                <a class="btn btn-info mt-2" href="?id=<?php echo $value['id']; ?>&status=confirm">Make Confirm</a>
                                            <?php } else { ?>
                                                <a class="btn btn-danger mt-2  " href="?id=<?php echo $value['id']; ?>&status=pending">Make Pending</a>
                                            <?php } ?>
                                        <?php } ?>


                                    </td>

                                    <td>
                                        <?php

if ($value['status'] == 1) {
                                        if ($value['quantity'] != 0) {
                                        ?>
                                            <a class="btn btn-info" href="?soldid=<?php echo $value['id']; ?>">Not Sold</a>
                                             || <?php } else { ?>
                                            <a class="btn btn-danger" href="#">Sold</a> || <?php } } ?>
                                        <?php if ($_SESSION['status'] == 'agent') { ?>
                                            <a href="edit_flat.php?id=<?php echo $value['id']; ?>">Edit</a>|| <?php  } ?> <a href="?delete=<?php echo $value['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                        <?php } 
                        }
                        if (isset($_GET['delete'])) {
                            $delid = $_GET['delete'];
                            $soldid = $_GET['soldid'];
                            $query = "DELETE FROM properties WHERE id=$delid";
                            $result = $con->query($query);
                            if ($result) {
                                echo "<script>window.location='view_flat.php';</script>";
                            }
                            // echo "<script>window.location='view_flat.php';</script>";
                        }

                        if (isset($_GET['status'])) {
                            $status = $_GET['status'];
                            if($status == 'pending'){
                                $val=0;
                            }
                            if($status == 'confirm'){
                                $val=1;
                            }
                            $id = $_GET['id'];

                            $query = "UPDATE properties 
                                SET
                                status    =$val
                                WHERE id=$id";
                            $result = $con->query($query);
                            if ($result) {
                                echo "<script>window.location='view_flat.php';</script>";
                            }
                            // echo "<script>window.location='view_flat.php';</script>";
                        }
                        if (isset($_GET['soldid'])) {
                            $sql = "UPDATE properties 
                                                            SET
                                                            quantity    =0

                                                            WHERE id=$soldid";
                            $result = $con->query($sql);
                            $sql = "UPDATE orders 
                                                            SET
                                                            status    =1

                                                            WHERE property_id=$soldid";
                            $result = $con->query($sql);
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