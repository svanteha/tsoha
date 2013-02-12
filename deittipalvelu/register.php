<?php
require('avusteet/kanta.php');
try{
  if(isset($_POST["username"])){
	$password = strip_tags($_POST["password"]);
	$username = strip_tags($_POST["username"]);
	$age = (int) $_POST["age"];

	if (strlen($password) < 6) {
		$error_msg = "Salasanan pitää olla pidempi kuin 5 merkkiä<br>";
	}

	if (strlen($username) < 3) {
		$error_msg .= "Käyttäjänimen pitää olla pidempi kuin 2 merkkiä<br>";
	}

	if ($age < 18) {
		$error_msg .= "OLET PERKELE ALAIKÄINEN!! ikäraja on 18 vee<br>";
	}

	$user_query = create_connection()->prepare("INSERT INTO Users (username, password, age) VALUES (?, ?, ?)");

	if(!$error_msg && $password === $_POST["confirmpassword"] && $user_query->execute(array($username, $password, $age))){
		header('Location: sign_in.php');
		exit();
	}
	else{
		$error_msg .= "Rekisteröiminen epäonnistui.";
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
<input type="text" name="age" /> Ikä <br>
<input type="password" name="password" /> Salasana <br>
<input type="password" name="confirmpassword" /> Salasana uudelleen <br>
<input type="submit" value="Rekisteröi" />
</form>

<?php
require ('avusteet/ala.php');
?>
