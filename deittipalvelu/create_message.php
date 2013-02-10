<?php
require ('avusteet/kanta.php');
require ('avusteet/yla.php');

if (isset($_POST["to_user_id"])) {
	$to_user = user_infoa($_POST["to_user_id"]);
	$user = user_info();	
}
else {
	header('Location: own_site.php');
}
?>

<h3>Viesti käyttäjälle: <?php echo $to_user->username ?></h3>

<form action="message_logic.php" method="POST" id="message_form">
<input type="hidden" name="from_user_id" value="<?php echo $user->user_id; ?>" />
<input type="hidden" name="to_user_id" value="<?php echo $to_user->user_id; ?>" />
Aihe: <input type="text" name="subject" />
<input type="submit" value="Lähetä" />
</form>
<br>
<textarea rows="4" cols="50" name="message" form="message_form">
Lisää viestisi tähän...</textarea>



<?php>
require ('avusteet/ala.php');
?>
