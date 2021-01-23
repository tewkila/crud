<?php
class database {
    // private პირადი 
    // protected დაცული
    // public საერთო
    // static სტატიკური
    public $db;
    function __construct(/*int $int = 0*/) {
        $conn = mysqli_connect("localhost", "root", "", "crud");
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        // $T = $this -> select($conn);
        $this->db = $conn;
        // return $conn; არ შეიძლება
    }
    static function select($db){
        $sql = "SELECT * ,info.id as info_id, type.id as info_type_id  FROM `info` INNER JOIN `type` ON info.id=type.type_id";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            $selREsult = array();
            while($row = $result->fetch_assoc())  
            {
                // var_dump($row);
                $selREsult[] =  $row;
            }
            return $selREsult;
        }
    }
}
function rame(){

}
//database::__construct() სტატიკურობისთვის
$con = new database();
var_dump($con->db);
// var_dump($con);
$dataSelect = database::select($con->db);
var_dump($dataSelect);

// $sql = "SELECT * ,info.id as info_id, type.id as info_type_id  FROM `info` INNER JOIN `type` ON info.id=type.type_id";
// $result = $con->query($sql);
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc())  
//     {
//         var_dump($row);
//     }
// }
?>