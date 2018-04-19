<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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


//Variaveis de configuração do servidor do email
  $host     = 'email-ssl.com.br';
  $username = 'contato@mestremoveleiro.com.br';
  $password = 'ieA$mo>#03';
  $port     = 465;
  $secure   = 'ssl';

//CARREGA DADOS DA EMPRESA 
$buscaDadosEmpresa = "SELECT * FROM dados_empresa";
$resultado_DadosEmpresa = mysqli_query($conn, $buscaDadosEmpresa);
$carrega_dadosEmpresa = mysqli_fetch_assoc($resultado_DadosEmpresa);


 ?>