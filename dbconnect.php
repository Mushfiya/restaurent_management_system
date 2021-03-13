<?php
$serverName="localhost";
$username="root";
$password="";
$databaseName="restaurentdb";

$connection = mysqli_connect($serverName,$username,$password,$databaseName);

if (!$connection) {
 	die("connection invalid".$connection);
 }
 

?>