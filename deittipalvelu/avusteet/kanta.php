<?php

  function luo_yhteys(){
  	try {
      		$yhteys = new PDO("pgsql:host=localhost;dbname=svanteha",
                        "svanteha");
  	} catch (PDOException $e) {
      		die("Virhe: " . $e->getMessage());
  	}
  	$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	return $yhteys;
  }


  function kayttajatiedot(){
  	session_start();
  	$kayttaja_kysely = luo_kantayhteys()->prepare("SELECT nimi, tunnus, admin, 					banned, id FROM kayttajat where id = ?");
  	$kayttaja_kysely->execute(array($_SESSION["kayttaja_id"]));
  	$kayttaja = $kayttaja_kysely->fetchObject();
  	return $kayttaja;
  }
?>
