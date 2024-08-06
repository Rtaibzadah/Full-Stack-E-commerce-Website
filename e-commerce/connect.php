<?php

$dbhost='localhost';
$dbuser ='root';
$dbpassword ='root';
$dbdatabase= 'ecom';

$con = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

// Check connection
if($con->connect_error){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>