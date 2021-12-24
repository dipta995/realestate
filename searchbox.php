<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Search </h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <form method="get" action="search.php">
          <input type="text" class="form-control" placeholder="Search of Properties">
          <div class="row">
            <div class="col-lg-4 col-sm-4 ">
              <select class="form-control">
                 <?php
                   $query = "SELECT * FROM  category where flag=1 Order By cat_id desc";
                   $result = $con->query($query);
                   foreach ($result as $key => $value) {
                ?>
                <option value="<?php echo $value['cat_name']?>" ><?php echo $value['cat_name']?></option>
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
             <select class="form-control" name="division" id="">
                  <option  value="">Choose division</option>
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