<?php
echo '<style type="text/css">';
include 'avusteet/stylesheets/style.css';
echo '</style>';
$user = user_info();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deittipalvelu</title>
</head>
<body>
	<header>
		<h1><center>Deittipalvelu</center></h1>
		<nav>
			<ul>
				<?php if(!$user) { ?>
					<li><a href="index.php">Etusivu</a></li>
					<li><a href="sign_in.php">Kirjaudu sisään</a></li>
				<?php } ?>				
				<?php if($user){ ?>
					<li><a href="index.php">Etusivu</a></li>					
					<li><a href="own_site.php">Oma sivu</a></li>
					<li><a href="messages.php">Viestit</a></li>
					<li><a href="out.php">Log out</a></li>
				<?php if($user->admin){ ?>
					<li><a href="user_list.php">Käyttäjien hallinta</a></li>
				<?php } }?>
				
			</ul>
		</nav>
	</header>

<div>
<?php if($user) { ?>
<p>Terve <?php echo $user->first_name ?></p>
<?php } ?>

</div>

