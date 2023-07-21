<!-- editar_aluno.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Aluno</title>
</head>
<body>
    <h1>Editar Aluno</h1>
    <?php
    // Inclua o arquivo de configuração do banco de dados
    require_once "config.php";

    // Verifica se o ID do aluno foi fornecido via parâmetro na URL
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Obtém o ID do aluno da URL
        $id = trim($_GET["id"]);

        // Consulta o aluno com base no ID fornecido
        $sql = "SELECT * FROM formulario WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Obtém os dados do aluno da consulta
            $row = $result->fetch_assoc();

            // Exibe o formulário preenchido com os dados do aluno
            ?>
            <form action="salvar_edicao_aluno.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <!-- Aqui você coloca os campos do formulário preenchidos com os dados do aluno -->
                <label>Nome Completo:</label>
                <input type="text" name="nome_completo" value="<?php echo $row["nome_completo"]; ?>">
                <!-- Outros campos do formulário... -->

                <!-- Botão para enviar o formulário de edição -->
                <input type="submit" value="Salvar Edição">
            </form>
            <?php
        } else {
            echo "Aluno não encontrado.";
        }

    } else {
        echo "ID do aluno não fornecido.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>
