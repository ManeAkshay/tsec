<?php


if(!isset($_SESSION)){
	session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$database ="tsec";
 
// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

?>