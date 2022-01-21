<?php include'header.php';?>

<div class="">
    

  <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        <?php 

 $con = new mysqli("localhost", "root", "", "realstate");
                                      
      $query = "SELECT * FROM properties ORDER BY RAND() limit 5";
      $result = $con->query($query);
      if ($result->num_rows > 0) {
          foreach ($result as $i => $val) {
        ?>

        <style type="text/css">
 .bg-img-<?php echo $i+1; ?> {
  background-image: url(<?php echo $val['image_one']; ?>);
}

        </style>
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-<?php echo $i+1; ?>"></div>
              <h2><a href="property-detail.php?flatid=<?php echo $val['id'] ?>"><?php echo $val['bed_room']." Bed Rooms ".$val['living_room']." living room and ".$val['toilet']." toilet"; ?> on Sale</a></h2>
              <a href="property-detail.php?flatid=<?php echo $val['id'] ?>">
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $val['location']; ?></p>
              
              <cite><?php   $dis = round(($val['price']*$val['discount'])-(($val['price']*$val['discount'])/100));
        if ($dis!=0) {

          echo "<del>".$val['price']."Taka</del><br>".$dis."Taka";
        }else{
          echo $val['price']."Taka <br><br>";
        } ?></cite>
              </blockquote></a>
            </div>
          </div>
          <?php } }?>
      

        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Search </h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <form method="get" action="search.php">
          <input type="text" class="form-control" name="key" placeholder="Search of Properties">
          <div class="row">
            <div class="col-lg-4 col-sm-4 ">
              <select required name="cat" class="form-control">
                <option selected="true" disabled="disabled"  value="">--Choose--</option>
                 <?php
                   $query = "SELECT * FROM  category where flag=1 Order By cat_id desc";
                   $result = $con->query($query);
                   foreach ($result as $key => $value) {
                ?>
                <option value="<?php echo $value['cat_id']?>" ><?php echo $value['cat_name']?></option>
              <?php } ?>
                
              </select>
            </div>
           <!--  <div class="col-lg-3 col-sm-4">
              <select name="price" class="form-control">
                <option>Price</option>
                <option>150,000 - 200,000</option>
                <option>200,000 - 250,000</option>
                <option>250,000 - 300,000</option>
                <option>300,000 - above</option>
              </select>
            </div> -->
            <div class="col-lg-4 col-sm-4">
             <select required class="form-control" name="div" id="">
                  <option selected="true" disabled="disabled"  value="">Choose division</option>
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
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success" type="submit" name="search">Find Now</button>
              </div>
          </div>
          </form>
          
        </div>

        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
<!--           <p>Join now and get updated with all the properties deals.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>  -->       </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">  
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">
     
     <?php 
                     
      $query = "SELECT * FROM properties Order By id desc Limit 10";
      $result = $con->query($query);
      if ($result->num_rows > 0) {
          foreach ($result as $key => $value) {
     ?>
      <div class="properties">
        <div class="image-holder"><img src="<?php echo $value['image_one'] ?>" class="img-responsive" alt="properties"/>
          <div style="color:red;" class="status sold"><?php
            if ($value['quantity']==0) {
              echo "SOLD";
            }
          ?></div>
        </div>
        <h4><a href="property-detail.php?flatid=<?php echo $value['id'] ?>"><?php echo $value['title'];?> Sqft</a></h4>
        <p class="price">Price: 
         <?php  $dis = round(($value['price']*$value['discount'])-(($value['price']*$value['discount'])/100));
        if ($dis!=0) {

          echo "<del>".$value['price']."Taka</del><br>".$dis."Taka";
        }else{
          echo $value['price']."Taka <br><br>";
        }
        ?> </p>
        
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $value['bed_room']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $value['living_room']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $value['parking']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $value['kitchen']; ?></span> </div>
        <a class="btn btn-primary" href="property-detail.php?flatid=<?php echo $value['id'] ?>">View Details</a>
      </div>
     <?php }}else{ ?>
       <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with all the properties deals.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button> </div> <?php } ?>
      
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.php">Learn More</a></p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Recommended Properties</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">

            <?php
             
              if (isset($_SESSION['admin'])=='admin') {
            $userid =$_SESSION['user_id'];
            
            $usrqre = "SELECT * FROM users WHERE user_id = $userid ";                
                    $res = $con->query($usrqre);
                        $getvalue = mysqli_fetch_array($res);
                        $division = $getvalue['division'];
            $query = "SELECT * FROM properties WHERE division='$division' ORDER BY RAND() limit 3";
      $result = $con->query($query);
      if ($result->num_rows > 0) {
          foreach ($result as $i => $val) {
        ?>


            <div class="item <?php if($i==0){
              echo "active";
            }?>">
              <div class="row">
                <div class="col-lg-4"><img src="<?php echo $val['image_one'];?>" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php?flatid=<?php echo $val['id'] ?>"><?php echo $val['title'];?></a></h5>
                  <p class="price"><?php $dis = round(($val['price']*$val['discount'])-(($val['price']*$val['discount'])/100));
        if ($dis!=0) {

          echo "<del>".$val['price']."Taka</del><br>".$dis."Taka";
        }else{
          echo $val['price']."Taka <br><br>";
        } ?></p>
                  <a href="property-detail.php?flatid=<?php echo $val['id'] ?>" class="more">More Detail</a> </div>
              </div>
            </div>
          <?php } } }else{ ?>
             <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get Recommended properties deals.</p>
          <a class="btn btn-info" href="login.php">Login</a>        </div>
      </div>
    <?php } ?>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>