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

  function user_info(){
	session_start();
	$user_query = create_connection()->prepare("SELECT username, first_name, admin, user_id FROM Users WHERE user_id = ?");
	$user_query->execute(array($_SESSION["user_id"]));
	$user = $user_query->fetchObject();
	return $user;
  }

  function contact_info($user_id) {
	$contact_query = create_connection()->prepare("SELECT * FROM users WHERE user_id = ?");
	$contact_query->execute(array($user_id));
	return $contact_query->fetchObject();
  }

?>

