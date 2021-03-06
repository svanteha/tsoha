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

  function user_infoa($user_id){
	$user_query = create_connection()->prepare("SELECT * FROM Users WHERE user_id = ?");
	$user_query->execute(array($user_id));
	return $user_query->fetchObject();
  }
	
  function isContact($own_user_id, $other_user_id) {
	$contact_query = create_connection()->prepare("SELECT this_user_id, contact_user_id FROM Contacts WHERE this_user_id = ? AND contact_user_id = ?");
	$contact_query->execute(array($own_user_id, $other_user_id));
	return $contact_query->fetchObject();

  }

  function requestSent($from_user_id, $to_user_id) {
	$request_sent_query = create_connection()->prepare("SELECT from_user_id, to_user_id FROM Pending_requests WHERE from_user_id = ? AND to_user_id = ?");
	$request_sent_query->execute(array($from_user_id, $to_user_id));
	return $request_sent_query->fetchObject();
  }	

  function signed_in(){
	$user = user_info();
	if ($user) {
		return true;
	}
	else {
		return false;
	}
  }
  
  

?>

