<?php
require ('avusteet/kanta.php');
require ('avusteet/yla.php');

$user = user_info();

$user_query = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
$user_query->execute(array($user->user_id));
$this_user = $user_query->fetchObject();

?>

<h2>Oma Sivu</h2>

<p>Käyttäjänimi: <?php echo $this_user->username ?></p>
<p>Nimi: <?php echo $this_user->first_name ?> <?php echo $this_user->last_name ?></p>
<p>Ikä: <?php echo $this_user->age ?></p>
<p>Sukupuoli: <?php echo $this_user->gender ?></p>
<p>Maa: <?php echo $this_user->country ?></p>
<p>Kaupunki: <?php echo $this_user->city ?></p>
<p>Kuvaus: <?php echo $this_user->description ?></p>
<p>Numero: <?php echo $this_user->phone_number ?></p>
<p>Sähköposti: <?php echo $this_user->email ?></p>

<?php
require ('avusteet/ala.php');
?>
