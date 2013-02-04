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
<p>Terve <?php echo $user->first_name ?></p>
<?php if($user->admin){ ?>
<p>Olet ADMIN</p>
<p><a href="user_list.php">Käyttäjien hallinta</a></p>
<?php } ?>
<?php } else { ?>
<p><a href="sign_in.php">Kirjaudu sisään</a></p>
<?php } ?>
</div>

<div>
<a href="index.php">Etusivulle</a>
</div>
<br></br>

