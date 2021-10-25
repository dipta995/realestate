<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
</div>
</div>
<!-- banner -->

<?php
$con = new mysqli("localhost", "root", "", "realstate");
 if (empty($_GET['flatid']) || $_GET['flatid']==NULL|| !isset($_GET['flatid'])) {
  echo "<script>window.location='index.php';</script>";

}
else {
  $flatid=$_GET['flatid'];
  $query = "SELECT * FROM properties WHERE id=$flatid";
  $result = $con->query($query);
  if ($result->num_rows > 0) {
      $value = mysqli_fetch_array($result);
  }
}

?>
<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<?php
 
                                      
$query = "SELECT * FROM properties Order By  RAND() LIMIT 4";
$result = $con->query($query);
if ($result->num_rows > 0) {
    foreach ($result as $key => $data) {
?>

              <div class="row">
                <div class="col-lg-4 col-sm-5"><img src="<?php echo $data['image_one'] ?>" class="img-responsive img-circle" alt="properties"/></div>
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
  <?php } } ?>
 

 

</div>



<div class="advertisement">
  <h4>Advertisements</h4>
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2><?php echo $value['bed_room']+$value['living_room'];?> room and <?php echo $value['kitchen'];?> kitchen apartment</h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="<?php echo $value['image_one'] ?>" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        <div class="item">
          <img src="<?php echo $value['image_two'] ?>" class="properties" alt="properties" />
         
        </div>
        <!-- #Item 2 -->

        <!-- Item 3 -->
         <div class="item">
          <img src="<?php echo $value['image_three'] ?>" class="properties" alt="properties" />
        </div>
        <!-- #Item 3 -->

   
        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
 <?php echo $value['description'];?>
  </div>
  <!-- <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
  </div> -->

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"> <?php echo $value['price'];?> Taka</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span>  <?php echo $value['location'];?></p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <?php 
  $agent = $value['agent_id'];
  $que = "SELECT * FROM users WHERE user_id=$agent";
  $res = $con->query($que);
      $val = mysqli_fetch_array($res);
  ?>
  <p><?php echo $val['name'] ?><br><?php echo $val['phone'] ?></p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $value['bed_room']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $value['living_room']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $value['parking']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Toilet"><?php echo $value['toilet']; ?></span> </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Full Name"/>
                <input type="text" class="form-control" placeholder="you@yourdomain.com"/>
                <input type="text" class="form-control" placeholder="your number"/>
                <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>