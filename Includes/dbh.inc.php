<?php

$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbName = "seat_reservation";

$conn =new mysqli($servername, $username, $password, $dbName);
        
//check connection
if($conn->connect_error){
    die ("connection fail".$conn->connect_error);
}

