<?php 
require_once('db.php');

class signup extends database {
    public $signup = array();
     function __construct() {
         parent::__construct();

         }

    public function signUp(){
        if (isset($_POST['sign-up'])) {
            if($_POST['password'] == $_POST['password1'])
            {
            $name = $_POST['name'];
            $mail = htmlspecialchars($_POST['mail']);
            $password = md5(htmlspecialchars($_POST['password']));
            $email =  $this->db->query( "SELECT `mail` FROM `admin` WHERE `mail` = '$mail'");
                if ($email->num_rows == 0) {
                        $id =  $this->db->query("INSERT INTO admin (`name`, `mail`, `password`) VALUES ('$name','$mail','$password')");
                        $sql = "SELECT `name` FROM `admin` WHERE `mail` = '$mail' AND `password` = '$password'";
                        $result =  $this->db->query($sql); 
                        if (isset($result->num_rows) && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                                $_SESSION["name"]  = $row['name'];
                            }
                            header ('Location: http://localhost/tekla/new-crud/admin.php');
                        }
                }
                else{
                    $emailValidation = true;
                }
            }
            else{
                $passValidation = true;  
            }
        
        }
        
    }

}

?>