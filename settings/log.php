<?php 
require_once('db.php');

class log extends database {
    public $login = array();
     function __construct() {
         parent::__construct();

         }

    public function logIn(){
        if(isset($_POST['log-in'])){
            $email = htmlspecialchars($_POST['mail']);
            $pass = md5(htmlspecialchars($_POST['password']));
            $sql = "SELECT `name` FROM `admin` WHERE `mail` = '$email' AND `password` = '$pass'";
            $result = $this->db->query($sql);
            if (isset($result->num_rows) && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                    $_SESSION["name"]  = $row['name'];
                }
            }
           
            if(isset($_SESSION["name"])){
                header ('Location: http://localhost/tekla/new-crud/admin.php');
            }
        }
        
        
    }

}

?>