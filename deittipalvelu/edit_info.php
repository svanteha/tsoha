<?php
require ('avusteet/kanta.php');
require ('avusteet/yla.php');

if (!signed_in()) {
	header('Location: sign_in.php');
}

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
<tr><td>Etunimi: </td><td><input type="text" name="edit_first_name" value="<?php echo htmlspecialchars($this_user->first_name) ?>"/></td></tr>
<tr><td>Sukunimi: </td><td><input type="text" name="edit_last_name" value="<?php echo htmlspecialchars($this_user->last_name) ?>"/></td></tr>
<tr><td>Sukupuoli: </td><td><input type="radio" name="edit_gender" value="Mies" checked/>Mies</td></tr>
<tr><td></td><td><input type="radio" name="edit_gender" value="Nainen" />Nainen</td></tr>
<tr><td></td><td><input type="radio" name="edit_gender" value="Jotain siitä välistä" />Jotain siitä välistä</td></tr>
<tr><td>Etsin:</td><td><input type="radio" name="edit_pref" value="Ystävää" />Ystävää</td></tr>
<tr><td></td><td><input type="radio" name="edit_pref" value="Parisuhdetta" />Parisuhdetta</td></tr>
<tr><td></td><td><input type="radio" name="edit_pref" value="Panoa" />Panoa</td></tr>
<tr><td></td><td><input type="radio" name="edit_pref" value="Salarakasta" />Salarakasta</td></tr>
<tr><td>Olen kiinnostunut:</td><td><input type="radio" name="edit_sex_pref" value="Naisista" />Naisista</td></tr>
<tr><td></td><td><input type="radio" name="edit_sex_pref" value="Miehistä" />Miehistä</td></tr>
<tr><td></td><td><input type="radio" name="edit_sex_pref" value="Naisista ja miehistä" />Naisista ja miehistä</td></tr>
<tr><td>Maa: </td><td><input type="text" name="edit_country" value="<?php echo htmlspecialchars($this_user->country) ?>"/></td></tr>
<tr><td>Kaupunki: </td><td><input type="text" name="edit_city" value="<?php echo htmlspecialchars($this_user->city) ?>"/></td></tr>
<tr><td>Kuvaus: </td><td><textarea rows="4" cols="50" name="edit_description" form="edit_form"><?php echo htmlspecialchars($this_user->description) ?></textarea></td></tr>
<tr><td>Numero: </td><td><input type="text" name="edit_phone_number" value="<?php echo htmlspecialchars($this_user->phone_number) ?>"/></td></tr>
<tr><td>Sähköposti: </td><td><input type="text" name="edit_email" value="<?php echo htmlspecialchars($this_user->email) ?>" /></td></tr>
<tr><td><input type="submit" value="Muokkaa" /></tr></td>
</form>
</tr>
</table>


<?php
require ('avusteet/ala.php');
?>
