<?php
require ('avusteet/kanta.php');

try{
	if(isset($_POST["subject"])) {	
		$subject = strip_tags($_POST["subject"]);
		$message = strip_tags($_POST["message"]);

		if(empty($subject) || empty($message)) {
			header('Location: index.php');
			exit();
		} 

		$add_message = create_connection()->prepare("INSERT INTO Messages (from_user_id, to_user_id, subject, message) VALUES (?, ?, ?, ?)");
		$add_message->execute(array($_POST["from_user_id"], $_POST["to_user_id"], $_POST["subject"], $_POST["message"]));

		header('Location: own_site.php');
	}
	if(isset($_POST["delete_id"])) {
		$del_message = create_connection()->prepare("DELETE FROM Messages WHERE message_id = ?");
		$del_message->execute(array($_POST["delete_id"]));

		header('Location: messages.php');
	}
		
} catch (Exception $e) {
	header('Location: index.php');
}
?>
