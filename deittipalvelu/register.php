<?php
require('avusteet/kanta.php');
try{
  if(isset($_POST["username"])){
	$password = $_POST["password"];
	$username = $_POST["username"];

	$user_query = create_connection()->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");

	if($password === $_POST["confirmpassword"] && $user_query->execute(array($username, $password))){
		header('Location: sign_in.php');
		exit();
	}
	else{
		$error_msg = "Rekisteröiminen epäonnistui.";
	}
  }
} catch(Exeption $e){
	$error_msg = "Rekisteröiminen epäonnistui.";
}

require ('avusteet/yla.php');
?>
<h2>Rekisteröityminen</h2>
<?php if(isset($error_msg)) echo "<p>$error_msg</p>"; ?>

<form action="register.php" method="POST">
<input type="text" name="username" /> Käyttäjänimi <br>
<input type="password" name="password" /> Salasana <br>
<input type="password" name="confirmpassword" /> Salasana uudelleen <br>
<input type="submit" value="Rekisteröi" />
</form>

<?php
require ('avusteet/ala.php');
?>
