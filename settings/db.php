<?php

class database {
    public $db;
    function __construct() {
        $conn = mysqli_connect("localhost", "root", "", "crud");
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

        }

        $this->db = $conn;
    }
}
?>
