<?php
require ('avusteet/kanta.php');
require ('avusteet/yla.php');

$user = user_info();

$user_query = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
$user_query->execute(array($user->user_id));
$this_user = $user_query->fetchObject();

?>
<h2>Muuta tietoja</h2>

<p>EI TYHJIÄ KENTTIÄ!!</p>

<?php if(!empty($_SESSION["error_msg"])) {
	echo "<p>".$_SESSION["error_msg"]."</p>";
	unset($_SESSION["error_msg"]);
}
?>
<table>
<form action="edit_logic.php" id="edit_form" method="POST">
<tr><td><p>Etunimi: </td><td><input type="text" name="edit_first_name" value="<?php echo htmlspecialchars($this_user->first_name) ?>"/></p></td></tr>
<tr><td><p>Sukunimi: </td><td><input type="text" name="edit_last_name" value="<?php echo htmlspecialchars($this_user->last_name) ?>"/></p></td></tr>
<tr><td>Sukupuoli: </td><td><input type="radio" name="edit_gender" value="Mies" />Mies</td></tr>
<tr><td></td><td><input type="radio" name="edit_gender" value="Nainen" />Nainen</td></tr>
<tr><td></td><td><input type="radio" name="edit_gender" value="Jotain siitä välistä" />Jotain siitä välistä</td></tr>
<tr><td><p>Maa: </td><td><input type="text" name="edit_country" value="<?php echo htmlspecialchars($this_user->country) ?>"/></p></td></tr>
<tr><td><p>Kaupunki: </td><td><input type="text" name="edit_city" value="<?php echo htmlspecialchars($this_user->city) ?>"/></p></td></tr>
<tr><td><p>Kuvaus: </td><td><textarea rows="4" cols="50" name="edit_description" form="edit_form"><?php echo htmlspecialchars($this_user->description) ?></textarea></p></td></tr>
<tr><td><p>Numero: </td><td><input type="text" name="edit_phone_number" value="<?php echo htmlspecialchars($this_user->phone_number) ?>"/></p></td></tr>
<tr><td><p>Sähköposti: </td><td><input type="text" name="edit_email" value="<?php echo htmlspecialchars($this_user->email) ?>" /></p></td></tr>
<tr><td><input type="submit" value="Muokkaa" /></tr></td>
</form>
</tr>
</table>


<?php
require ('avusteet/ala.php');
?>
