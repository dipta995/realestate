<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Agents</span>
    <h2>Agents</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer agents">

<div class="row">
  <div class="col-lg-8  col-lg-offset-2 col-sm-12">
      <!-- agents -->
      <?php 
      
      $con = new mysqli("localhost", "root", "", "realstate");
                                      
      $query = "SELECT * FROM users WHERE status='agent'";
      $result = $con->query($query);
      if ($result->num_rows > 0) {
          foreach ($result as $key => $value) {
      ?>
      <div class="row">
        <div class="col-lg-2 col-sm-2 "><a href="#"><img src="<?php echo $value['image'];?>" class="img-responsive"  alt="agent name"></a></div>
        <div class="col-lg-7 col-sm-7 "><h4><?php echo $value['name'];?></h4><p><?php echo $value['about_me'];?></p></div>
        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:abc@realestate.com"><?php echo $value['email'];?></a><br>
        <span class="glyphicon glyphicon-earphone"></span> <?php echo $value['phone'];?></div>
      </div>
      <!-- agents -->
      <?php }} ?>
      
      

      
     
  </div>
</div>


</div>
</div>

<?php include'footer.php';?>