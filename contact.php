<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->


  <div class="container">
  <div class="spacer">
  <div class="row contact">
     <div class="col-lg-3 col-sm-3 "> </div>
    <div class="col-lg-6 col-sm-6 ">
       <?php
 
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                         
                        $message = mysqli_real_escape_string($con,$_POST['message']);                  
                       


                        if (empty($name) ||empty($phone) | empty($email) ||empty($message)) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }

                        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                         echo "<span >Only letters and white space allowed for Name</span>";
                        }
                         
                        elseif ( strlen ($phone) != 11) {  
                                echo "<span class='error-msg'>Phone Only 11 Digit</span>";  
                                         
                            }elseif ( strlen ($message) > 100) {  
                                echo "<span class='error-msg'>Address maximum 120 words</span>";  
                                         
                            } 
                            
                        else{
                 
                          $sql = "INSERT INTO contacts (name,email,phone,message)VALUES('$name','$email','$phone','$message')";
                            

                    if ($con->query($sql) === TRUE) {

                      echo "<span class='error-msg'>New Feedback sent successfully</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error__;
                    }
                        }

                    }

?>
               <form method="post">

                  <input type="text" required name="name" value="<?php  if (isset($_SESSION['admin'])=='admin') { echo $_SESSION['name']; } ?>" class="form-control" placeholder="Full Name">
                <input type="email" value="<?php  if (isset($_SESSION['admin'])=='admin') { echo $_SESSION['email']; } ?>" required name="email" class="form-control" placeholder="Email Address">
                <input type="number" value="<?php  if (isset($_SESSION['admin'])=='admin') { echo $_SESSION['phone']; } ?>" required name="phone" min="0" class="form-control" placeholder="Contact Number">
                <textarea rows="6" class="form-control" name="message" placeholder="Message Maximum 100 words"></textarea>
                   <button type="submit" class="btn btn-success" name="submit">Send Message</button>
               </form>
        </div>
  <div class="col-lg-3 col-sm-3 ">
<!--   <div class="well"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div> -->
  </div>
</div>
</div>
</div>

<?php include'footer.php';?>