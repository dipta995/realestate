<?php include 'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
  <?php


$con = new mysqli("localhost", "root", "", "realstate");  
 
if(isset($_POST['Submit'])){
    $email = $_POST['email'];
    $time = time();
 

    if (empty($email) ) {
        echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
    }
    else{
        $querys = "SELECT * FROM users WHERE email='$email'";
                                            
        $results = $con->query($querys);

        if ($results->num_rows > 0) {
            echo "Already Registered";
        }else{

      $sql = "INSERT INTO users(email,otp)VALUES('$email','$time')"; 
       

if ($con->query($sql) === TRUE) {
   
      
  require("mail/src/PHPMailer.php");
  require("mail/src/SMTP.php");
  require("mail/src/Exception.php");
  require("mail/constants.php");
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  try {      
        $mail->IsSMTP(); 
       $mail->SMTPDebug = 0; 
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = "sandbox.smtp.mailtrap.io";
        $mail->Port = 2525; 
        $mail->IsHTML(true);
        $mail->Username = "2230d510acf7c8";
        $mail->Password ="ea31c154d9d18a";
        $mail->SetFrom("tanishrahman634@gmail.com");
   
         $mail->isHTML(true); 
         $mail->Subject = "Confirmation";
         $mail->Body = "<h4>http://localhost/realestate/register.php?otp=".$time."</p>";
        $mail->AddAddress($email);
         $mail->AddAddress("tanishrahman634@gmail.com");
        if($mail->Send()){
          //echo $agentemail;
          echo "<span class='success-msg'>New record created successfully.Check Email:<a href='#'>".$email."</a></span>";
        }else{
 
        }
        
    } catch (Exception $e) {
         
    }
        

}  

 

else {
    echo "Error: " . $sql . "<br>" . $con->error;
    }

}

}    
}

?>
        <form action="" method="post">

        
            <input type="email" class="form-control" placeholder="Enter Email" name="email">
             
            

          
            <button type="submit" class="btn btn-success" name="Submit">Send Me Email</button>
            <p>Alerady have an account ?<a href="login.php">Login</a></p>
        </form>

          


                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>