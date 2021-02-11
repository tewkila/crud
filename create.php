<?php
 @session_start();
 include('settings/db.php');
 require_once('settings/save.php');
 require_once('settings/empty_var.php');
 if(isset($_SESSION["name"])){
?>
<!DOCTYPE html>
<html>
<head>
<title>Cars</title>
<link rel="stylesheet" type="text/css" href="styles/create.css">
<link rel="stylesheet" href="https://use.typekit.net/kdi6adg.css">
</head>
<body>
<header>
<a href="index.php" class="logo"><h2>carz.</h2></a>
<a href="admin.php"><img src="img/arrow_btn.png" alt="arrow" class="arrow_btn"></a>
<div class="cars-list">
    <div class="base-cars-list">
        <div class="shadow-cars-list">
         <div class="light-cars-list">
        <table>
            <tr>
            <th>brand</th>
            <th>model</th>
            <th>data</th>
            <th>color</th>
            <th>petrol</th>
            <th>power</th>
            </tr>
        </table>    
<?php
//კავშირი
$con = new database();

//ცარიელი ცვლადები
$brand = "";
$model = "";
$date = "";
$color = "";
$petrol = "";
$power = "";
$id = 0;
$type_id = 0;
$update = false;
$name = "";
$mail = "";
$password = "";
$password1 = "";

//შენახვ
if (isset($_POST['save'])) {
$save = new save();
$save->saveInfo($_POST);
}


//მონიშვნა
$result = new emptyvar();
$result->selectRow();
if ( count($result->data) > 0) {
  foreach ($result->data as $row){
 ?>  


<table class="td-list">
<tr>  
<td><?php echo $row["brand"];?></td>  
<td><?php echo $row["model"]; ?></td>  
<td><?php echo $row["date"]; ?></td> 
<td><?php echo $row["color"]; ?></td> 
<td><?php echo $row["petrol"]; ?></td> 
<td><?php echo $row["power"]; ?></td> 
</tr>  
</table>

<?php  
}

echo "</table>";
}  
?>
         </div>
        </div>
    </div>
</div>

<p class="create">create</p>

<!--  შესავსები ფორმა -->
<form method="post" action="#" >
<label></label>
<div class="input-group">
<input type="text" name="brand" placeholder="brand:" value="<?php echo $brand; ?>">
</div>
<div class="input-group">
<label></label>
<input type="text" name="model" placeholder="model:" value="<?php echo $model; ?>">
</div>
<div class="input-group">
<label></label>
<input type="date" name="date" placeholder="date:" value="<?php echo $date; ?>">
</div>
<div class="input-group">
<label></label>
<input type="text" name="color" placeholder="color:" value="<?php echo $color; ?>">
</div>
<div class="input-group">
<label></label>
<input type="text" name="petrol" placeholder="petrol:" value="<?php echo $petrol; ?>">
</div>
<div class="input-group">
<label></label>
<input type="text" name="power" placeholder="power:" value="<?php echo $power; ?>">
</div>
<div class="input-group">
    <button class="btn" type="submit" name="save" >Save</button>
</div>
</form>
</body>
</html>
<?php
 }
 else
 {
  header ('Location: http://localhost/tekla/new-crud/log-in.php');
 }
?>