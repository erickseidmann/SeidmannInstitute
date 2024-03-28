<?php
// Inclui o arquivo de configuração do banco de dados
require_once 'config.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o email e a senha submetidos
    $email = $_POST["username"];
    $numero_matricula = $_POST["password"];

    // Query SQL para verificar se o email e a senha correspondem a algum registro na tabela
    $sql = "SELECT * FROM formulario WHERE email = '$email' AND numero_matricula = '$numero_matricula'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login bem-sucedido, redireciona para a página de sucesso
        header("Location: alunosview.php");
        exit();
    } else {
        // Login falhou, redireciona de volta para a página de login com uma mensagem de erro
        header("Location: loginstudent.html?error=1");
        exit();
    }
}
?>

