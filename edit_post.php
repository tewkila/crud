<?php
 @session_start();
 require_once('settings/db.php');
 $con = new database();
 require_once('settings/empty_var.php');
$data = [
    'myDate' => $_POST['myData']
    //'rrrr' =>1,
    //'myData' => $_POST['myData'],
    //'tttt'=>2
];
echo json_encode($data,JSON_UNESCAPED_UNICODE);
?>

<?php 
$result = new emptyvar();
$result->selectRow();
if ( count($result->data) > 0) {
    foreach ($result->data as $row){
        echo "<tr><td>" . $row["brand"]. "</td><td>" . $row["model"] ."</td><td>" . $row["date"] ."</td><td>" . $row["color"] ."</td><td>" . $row["petrol"] ."</td><td>" . $row["power"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }

?>