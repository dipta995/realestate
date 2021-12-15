<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Sale</span>
    <h2>Products</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
    <input type="text" class="form-control" placeholder="Search of Properties">
    <div class="row">
            <div class="col-lg-5">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control">
                <option>Property Type</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

  </div>



<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>

<?php
 
 $con = new mysqli("localhost", "root", "", "realstate");                                                                     
$query = "SELECT * FROM properties Order By  RAND() LIMIT 4";
$result = $con->query($query);
if ($result->num_rows > 0) {
    foreach ($result as $key => $data) {
?>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="<?php echo $data['image_one'] ?>" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php?flatid=<?php echo $data['id'] ?>"><?php echo $data['title'] ?> Sqft</a></h5>
                  <p class="price"><?php  $dis = round(($data['price']*$data['discount'])-(($data['price']*$data['discount'])/100));
        if ($dis!=0) {

          echo "<del>".$data['price']."Taka</del><br>".$dis."Taka";
        }else{
          echo $data['price']."Taka <br><br>";
        }
        ?></p> </div>
              </div>
              <?php }} ?>
 

</div>


</div>

<div class="col-lg-9 col-sm-8">
 
<div class="row">
<?php
$categoryid=$_GET['categoryid'];
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 12;
        $offset = ($pageno-1) * $no_of_records_per_page;

       
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $total_pages_sql = "SELECT COUNT(*) FROM properties where cat_id=$categoryid ";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];

        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sqls = "SELECT * FROM properties where cat_id=$categoryid LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($con,$sqls);
      if ($res_data->num_rows > 0) {
          foreach ($res_data as $key => $value) {
    ?>
 
      <!-- properties -->
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><img src="<?php echo $value['image_one'];?>" class="img-responsive" alt="properties">
          <div style="color:red;" class="status sold"><?php
            if ($value['quantity']==0) {
              echo "SOLD";
            }
          ?></div>
        </div>
        <h4><a href="#>"><?php echo $value['title'];?> Sqft</a></h4>
        <p class="price">Price:  <?php  $dis = round(($value['price']*$value['discount'])-(($value['price']*$value['discount'])/100));
        if ($dis!=0) {

          echo "<del>".$value['price']."Taka</del><br>".$dis."Taka";
        }else{
          echo $value['price']."Taka <br><br>";
        }
        ?></p>
       <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $value['bed_room']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $value['living_room']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $value['parking']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $value['kitchen']; ?></span> </div>
       <?php
            if ($value['quantity']==0) {
              
            
          ?>
         <a class="btn btn-danger" href="#">View Details</a>
      <?php }else{  ?>
        <a class="btn btn-primary" href="property-detail.php?flatid=<?php echo $value['id'] ?>">View Details</a>
       <?php } ?>
      </div>
      </div>

      <?php }} ?>
      <!-- properties -->
      <div class="center">
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?categoryid=".$categoryid."&pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?categoryid=".$categoryid."&pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?categoryid=<?php echo $categoryid; ?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</div>

</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>