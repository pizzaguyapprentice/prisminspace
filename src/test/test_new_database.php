<?php
	include_once "../classes/new_database.php";

	Database::createNewDBConnection();
	$stmt = (Database::returnConnection())->prepare("SELECT * FROM users");

	$stmt->execute();
	$users = $stmt->fetchAll();
	print_r($users);
?>