<?php 
require ('avusteet/kanta.php');

try {
	$this_user = user_info();
	if (isset($_POST["request_user_id"])) {
		
		$request_user = user_infoa($_POST["request_user_id"]);

		$pending_query = create_connection()->prepare("INSERT INTO Pending_requests (to_user_id, from_user_id) VALUES (?, ?)");
		$pending_query->execute(array($request_user->user_id, $this_user->user_id));

		header('Location: index.php');
	}
	if (isset($_POST["deny_user_id"])) {
		
		$deny_user = user_infoa($_POST["deny_user_id"]);

		$delete_query = create_connection()->prepare("DELETE FROM Pending_requests WHERE to_user_id = ? AND from_user_id = ?");
		$delete_query->execute(array($this_user->user_id, $deny_user->user_id));
		
		header('Location: own_site.php');
	}
	if (isset($_POST["accept_user_id"])) {

		$accept_user = user_infoa($_POST["accept_user_id"]);

		$add_query = create_connection()->prepare("INSERT INTO Contacts (user_id, contact_user_id) VALUES (?, ?)");
		$add_query->execute(array($this_user->user_id, $accept_user->user_id));
		$add_query->execute(array($accept_user->user_id, $this_user->user_id));

		$delete_query = create_connection()->prepare("DELETE FROM Pending_requests WHERE to_user_id = ? AND from_user_id = ?");
		$delete_query->execute(array($this_user->user_id, $accept_user->user_id));

		header('Location: own_site.php');

	}
	else {
		header('Location: own_site.php');
	}

} catch(Exeption $e) {
	$error_msg = "Yritä uudestaan";
	header('Location: edit_info.php');
}

?>
