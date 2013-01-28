<?php
 require('avusteet/yla.php');
 require('avusteet/kanta.php');
 $user = user_info();

 $user_query = create_connection()->prepare("SELECT * FROM Users");
 $user_query->execute();


?>

<p>Tervetuloa Deittipalveluun! Täältä voit löytää itsellesi kumppanin!</p>
<p>Rekisteröidy tai kirjaudu sisään.</p>

<h2>Käyttäjälista</h2>

<ul>
<?php while($us = $user_query->fetchObject()) { ?>
<li><a><?php echo $us->user_name; ?></a></li>
<?php } ?>
</ul>





<?php
 require('avusteet/ala.php');
?>
