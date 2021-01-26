<?php 
require_once('db.php');

class save extends database {
    public $save = array();
     function __construct() {
         parent::__construct();

         }

    public function saveInfo(){
        if (isset($_POST['save'])) {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $date = $_POST['date'];
            $color = $_POST['color'];
            $petrol = $_POST['petrol'];
            $power = $_POST['power'];
            $type_id = $this->db->query("INSERT INTO info (`brand`, `model`, `date`) VALUES ('$brand','$model','$date')"); 
            $info_id = mysqli_insert_id($this->db);
             $this->db->query("INSERT INTO type (`type_id`, `color`, `petrol`, `power`) VALUES ($info_id,'$color','$petrol','$power')"); 
         }
        
    }

}

?>