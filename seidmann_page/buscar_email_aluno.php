<?php
require_once "config.php";

function buscarEmailAluno($nomeAluno) {
    global $conn;

    $sql = "SELECT email FROM formulario WHERE nome_completo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nomeAluno);
    $stmt->execute();
    $stmt->bind_result($email);

    if ($stmt->fetch()) {
        return $email;
    } else {
        return "";
    }
}

// Obtém o nome do aluno a partir do parâmetro GET "nome"
$nomeAluno = $_GET["nome"];

// Chama a função buscarEmailAluno() para obter o email do aluno
$emailAluno = buscarEmailAluno($nomeAluno);

echo $emailAluno;
?>
