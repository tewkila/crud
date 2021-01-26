 <?php
 @session_start();
 include('settings/db.php');
 include('settings/sign-up.php');
 
//კავშრი
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
?>

<!DOCTYPE html>
<html>
<head>
<title>Cars</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/register.css">
<link rel="stylesheet" href="https://use.typekit.net/kdi6adg.css">
</head>
<header> 
<a href="index.php" class="logo"><h2>carz.</h2></a>
<a href="index.php"><img src="img/arrow_btn.png" alt="arrow" class="arrow_btn"></a>
</header>
<body>

<?php
$signup = new signUp();
if (isset($_POST['sign-up'])) {
$signup->signUp();
}
 ?> 
<p class="title-log-in">register</p>

<!--  შესავსები ფორმა -->
<?php
if(isset($passValidation) && $passValidation == 1){
echo '<div class="alert alert-danger" role="alert">
        A simple danger alert—check it out!
      </div>';
}
      ?>
<form method="post" action="#" >
<label></label>
<div class="input-group-mine">
<label></label>
<input type="text" name="name" placeholder="name:" >
</div>
<div class="input-group-mine">
<input id="mail" type="mail" name="mail" placeholder="e-mail:" >
</div>
<div class="input-group-mine">
<label></label>
<input id="password" type="password" name="password" placeholder="password:">
</div>
<div class="input-group-mine">
<label></label>
<input id="password" type="password" name="password1" placeholder="repeat password:">
</div>
<div class="input-group-mine-btn">
<button class="btn" type="submit" value="sign-up" name="sign-up" >sign-up</button>
</div>
<a class="already" href="log-in.php">already have an account? log-in</a>
</form>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>