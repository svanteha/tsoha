<?php
require ('avusteet/kanta.php');

if (isset($_POST['banned'])) {
	$user = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
	$user->execute(array($_POST['banned']));
	$xuser=$user->fetchObject();
	if($xuser->banned) {
		$user_query1 = create_connection()->prepare("UPDATE Users SET banned = false WHERE user_id = ?");
		$user_query1->execute(array($xuser->user_id));
	}
	else {
		$user_query2 = create_connection()->prepare("UPDATE Users SET banned = true WHERE user_id = ?");
		$user_query2->execute(array($xuser->user_id));
	}
}

if (isset($_POST['del'])) {

	$user = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
	$user->execute(array($_POST['del']));
	$del_user=$user->fetchObject();

	$del_query = create_connection()->prepare("DELETE FROM Users WHERE user_id = ?");
	$del_query->execute(array($del_user->user_id));


}

if (isset($_POST['setAdmin'])) {
	$user = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
	$user->execute(array($_POST['setAdmin']));
	$xuser=$user->fetchObject();
	if($xuser->admin) {
		$user_query1 = create_connection()->prepare("UPDATE Users SET admin = false WHERE user_id = ?");
		$user_query1->execute(array($xuser->user_id));
	}
	else {
		$user_query2 = create_connection()->prepare("UPDATE Users SET admin = true WHERE user_id = ?");
		$user_query2->execute(array($xuser->user_id));
	}
}

$user_query = create_connection()->prepare("SELECT * FROM Users ORDER BY username");
$user_query->execute();

require ('avusteet/yla.php');

if(!$user->admin) {
	die("Sinulla ei ole asiaa tänne!");
}
?>

<h2>Käyttäjälista</h2>

<table>
<th>Käyttäjä </th><th> Ban </th><th> Admin </th><th> Delete user</th>
<?php while($nuser = $user_query->fetchObject()) { ?>
	<tr>
		<td><?php echo $nuser->username; ?> </td>
		<td><form action="user_list.php" method="POST"><input type = "hidden" value="<?php echo $nuser->user_id ?>" name="banned"/>
		<?php if(!$nuser->banned) { ?>
			<input type="submit" value="BAN" name="ban" />
		<?php } else { ?>
			<input type="submit" value="unBAN" name="unban" />
		<?php } ?>
		</form></td>
		<td><form action="user_list.php" method="POST"><input type = "hidden" value="<?php echo $nuser->user_id ?>" name="setAdmin"/>
		<?php if(!$nuser->admin) { ?>
			<input type="submit" value="make admin" name="make_admin" />
		<?php } else { ?>
			<input type="submit" value="delete admin" name="delete_admin" />
		<?php } ?>
		</form></td>
		<td><form action="user_list.php" method="POST"><input type = "hidden" value="<?php echo $nuser->user_id ?>" name="del" />
		<input type="submit" value="DELETE" name="delete" />
		</form></td>
	</tr>
<?php } ?>
</table>

<?php 
require ('avusteet/ala.php');
?>
