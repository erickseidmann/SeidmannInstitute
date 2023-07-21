<!-- listar_alunos.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Lista de Alunos</h1>
    <?php
    // Inclua o arquivo de configuração do banco de dados
    require_once "config.php";

    // Consulta todos os alunos na tabela "formulario"
    $sql = "SELECT * FROM formulario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        // Loop para exibir cada aluno na lista
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "Nome: " . $row["nome_completo"] . " | Status: " . ($row["status"] == 1 ? "Ativo" : "Inativo");
            echo " | <a href='editar_aluno.php?id=" . $row["id"] . "'>Editar</a>";
            echo " | <a href='excluir_aluno.php?id=" . $row["id"] . "'>Excluir</a>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum aluno cadastrado.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>
