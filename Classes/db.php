

<?php
 
class DBClass
{
    public $con;

    public function connection(){

        $this->con = new mysqli("localhost", "root", "", "realstate");
        
        
        if ($this->con->connect_error) {
          die("Connection failed: " . $this->con->connect_error);
        }
        
        
    }
}

?>