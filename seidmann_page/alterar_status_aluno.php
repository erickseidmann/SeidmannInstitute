<!-- alterar_status_aluno.php -->
<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Verifica se o ID do aluno e o novo status foram passados por parâmetro
if (isset($_GET["id"]) && isset($_GET["status"])) {
    $alunoID = $_GET["id"];
    $novoStatus = $_GET["status"] == 1 ? 0 : 1;

    // Atualiza o status do aluno no banco de dados
    $sql = "UPDATE formulario SET status = '$novoStatus' WHERE id = '$alunoID'";
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de listar alunos após a atualização
        header("Location: listar_alunos.php");
        exit();
    } else {
        // Se ocorrer algum erro na atualização, exibe uma mensagem de erro
        echo "Erro ao atualizar o status do aluno: " . $conn->error;
    }
} else {
    // Se não foram passados os parâmetros necessários, redireciona para a página de listar alunos
    header("Location: listar_alunos.php");
    exit();
}
