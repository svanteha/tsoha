<?php

  function luo_kantayhteys(){
  	try {
      		$yhteys = new PDO("pgsql:host=localhost;dbname=svanteha",
                        "svanteha");
  	} catch (PDOException $e) {
      		die("Virhe: " . $e->getMessage());
  	}
  	$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	return $yhteys;
  }

?>
