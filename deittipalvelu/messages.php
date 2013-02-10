<?php
require('avusteet/kanta.php');
require('avusteet/yla.php');

if (!signed_in()) {
	header('Location: sign_in.php');
}

$select_message = false;
$user_query = create_connection()->prepare("SELECT user_id, username FROM Users WHERE user_id = ?");

if(isset($_GET["message_id"])) {
	$select_message = true;
	$one_query = create_connection()->prepare("SELECT * FROM Messages WHERE message_id = ?");
	$one_query->execute(array($_GET["message_id"]));
	$msg = $one_query->fetchObject();
	$user_query->execute(array($msg->from_user_id)); 
	$msg_sender = $user_query->fetchObject();	
	
}
$user = user_info();
$message_query = create_connection()->prepare("SELECT * FROM Messages WHERE to_user_id = ?");
$message_query->execute(array($user->user_id));



?>




<?php if ($select_message) { ?>

	<p><b>Viestin aihe:</b> <?php echo $msg->subject; ?></p>
	<p><b>Lähettäjä:</b> <?php echo $msg_sender->username; ?></p>
	<p><b>Lähetetty:</b> <?php echo $msg->date_sent; ?></p>
	<p><b>Viesti:</b> <?php echo $msg->message; ?></p>
	<form action="create_message.php" method="POST" >
		<input type="hidden" name="to_user_id" value="<?php echo $msg_sender->user_id ?>" />
		<input type="submit" value="Vastaa" />
	</form>
	<br>
	
<?php } ?>


<h3>Viestit</h3>
<table>
<th>Lähettäjä</th><th>Aihe</th><th>Poista</th>
<?php while($message = $message_query->fetchObject()) { $user_query->execute(array($message->from_user_id)); $x = $user_query->fetchObject();?>
	<tr>
	<td><a href="own_site.php?user_id=<?php echo $x->user_id; ?>"><?php echo $x->username; ?></td>
	<td><a href="messages.php?message_id=<?php echo $message->message_id; ?>"><?php echo $message->subject ?></a></td>
	<td>
	<form action="message_logic.php" method="POST">
		<input type="hidden" name="delete_id" value="<?php echo $message->message_id; ?>" />
		<input type="submit" value="Poista" />
	</form>
	</td>	
	</tr>
<?php } ?>
</table>

<?php
require('avusteet/ala.php');
?>

