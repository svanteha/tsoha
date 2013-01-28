<?php
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

<p>Olet kirjautunut käyttäjänä <?php echo $user->user_name?></p>

<?php if($user->admin){ ?>

<p>Olet admin</p>

<?php } ?>
<?php } else { ?>
<p><a href="sign_in.php">Kirjaudu sisään</a></p>
<?php } ?>
</div>
<div>
<a href="index.php">Etusivulle</a>
</div>
<br></br>

