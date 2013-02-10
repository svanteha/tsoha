<?php
require('avusteet/kanta.php');
require('avusteet/yla.php');

$user = user_info();
$message_query = create_connection()->prepare("SELECT * FROM Messages WHERE to_user_id = ?");
$message_query->execute(array($user->user_id));

?>

<h2>Viestit</h2>
<table>
<th>Lähettäjä</th><th>Aihe</th>
<?php while($message = $message_query->fetchObject()) { $user_query->execute(array($message->from_user_id)); $x = $user_query->fetchObject();?>
	<tr>
	<td><a href="messages.php?message_id=<?php echo $message->message_id; ?>"><?php echo $x->username; ?></a></td>
	<td><?php echo $message->subject ?></td>
	</tr>
<?php } ?>
</table>

<?php
require('avusteet/ala.php');
?>

