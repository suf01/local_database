<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "operatorsDB";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
	die("failed to connect");
}