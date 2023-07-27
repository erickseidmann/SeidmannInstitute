<!-- alterar_status_aluno.php -->
<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Verifica se o ID do aluno e o novo status foram passados por parâmetro
if (isset($_GET["id"]) && !empty(trim($_GET["id"])) && isset($_GET["status"])) {
    // Obtém o ID do aluno e o novo status da URL
    $id = trim($_GET["id"]);
    $status = ($_GET["status"] == 1) ? 0 : 1; // Alterna o status (0 para inativo, 1 para ativo)

    // Prepara o SQL para alterar o status do aluno com base no ID fornecido
    $sql = "UPDATE formulario SET status = '$status' WHERE id = '$id'";

    // Executa o SQL para alterar o status do aluno
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de listagem de alunos após a alteração bem-sucedida
        header("Location: listar_alunos.php");
        exit();
    } else {
        echo "Erro ao alterar o status do aluno: " . $conn->error;
    }
} else {
    // Se não foram passados os parâmetros necessários, redireciona para a página de listar alunos
    header("Location: listar_alunos.php");
    exit();
}
