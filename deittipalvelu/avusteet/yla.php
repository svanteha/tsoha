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
<p><a href="out.php">Log out</a></p>
<p><a href="own_site.php">Oma sivu</a></p>
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

