<?php
require_once('db.php');

class emptyvar extends database {
   public $data = array();
    function __construct() {

        parent::__construct();
        
        }

        public function selectRow(){
            $sql = $this->db->query("SELECT * ,info.id as info_id, type.id as info_type_id  FROM `info` INNER JOIN `type` ON info.id=type.type_id");
            $result = $sql->fetch_assoc();
            while($row =  $sql->fetch_assoc())  {
                $this->data[] = $row;
            }
        }
    }
?>