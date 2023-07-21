<!-- excluir_aluno.php -->
<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Verifica se o ID do aluno foi fornecido via parâmetro na URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Obtém o ID do aluno da URL
    $id = trim($_GET["id"]);

    // Prepara o SQL para excluir o aluno com base no ID fornecido
    $sql = "DELETE FROM formulario WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno excluído com sucesso.";
    } else {
        echo "Erro ao excluir o aluno: " . $conn->error;
    }
} else {
    echo "ID do aluno não fornecido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
