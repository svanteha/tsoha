<?php

  function create_connection(){
  	try {
      		$connection = new PDO("pgsql:host=localhost;dbname=svanteha",
                        	      "svanteha", "9c9daaf68a655bb6");
  	} catch (PDOException $e) {
      		die("error: " . $e->getMessage());
  	}
  	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	return $connection;
  }
?>
