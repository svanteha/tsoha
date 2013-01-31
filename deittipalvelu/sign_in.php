<?php 
require 'avusteet/kanta.php';
if(isset($_POST["username"])){
	$user_query = create_connection()->prepare("SELECT * FROM Users WHERE username = ? AND password = ?");
	$user_query->execute(array($_POST["username"], $_POST["password"]));
	$user = $user_query->fetchObject();
	if($user->banned){
		$error_msg = "Banned, adminiin yhteys";
	}
	else if($user){
		session_start();
		$_SESSION['user_id'] = $user->user_id;
		header('Location: index.php');
		exit();
	}
	else{
		$error_msg = "Käyttäjätunnus tai salasana väärin";
	}
}

?>
<?php
require 'avusteet/yla.php';
?>
<?php 
if(isset($error_msg)) echo "<p>$error_msg</p>"; 
?>
<form action="sign_in.php" method="POST">
<input type="text" name="username" />Käyttäjätunnus<br>
<input type="password" name="password" />Salasana<br>
<input type="submit" value="Kirjaudu" />
</form>

<?php 
require('avusteet/ala.php');
?>
