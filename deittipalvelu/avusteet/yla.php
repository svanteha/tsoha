<?php 
  require('avusteet/kanta.php');
  $user = user_info();
?>
<!DOCTYPE html>
<html>
<head>
<title>Deittipalvelu</title>
<body>
<h1>Deittipalvelu</h1>
<div>
<?php if($user){ ?>
<p>Terve <?php echo $user->username ?></p>
<?php if($user->admin){ ?>
<p>Olet ADMIN</p>
<?php } ?>
<?php } else { ?>
<p><a href="sign_in.php">Kirjaudu sisään</a></p>
<?php } ?>
</div>
<div>
<a href="index.php">Etusivulle</a>
</div>
<br></br>

