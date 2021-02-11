<?php 
require_once('db.php');

class save extends database {
    public $save = array();
     function __construct() {
         parent::__construct();

         }

    public function saveInfo($post = null){
        if (isset($post['save'])) {
            $brand = $post['brand'];
            $model = $post['model'];
            $date = $post['date'];
            $color = $post['color'];
            $petrol = $post['petrol'];
            $power = $post['power'];
            $type_id = $this->db->query("INSERT INTO info (`brand`, `model`, `date`) VALUES ('$brand','$model','$date')"); 
            $info_id = mysqli_insert_id($this->db);
             $this->db->query("INSERT INTO type (`type_id`, `color`, `petrol`, `power`) VALUES ($info_id,'$color','$petrol','$power')"); 
         }
        
    }

}

?>