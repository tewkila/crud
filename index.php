<!DOCTYPE html>
<html>
<head>
<title>Cars</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/index.css">
<link rel="stylesheet" href="https://use.typekit.net/kdi6adg.css">
</head>
<body>
<header>
<a href="index.php" class="logo"><h2>carz.</h2></a>
<a href="register.php" class="admin_btn">
    <div class="base">
        <div class="shadow">
            <div class="light">
        <p>admin</p>
            </div> 
        </div>
    </div>
</a>
</header>

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
include('settings/db.php');
$con = new database();

//ცარიელი ცვლადები
include('settings/empty_var.php');
$empt = new emptyvar();

//მონიშვნა
$sql = "SELECT * ,info.id as info_id, type.id as info_type_id  FROM `info` INNER JOIN `type` ON info.id=type.type_id";
$result = $con->db->query($sql);
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
<h1>see <br> information <br> about different
cars.</h1>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>