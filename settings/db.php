<?php
class database {
    public $db;
    function __construct(/* int $int */) {
        $conn = mysqli_connect("localhost", "root", "", "crud");
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

        }
        // $T = $this -> select($conn);
        $this->db = $conn;
        // return $conn; ar sheudzlia
    }
}
?>
