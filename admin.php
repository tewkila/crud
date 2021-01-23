<?php
 @session_start();
 if(isset($_GET['log-out']) && $_GET['log-out'] == 1){
    session_destroy();
}
 if(isset($_SESSION["name"])){

?>
<!DOCTYPE html>
<html>
<head>
<title>Cars</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/admin.css">
<link rel="stylesheet" href="https://use.typekit.net/kdi6adg.css">
</head>
<body>
<a class="log-out" href="?log-out=1">log-out</a>
<header>
<a href="index.php" class="logo"><h2>carz.</h2></a>
<a href="index.php"><img src="img/arrow_btn.png" alt="arrow" class="arrow_btn"></a>
</header>
<a href="create.php" class="create_btn">
    <div class="base">
        <div class="shadow">
            <div class="light">
        <p>create</p>
            </div> 
        </div>
    </div>
</a>
<a href="edit.php" class="edit_btn">
    <div class="base">
        <div class="shadow">
            <div class="light">
        <p>edit</p>
            </div> 
        </div>
    </div>
</a>
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