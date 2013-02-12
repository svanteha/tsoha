<?php
require ('avusteet/kanta.php');
require ('avusteet/yla.php');

if (!signed_in()) {
	header('Location: sign_in.php');
}

if (isset($_POST["to_user_id"])) {
	$to_user = user_infoa($_POST["to_user_id"]);
		
}
else if (isset($_GET["to_user_id"])) {
	$to_user = user_infoa($_GET["to_user_id"]);
		
}
else {
	header('Location: index.php');
}
?>

<h3>Viesti käyttäjälle: <?php echo $to_user->username ?></h3>

<?php if (isset($_SESSION["message_info"])) {
	echo "<p>".$_SESSION["message_info"]."</p>";
	unset($_SESSION["message_info"]);
}
?>

<form action="message_logic.php" method="POST" id="message_form">
<input type="hidden" name="to_user_id" value="<?php echo $to_user->user_id; ?>" />
<input type="text" placeholder="Aihe" name="subject" />
<input type="submit" value="Lähetä" />
</form>
<br>
<textarea placeholder="Remember, be nice!"  rows="4" cols="50" name="message" form="message_form"><?php echo $_SESSION["message"]; unset($_SESSION["message"]); ?></textarea>



<?php>
require ('avusteet/ala.php');
?>
