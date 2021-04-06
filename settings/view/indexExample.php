<!DOCTYPE html>
<html>
<head>
    <title>Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/styles/index.css">
    <link rel="stylesheet" href="https://use.typekit.net/kdi6adg.css">

</head>
<body>
<?php include('./settings/htmls/header.html');
include('./settings/htmls/cars_list.html');
include('settings/db.php');
require_once('settings/controller/empty_var.php');
//კავშირი
$con = new database();

//მონიშვნა
$result = new emptyvar();
$result->selectRow();
if (count($result->data) > 0) {
    foreach ($result->data as $row) {
        ?>

        <table class="td-list">
            <tr>
                <td><?php echo $row["brand"]; ?></td>
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


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
</body>
</html>