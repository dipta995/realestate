<?php
include 'db.php';
class ClassName extends DBClass
{
    public function login($email,$password)
    {
        $query = "select * from users where email=$email and password=$password and status = 'admin";
        
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {

         }else{
             echo "error";
         }
    }
}

?>