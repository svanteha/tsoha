<?php
 require('avusteet/kanta.php');
 require('avusteet/yla.php');
 $user = user_info();

 $user_query = create_connection()->prepare("SELECT * FROM Users ORDER BY username");
 $user_query->execute();
?>

<?php if(!$user) { ?>
	<p>Tervetuloa Deittipalveluun! Täältä voit löytää itsellesi kumppanin!</p>
	<p>Rekisteröidy tai kirjaudu sisään.</p>
	<p><a href="register.php">Rekisteröidy</a></p>

<?php } ?>

<?php if($user) { ?>


<?php } ?>


<h2>Käyttäjälista</h2>

<ul>
<?php while($user1 = $user_query->fetchObject()) {
	if ($user1->user_id != $user->user_id) { ?>
		<li><a href="own_site.php?user_id=<?php echo $user1->user_id; ?>"><?php echo $user1->username ?></a></li>
<?php	}
	else { ?>
		<li><?php echo $user1->username ?></li>
<?php	}
 } ?>
</ul>

<?php
 require('avusteet/ala.php');
?>
