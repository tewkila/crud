<?php
@session_start();

//ბაზასთან კავშირი
require_once('settings/db.php');

//მონიშვნა
$con = new database();
require_once('settings/controller/empty_var.php');
$result = new emptyvar();

$result->selectRowEdit($_POST['myData']);
echo json_encode($result->edit_roe, JSON_UNESCAPED_UNICODE);

?>