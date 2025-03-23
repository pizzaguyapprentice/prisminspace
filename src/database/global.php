<?php
    //CONNECTION TO DATABASE, DO NOT REUSE AGAIN OR IT WILL BREAK//
	//if you have two php scripts that have a connection to the db it wont load
	//navbar is everywhere so just use this connection for everything
	include("../database/dbconnection.php");
	$db = new Database(); //new instace of database object using credentials class
	$conn = $db->getConnection(); //uses PDO class

    //CONNECTION TO DATABASE, DO NOT REUSE AGAIN OR IT WILL BREAK//
?>