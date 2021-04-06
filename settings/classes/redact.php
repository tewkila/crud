<?php
require_once('settings/db.php');

class redact extends database{
    public $edit;
    function __construct() {
       
        parent::__construct();
        
    }

    public function redactRow(){
        
    if (isset($_GET['edit'])) {
        $id = intval($_GET['edit']);
        $update = true;
        $result =  $this->db->query("SELECT * FROM `info` INNER JOIN `type` ON info.id=type.type_id WHERE info.id = $id" ) or die($mysqli->error());
        $n = $result->fetch_array();
    if (isset($n['brand']))
        {   
        $brand = $n['brand'];
        $model = $n['model'];
        $date = $n['date'];
        $color = $n['color'];
        $petrol = $n['petrol'];
        $power = $n['power'];
        }
   

        }
    }

    public function update($rov){
        
        if (isset($rov['id'])) {
            $brand = $rov['brand'];
            $model = $rov['model'];
            $date = $rov['date'];
            $color = $rov['color'];
            $petrol = $rov['petrol'];
            $power = $rov['power'];
            $id = $rov['id'];
            $type_id =  $this->db->query("UPDATE type SET `color` = '$color', `petrol` = '$petrol', `power` = '$power' WHERE `id` = $id");
            $result = $this->db->query("SELECT type_id  FROM type  WHERE `id` = $id");
            $info_id = $result->fetch_assoc();
             $this->db->query("UPDATE info SET `brand` = '$brand', `model` = '$model', `date` = '$date' WHERE `id` = ".$info_id["type_id"].""); 
           
                }
    }
}

?>