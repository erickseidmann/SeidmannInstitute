<?php
$servername = "localhost"; // substitua pelo nome do seu servidor de banco de dados
$username = "root"; // substitua pelo seu nome de usuário do banco de dados
$password = "root123"; // substitua pela sua senha do banco de dados
$dbname = "cadastroaluno"; // substitua pelo nome do seu banco de dados

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>
