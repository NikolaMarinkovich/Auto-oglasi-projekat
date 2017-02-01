<?php
$ACCESS_LEVEL = 0; 
session_start();

if(!isset($ACCESS_LEVEL)){ echo 'Nevazeca podesavanja skripta'; die(); }

/*
if($_SESSION['access_level'] < $ACCESS_LEVEL){
	header("Location: login.php?poruka=pristup_zabranjen"); die();
}
*/



$servername = "localhost";
$username = "root";
$password = "";
$baza="autoplac";

// Create connection
$db = new mysqli($servername, $username, $password, $baza);



// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
mysqli_set_charset($db,"utf8");
?>