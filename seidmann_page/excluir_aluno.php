<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Verifica se o ID do aluno foi fornecido via parâmetro na URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Obtém o ID do aluno da URL
    $id = trim($_GET["id"]);

    // Prepara o SQL para excluir o aluno com base no ID fornecido
    $sql = "DELETE FROM formulario WHERE id = '$id'";

    // Verifica se o botão de confirmação "Sim" foi clicado
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["confirmar"])) {
        if ($conn->query($sql) === TRUE) {
            // Redireciona para a página de listagem de alunos após a exclusão bem-sucedida
            header("Location: listar_alunos.php");
            exit();
        } else {
            echo "Erro ao excluir o aluno: " . $conn->error;
        }
    }
} else {
    echo "ID do aluno não fornecido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
</head>
<body>
    <h1>Tem certeza que quer excluir o aluno?</h1>
    <form action="" method="post">
        <button type="submit" name="confirmar">Sim</button>
        <button type="submit" formaction="listar_alunos.php">Não</button>
    </form>
</body>
</html>
