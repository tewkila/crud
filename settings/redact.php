<?php
require_once('db.php');

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
    if (isset($_POST['update'])) {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $date = $_POST['date'];
        $color = $_POST['color'];
        $petrol = $_POST['petrol'];
        $power = $_POST['power'];
        $type_id =  $this->db->query("UPDATE info SET `brand` = '$brand', `model` = '$model', `date` = '$date' WHERE `id` = $id"); 
        $this->db->query("UPDATE type SET `color` = '$color', `petrol` = '$petrol', `power` = '$power' WHERE `type_id` = $id"); 
            }

        }
    }
}

?>