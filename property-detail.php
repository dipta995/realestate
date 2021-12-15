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
  $query = "SELECT * FROM properties left join category on category.cat_id=properties.cat_id left join users on users.user_id =properties.agent_id WHERE id=$flatid";
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
                  <h5><a href="property-detail.php?flatid=<?php echo $data['id'] ?>"><?php echo $data['title'] ?></a></h5>
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

<h2><?php  echo $value['title']; ?></h2>
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
  <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID NO</th>
                                            <th>Flat (Quantity)</th>
                                            
                                            <th>sqft</th>
                                            <th>Flat Location</th>
                                            
                                            <th>RegularPrice</th>
                                            <th>Discount price</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                         
                                       
                                        <tr>
                                            <td><?php echo $value['id']; ?></td>
                                            <td><?php echo $value['bed_room']." bed".$value['living_room']." living room". $value['kitchen']." kitchen". $value['belkuni']." belkuni". $value['toilet']." toilet". $value['parking']." parking" . "(".$value['quantity'].")"; ?> </td>
                                         
                                            <td><?php echo $value['sqft']; ?> Sqft</td>
                                            <td><?php echo $value['floar']; ?> </td>
                                            
                                            <td><?php echo $value['price']; ?> Taka</td>
                                            <td><?php echo $value['discount']."% <br>". round(((100-$value['discount'])*$value['price'])/100); ?>Taka</td>
                                          
                                           
                                             
                                    </tbody>
                                </table>
                            </div>
  
  <div>

    <?php echo $value['description'];?>
  </div>
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
      $agentemail = $val['email'];
      
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
  <h4 class="sent-notification"></h4>

  <?php


 if (isset($_POST['sendmsg'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $message = $_POST['message'];
   
  $stateid = $_POST['id'];
  $link = "http://localhost/realestate/property-detail.php?flatid=".$stateid;

   $querysql = "INSERT INTO orders(name,email,phone,message,status,property_id)VALUES ('$name','$email','$phone','$message','0','$stateid')";

   if ($con->query($querysql) === TRUE) {

  require("mail/src/PHPMailer.php");
 require("mail/src/SMTP.php");
 require("mail/src/Exception.php");
 require("mail/constants.php");
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 try {      
       $mail->IsSMTP(); 
      //$mail->SMTPDebug = 1; 
       $mail->SMTPAuth = true;
       $mail->SMTPSecure = 'ssl'; 
       $mail->Host = "smtp.gmail.com";
       $mail->Port = 465; 
       $mail->IsHTML(true);
       $mail->Username = "tanishrahman634@gmail.com";
       $mail->Password =PASSWORD;
       $mail->SetFrom("tanishrahman634@gmail.com");
  
        $mail->isHTML(true); 
        $mail->Subject = "Customer details";
        $mail->Body = "<h4>".$name."(".$email.$phone.")"."</h4> <p>".$message."</p><br>".$link;
       $mail->AddAddress($agentemail);
        $mail->AddAddress("tanishrahman634@gmail.com");
       if($mail->Send()){
         //echo $agentemail;
      echo "Record Accepted Successfully";
       }else{

       }
       
   } catch (Exception $e) {
        
   }


}else{
  echo "Error: " . $querysql . "<br>" . $con->error.__LINE__;
}
}
?>
		<form method="post"  action="">
                <input type="hidden" id="nane" class="form-control" name="id" value="<?php echo $flatid;?>"/>
               
                <input type="text" id="nane" class="form-control" name="name" placeholder="Full Name"/>
                <input type="text" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" readonly name="email" placeholder="you@yourdomain.com"/>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="your number"/>
                <textarea rows="6" class="form-control" name="message" id="message" placeholder="Whats on your mind?"></textarea>
      <!-- <button type="submit" class="btn btn-primary" name="sendmsg">Send Message</button> -->
            <button class="btn btn-primary" type="submit" name="sendmsg">Send Message</button>
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