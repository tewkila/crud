<?php 
require_once('db.php');

class delete extends database {
     function __construct() {
         parent::__construct();

         }

    public function deleteRow(){
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$this->db->query("DELETE FROM `type` WHERE id=$id" ) or die($mysqli->error());
$this->db->query("DELETE FROM `info` WHERE id=$id" ) or die($mysqli->error());
echo ('<div class="alert alert-success" role="alert">
successfully deleted!
</div>');
}
    }

}

?>