<?php
 @session_start();
 if(isset($_SESSION["name"])){
?>
<!DOCTYPE html>
<html>
<head>
<title>Cars</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/edit.css">
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
            <th>action</th>
            </tr>
        </table>    
<?php
//კავშირი
include('settings/db.php');
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

//წაშლა
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
     $con->db->query("DELETE FROM type WHERE id=$id" ) or die($mysqli->error());
    }

// რედაქტირება 
include('settings/redact.php');
$redct = new redaqtireba();



$sql = "SELECT * ,info.id as info_id, type.id as info_type_id  FROM `info` INNER JOIN `type` ON info.id=type.type_id";
$result =  $con->db->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc())  
{ ?> 

<table class="td-list">
<tr>  
<td><?php echo $row["brand"];?></td>  
<td><?php echo $row["model"]; ?></td>  
<td><?php echo $row["date"]; ?></td> 
<td><?php echo $row["color"]; ?></td> 
<td><?php echo $row["petrol"]; ?></td> 
<td><?php echo $row["power"]; ?></td>
<td><button  type="button" class="editt_btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></button></a>
<a href="edit.php?delete=<?php echo $row['id']; ?>" class="delete_btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a></td>
</tr>  
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!--  შესავსები ფორმა -->
<form method="post" action="#" >
<label></label>
<div class="input-group-mine">
<input type="text" name="brand" placeholder="brand:" value="<?php echo $brand; ?>">
</div>
<div class="input-group-mine">
<label></label>
<input type="text" name="model" placeholder="model:" value="<?php echo $model; ?>">
</div>
<div class="input-group-mine">
<label></label>
<input type="date" name="date" placeholder="date:" value="<?php echo $date; ?>">
</div>
<div class="input-group-mine">
<label></label>
<input type="text" name="color" placeholder="color:" value="<?php echo $color; ?>">
</div>
<div class="input-group-mine">
<label></label>
<input type="text" name="petrol" placeholder="petrol:" value="<?php echo $petrol; ?>">
</div>
<div class="input-group-mine">
<label></label>
<input type="text" name="power" placeholder="power:" value="<?php echo $power; ?>">
</div>
<?php if($update == true): ?>
    <button class="btn" type="submit" name="update" >Update</button>
<?php else: ?>
    <button class="btn" type="submit" name="save" >Save</button>
<?php endif; ?>
</form>
</div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
<?php
 }
 else
 {
  header ('Location: http://localhost/tekla/new-crud/log-in.php');
 }
?>