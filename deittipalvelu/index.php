<?php
 require('avusteet/kanta.php');
 require('avusteet/yla.php');
 $user = user_info();

 $user_query = create_connection()->prepare("SELECT * FROM Users");
 $user_query->execute();
?>

<?php if(!$user) { ?>
<p>Tervetuloa Deittipalveluun! Täältä voit löytää itsellesi kumppanin!</p>
<p>Rekisteröidy tai kirjaudu sisään.</p>

<?php } ?>

<?php if($user) { ?>
<p><a href="out.php">Log out</a></p>

<?php } ?>


<h2>Käyttäjälista</h2>

<ul>
<?php while($user1 = $user_query->fetchObject()) { ?>
	<li><?php echo $user1->username; ?></li>
<?php } ?>
</ul>

<?php
 require('avusteet/ala.php');
?>
