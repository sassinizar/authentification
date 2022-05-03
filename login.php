<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['login'])){
  $login = stripslashes($_REQUEST['login']);
  
  $pass = stripslashes($_REQUEST['pass']);
  
    $query = "SELECT * FROM `user` WHERE login='$login' and pass='$pass'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['login'] = $login;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Welcome</h1>
<input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">
<input type="text" class="box-input" name="pass" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>