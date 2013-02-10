<?php 
    $user = user_info();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" ></meta>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Deittipalvelu</title>
</head>
<body>
	<header>
		<h1>Deittipalvelu</h1>
		<nav>
			<ul>
				<?php if($user){ ?>
					<li><a href="out.php">Log out</a></li>
					<li><a href="own_site.php">Oma sivu</a></li>
				<?php if($user->admin){ ?>
					<li><a href="user_list.php">Käyttäjien hallinta</a></li>
				<?php } ?>
				<?php } else { ?>
					<li><a href="sign_in.php">Kirjaudu sisään</a></li>
				<?php } ?>
			</ul>
		</nav>
	</header>

<div>
<?php if($user) { ?>
<p>Terve <?php echo $user->first_name ?></p>
<?php } ?>
<a href="index.php">Etusivulle</a>
</div>

