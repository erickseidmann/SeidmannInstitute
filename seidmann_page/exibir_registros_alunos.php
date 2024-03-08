<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('header_student.php'); // Inclui o cabeçalho
?>
    <title>Exibir Registros</title>
   
</head>
<body>
    
    <div class="container mt-5">
        <form action="exibir_registros.php" method="get" class="bg-light p-4 rounded shadow-sm">
            <h2 class="mb-4">Veja os seus registros de aulas aqui</h2>
            <div class="form-group">
                <label for="nome">Selecione o Nome:</label>
                <select name="nome" id="nome" class="form-control">
                    <?php
                    // Conexão com o banco de dados
                    require_once "config.php";

                    // Consulta para obter nomes únicos em ordem alfabética
                    $sql = "SELECT DISTINCT nome_aluno FROM aulas_grupo ORDER BY nome_aluno";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['nome_aluno'] . "'>" . $row['nome_aluno'] . "</option>";
                        }
                    }

                    // Não feche a conexão aqui
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mes">Selecione o Mês:</label>
                <input type="month" id="mes" name="mes" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Visualizar Registros</button>
        </form>

        <hr class="mt-5">

        <?php
        // Verifica se os dados foram submetidos via GET
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Verifica se os parâmetros foram enviados
            if (isset($_GET['nome']) && isset($_GET['mes'])) {
                // Conecta ao banco de dados
                require_once "config.php";

                // Obtém os parâmetros do formulário
                $nome = $_GET['nome'];
                $mes = $_GET['mes'];

                // Convertendo o formato da data para 'aaaa-mm-01' (primeiro dia do mês) e 'aaaa-mm-t' (último dia do mês)
                $data_inicio_mes = date('Y-m-01', strtotime($mes));
                $data_fim_mes = date('Y-m-t', strtotime($mes));

                // Consulta os registros ordenados por data do mais novo para o mais antigo
                $sql = "SELECT * FROM aulas_grupo WHERE nome_aluno = '$nome' AND data BETWEEN '$data_inicio_mes' AND '$data_fim_mes' ORDER BY data DESC";
                $result = $conn->query($sql);

                // Exibe os registros
                if ($result->num_rows > 0) {
                    echo "<h3>'$nome',Na tabela abaixo estão as informações.</h3>";
                    echo "<div class='table-container'>"; // Adição do contêiner
                    echo "<table class='table table-striped'>";
                    echo "<thead class='thead-light'>";
                    echo "<tr><th>Nome do Aluno</th><th>Status</th><th>Teacher</th><th>Tempo de Aula</th><th>Data</th><th>Tipo de Curso</th><th>Tipo de Aula</th><th>Book</th><th>Página</th><th>Atividade</th><th>Homework</th><th>Free Talk Subject</th><th>Free Talk Link</th><th>Observações</th><th>Informações dos Pais</th><th>Mensagem</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nome_aluno'] . "</td>";
                        echo "<td>" . $row['info_status'] . "</td>";
                        echo "<td>" . $row['teacher'] . "</td>";
                        echo "<td>" . $row['tempo_aula'] . "</td>";
                        echo "<td>" . $row['data'] . "</td>";
                        echo "<td>" . $row['tipo_curso'] . "</td>";
                        echo "<td>" . $row['tipo_aula'] . "</td>";
                        echo "<td>" . $row['book'] . "</td>";
                        echo "<td>" . $row['pagina'] . "</td>";
                        echo "<td>" . $row['atividade'] . "</td>";
                        echo "<td>" . $row['homework'] . "</td>";
                        echo "<td>" . $row['free_talk_subject'] . "</td>";
                        echo "<td>" . $row['free_talk_link'] . "</td>";
                        echo "<td>" . $row['obs'] . "</td>";
                        echo "<td>" . $row['info_parents'] . "</td>";
                        echo "<td>" . $row['mensagem'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>"; // Fechamento do contêiner
                } else {
                    echo "<p>Nenhum registro encontrado para o aluno(a) '$nome' no mês selecionado.</p>";
                }

                // Fecha a conexão após exibir os registros
                $conn->close();
            } else {
                echo "<p>Nenhuma data selecionada.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
