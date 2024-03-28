<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('header_student.php'); // Inclui o cabeçalho
?>
    <title>Exibir Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        form, .table-container {
            margin-top: 20px;
            width: 80%; /* Alteração aqui */
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            overflow: auto;
        }

        .table-container {
            overflow-x: auto; /* Adição da barra de rolagem horizontal */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
        }

        table th {
            background-color: #f2f2f2;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        table td:hover {
            white-space: normal;
            word-wrap: break-word;
            overflow: visible;
            z-index: 2;
            background-color: #fff;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }
        
        .container .table-container {
            width: calc(50% - 10px); /* Considerando uma margem de 10px entre as tabelas */
        }
        
        #suggestions {
            display: none;
            border: 1px solid #ccc;
            background-color: #fff;
            position: absolute;
            z-index: 1;
            width: calc(100% - 2px);
        }
        
        #suggestions ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        
        #suggestions li {
            padding: 8px 12px;
            cursor: pointer;
        }
        
        #suggestions li:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Exibir Registros</h2>
    <form action="alunosview.php" method="get">
        <label for="nome">Digite o seu nome aqui:</label>
        <input type="text" id="nome" name="nome" oninput="getSuggestions(this.value)">
        <div id="suggestions"></div>
        <p></p>
        <p></p>
        <br>
        <label for="mes">Selecione o Mês:</label>
        <input type="month" id="mes" name="mes">
        <p></p>
        <p></p>
        <br>
        <button type="submit">Visualizar Registros</button>
    </form>

    <hr>

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
                echo "<h3>Registros para o Aluno '$nome'</h3>";
                echo "<div class='container'>";
                echo "<div class='table-container'>"; // Adição do contêiner
                echo "<table border='1'>";
                echo "<tr><th>Nome do Aluno</th><th>Status</th><th>Teacher</th><th>Tempo de Aula</th><th>Data</th><th>Tipo de Curso</th><th>Tipo de Aula</th><th>Book</th><th>Página</th><th>Atividade</th><th>Homework</th><th>Free Talk Subject</th><th>Free Talk Link</th><th>Informações dos Pais</th><th>Mensagem</th></tr>";
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
                    echo "<td>" . $row['info_parents'] . "</td>";
                    echo "<td>" . $row['mensagem'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>"; // Fechamento do contêiner

                // Calcula o total de aulas
                $sql_total_aulas = "SELECT 
                                    SUM(CASE WHEN info_status = 'compareceu' THEN 1 ELSE 0 END) AS compareceu,
                                    SUM(CASE WHEN info_status = 'nao-compareceu' THEN 1 ELSE 0 END) AS nao_compareceu,
                                    SUM(CASE WHEN info_status = 'cancelou' THEN 1 ELSE 0 END) AS cancelou
                                    FROM aulas_grupo 
                                    WHERE nome_aluno = '$nome' AND data BETWEEN '$data_inicio_mes' AND '$data_fim_mes'";
                $result_total_aulas = $conn->query($sql_total_aulas);
                $row_total_aulas = $result_total_aulas->fetch_assoc();

                // Exibe o total de aulas
                echo "<div class='table-container'>"; // Adição do contêiner
                echo "<table border='1'>";
                echo "<tr><th>Compareceu</th><th>Não Compareceu</th><th>Cancelou</th></tr>";
                echo "<tr>";
                echo "<td>" . $row_total_aulas['compareceu'] . "</td>";
                echo "<td>" . $row_total_aulas['nao_compareceu'] . "</td>";
                echo "<td>" . $row_total_aulas['cancelou'] . "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>"; // Fechamento do contêiner

                echo "</div>"; // Fechamento do contêiner
            } else {
                echo "<p>Nenhum registro encontrado para o aluno '$nome' no mês selecionado.</p>";
            }

            // Fecha a conexão após exibir os registros
            $conn->close();
        } else {
            echo "<p>Por favor, digite informações validas.</p>";
        }
    }
    ?>

    <script>
        function getSuggestions(input) {
            // Verifica se o input não está vazio
            if (input.trim() !== '') {
                // Cria um objeto XMLHttpRequest
                var xhr = new XMLHttpRequest();
                // Define a função de retorno de chamada
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Atualiza o conteúdo das sugestões com a resposta do servidor
                        document.getElementById("suggestions").innerHTML = this.responseText;
                        // Exibe as sugestões
                        document.getElementById("suggestions").style.display = "block";
                    }
                };
                // Abre uma conexão com o servidor
                xhr.open("GET", "get_suggestions.php?input=" + input, true);
                // Envia a solicitação
                xhr.send();
            } else {
                // Se o input estiver vazio, oculta as sugestões
                document.getElementById("suggestions").style.display = "none";
            }
        }
    </script>
</body>
</html>
