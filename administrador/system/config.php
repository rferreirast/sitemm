<?php
error_reporting(E_ALL ^ E_DEPRECATED);
set_time_limit(0);
//Banco de dados
 define('HOSTNAME', 'bdmestre.mysql.dbaas.com.br');
 define('USERNAME', 'bdmestre');
 define('PASSWORD', 'ieASmo03');
 define('DATABASE', 'bdmestre');

$servername = HOSTNAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DATABASE;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 ?>