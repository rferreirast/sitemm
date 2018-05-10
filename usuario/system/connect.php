<?php
error_reporting(E_ALL ^ E_DEPRECATED);
set_time_limit(0);

// Create connection

$conn = new mysqli('bdmestre.mysql.dbaas.com.br', 'bdmestre', 'ieASmo03', 'bdmestre');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 ?>