<?php
require('avusteet/kanta.php');

$user = user_info();

try {

	$notEmpty = array("edit_first_name" => "Etunimi", "edit_last_name" => "Sukunimi", "edit_gender" => "Sukupuoli", 
			"edit_country" => "Maa", "edit_city" => "Kaupunki", "edit_description" => "Kuvaus",
			"edit_phone_number" => "Numero", "edit_email" => "Sähköposti");
	$virhe = false;
	$_SESSION["error_msg"] = "Tyhjä kenttä: ";	

	foreach($notEmpty as $name => $description) {
		$strip_tag = strip_tags($_POST[$name]);
		if(empty($strip_tag)) {
			$_SESSION["error_msg"] .= $description." ";
			$virhe = true;
		}
	}

	if ($virhe == true) {
		header('Location: edit_info.php');
		exit();
	}
	else {
		$_SESSION["error_msg"] = "";
	}
	
	$user_query = create_connection()->prepare("UPDATE Users SET first_name = ?, last_name = ?, gender = ?, country = ?, city = ?,
						 description = ?, phone_number = ?, email = ? WHERE user_id = ?");

	$user_query->execute(array($_POST["edit_first_name"], $_POST["edit_last_name"], $_POST["edit_gender"], $_POST["edit_country"], 
				$_POST["edit_city"], $_POST["edit_description"], $_POST["edit_phone_number"], $_POST["edit_email"], $user->user_id));
	
	
	
	header('Location: own_site.php');

} catch(Exeption $e) {
	$_SESSION["error_msg"] = "Yritä uudestaan";
	header('Location: edit_info.php');
}

?>

	
