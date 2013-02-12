<?php
require ('avusteet/kanta.php');

try{
	if(isset($_POST["to_user_id"])) {	
		$subject = trim(strip_tags($_POST["subject"]));
		$message = trim(strip_tags($_POST["message"]));
		$user = user_info();
		if(empty($subject) || empty($message)) {
			if (empty($subject)) {
				$_SESSION["message"] = $message;
				$_SESSION["message_info"] = "Tyhjä aihe!";
			}
			else {
				$_SESSION["message_info"] = "Tyhjä aihe ja viesti, yritä uudestaan!";
			}			
			header('Location: create_message.php?to_user_id='.$_POST["to_user_id"]);			
			exit();
		} 
		else {
			
			$add_message = create_connection()->prepare("INSERT INTO Messages (from_user_id, to_user_id, subject, message) VALUES (?, ?, ?, ?)");
			$add_message->execute(array($user->user_id, $_POST["to_user_id"], $_POST["subject"], $_POST["message"]));
		
			$_SESSION["message_info"] = "Viesti lähetetty!";
			header('Location: own_site.php?user_id='.$_POST["to_user_id"]);
		}
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
