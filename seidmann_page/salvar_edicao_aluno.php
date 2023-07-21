<!-- salvar_edicao_aluno.php -->
<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Percorre todas as variáveis do formulário e as converte em strings
    foreach ($_POST as $key => $value) {
        $_POST[$key] = arrayToString($value);
    }

    // Recupera o ID do aluno
    $id = $_POST["id"];

    // Recupera os dados do formulário
    $nome_completo = $_POST["nome_completo"];
    // Outros campos do formulário...

    // Atualiza os dados do aluno no banco de dados
    $sql = "UPDATE formulario SET nome_completo = '$nome_completo', /* outros campos aqui... */ WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Dados do aluno atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados do aluno: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
