<?php
require ('avusteet/kanta.php');
require ('avusteet/yla.php');

if (!signed_in()) {
	header('Location: sign_in.php');
}

if (isset($_GET["user_id"])){
	
	$user = user_infoa($_GET["user_id"]);
	$user_query = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
	$user_query->execute(array($user->user_id));
	$this_user = $user_query->fetchObject();
	$isContact = isContact($_SESSION["user_id"], $_GET["user_id"]);
	$isUser = false;

}
else{
	$user = user_info();
	$user_query = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
	$user_query->execute(array($user->user_id));
	$this_user = $user_query->fetchObject();
	
	$contact_query = create_connection()->prepare("SELECT * FROM Contacts WHERE user_id = ?");
	$contact_query->execute(array($this_user->user_id));
	
	$request_query = create_connection()->prepare("SELECT * FROM Pending_requests WHERE to_user_id = ?");
	$request_query->execute(array($this_user->user_id));

	$isContact = true;
	$isUser = true;
}
?>



<h2>Oma Sivu</h2>

<p>Käyttäjänimi: <?php echo $this_user->username ?></p>
<p>Ikä: <?php echo $this_user->age ?></p>
<p>Sukupuoli: <?php echo $this_user->gender ?></p>
<p>Kuvaus: <?php echo $this_user->description ?></p>
<?php if($isContact or $isUser) { ?>
<p>Nimi: <?php echo $this_user->first_name ?> <?php echo $this_user->last_name ?></p>
<p>Maa: <?php echo $this_user->country ?></p>
<p>Kaupunki: <?php echo $this_user->city ?></p>
<p>Numero: <?php echo $this_user->phone_number ?></p>
<p>Sähköposti: <?php echo $this_user->email ?></p>
<?php } ?>

<?php if($isUser) { ?>
<a href="edit_info.php">Muokka tietojasi</a><br>
<a href="messages.php">Viestit</a>
<h2>Kontaktisi</h2>
<ul>
<?php while($contact = $contact_query->fetchObject()){ $user_query->execute(array($contact->contact_user_id)); $x = $user_query->fetchObject();?>
		<li><a href="own_site.php?user_id=<?php echo $contact->contact_user_id; ?>"><?php echo $x->username; ?></a></li>
<?php } ?>
</ul>
<h2>Kontaktipyyntösi</h2>
<ul>

<?php while($request = $request_query->fetchObject()){ $user_query->execute(array($request->from_user_id)); $x = $user_query->fetchObject();?>
	<li><a href="own_site.php?user_id=<?php echo $request->from_user_id; ?>"><?php echo $x->username; ?></a></li>
	<form action="contact_logic.php" method="POST">
	<input type="hidden" name="accept_user_id" value="<?php echo $request->from_user_id; ?>" />
	<input type="submit" value="Hyväksy" />
	</form>
	<form action="contact_logic.php" method="POST">
	<input type="hidden" name="deny_user_id" value="<?php echo $request->from_user_id; ?>" />
	<input type="submit" value="Hylkää" />
	</form>
<?php } ?>
</form>
</ul>
<?php } ?>

<?php if (!$isContact) { ?>
	<form action="contact_logic.php" method="POST">
		<input type="hidden" name="request_user_id" value="<?php echo $this_user->user_id; ?>" />
		<input type="submit" value="Pyydä kontaktiksi" />
	</form>
<?php } ?>

<?php if (!$isUser) { ?>
	<form action="create_message.php" method="POST">
		<input type="hidden" name="to_user_id" value="<?php echo $this_user->user_id; ?>" />
		<input type="submit" value="Lähetä viesti!" />
	</form>
<?php } ?>

<?php
require ('avusteet/ala.php');
?>
