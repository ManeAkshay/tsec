<?php
require_once 'db_connect.php';

if(isset($_SESSION)){
	session_unset();
	session_destroy();
}
header("Location: login.php");