<?php
// Inclui o arquivo de configuração do banco de dados
require_once 'config.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['numero_matricula'])) {
    // Se o usuário não estiver autenticado, redireciona para a página de login
    header("Location: login.php");
    exit();
}

// Obtém o número de matrícula do usuário da sessão
$numero_matricula = $_SESSION['numero_matricula'];

// Inicializa a variável $nome_aluno
$nome_aluno = "";

// Executa uma consulta SQL para recuperar o nome do aluno com base no número de matrícula
$sql_nome_aluno = "SELECT nome_completo FROM formulario WHERE numero_matricula = '$numero_matricula'";
$result_nome_aluno = $conn->query($sql_nome_aluno);

// Verifica se a consulta foi bem-sucedida e se encontrou um registro
if ($result_nome_aluno->num_rows == 1) {
    // Obtém os dados do registro
    $row_nome_aluno = $result_nome_aluno->fetch_assoc();
    // Atribui o nome do aluno à variável $nome_aluno
    $nome_aluno = $row_nome_aluno['nome_completo'];
} else {
    // Se não encontrou nenhum registro, define um valor padrão para $nome_aluno
    $nome_aluno = "Nome do Aluno Desconhecido";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'newheader.php';
?>

    <title>Seidmann Institute</title>
    <link rel="icon" href="image/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar-expand.css">
    <style>
        .table-container {
            max-height: 300px;
            overflow-y: auto;
            max-width: 70%;
            margin-left: 15%;
        }

        .table th,
        .table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
        }

        .table th:hover,
        .table td:hover {
            white-space: normal;
            overflow: visible;
            text-overflow: inherit;
            max-width: none;
        }
    </style>
</head>

<body>
    <p></p>
    <p></p>
    <div class="wrapper">
  
        <div class="main p-3">
            <div class="text-center">
                <h1>
                    Seidmann Institute Student Portal
                </h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 header">
                        <p>
                            Número de Matrícula: <?php echo $numero_matricula; ?>
                        </p>
                    </div>
                    <div class="col-sm-12 header">
                        <p>
                            Nome do Aluno: <?php echo $nome_aluno; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Nova tabela: Total de Aulas -->
            <div class="container total-table-container">
    <h2 class="text-center">Registros de Aulas</h2>
    <div class="table-responsive"> <!-- Adição da classe table-responsive -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Total de Aulas Registradas</th>
                    <th>Compareceu</th>
                    <th>Não Compareceu</th>
                    <th>Porcentagem de Presença</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para contar o total de registros de aulas
                $sql_total_aulas = "SELECT COUNT(*) AS total FROM aulas_grupo WHERE nome_aluno = '$nome_aluno'";
                $result_total_aulas = $conn->query($sql_total_aulas);
                $row_total_aulas = $result_total_aulas->fetch_assoc();
                $total_aulas = $row_total_aulas['total'];

                // Consulta para contar o total de registros de aulas em que o aluno compareceu
                $sql_compareceu = "SELECT COUNT(*) AS total_compareceu FROM aulas_grupo WHERE nome_aluno = '$nome_aluno' AND info_status = 'Compareceu'";
                $result_compareceu = $conn->query($sql_compareceu);
                $row_compareceu = $result_compareceu->fetch_assoc();
                $total_compareceu = $row_compareceu['total_compareceu'];

                // Calcula o número de aulas em que o aluno não compareceu
                $total_nao_compareceu = $total_aulas - $total_compareceu;

                // Calcula a porcentagem de comparecimento
                $porcentagem_comparecimento = ($total_compareceu / $total_aulas) * 100;
                $porcentagem_formatada = number_format($porcentagem_comparecimento, 1);

                // Exibe os resultados na tabela
                echo "<tr>";
                echo "<td>$total_aulas</td>";
                echo "<td>$total_compareceu</td>";
                echo "<td>$total_nao_compareceu</td>";
                echo "<td>$porcentagem_formatada%</td>";
                echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>
</div>
            <!-- Fim da Nova tabela: Total de Aulas -->

            <?php
            // Consulta os registros ordenados por data do mais novo para o mais antigo
            $sql_registros = "SELECT * FROM aulas_grupo WHERE nome_aluno = '$nome_aluno' ORDER BY data DESC";
            $result_registros = $conn->query($sql_registros);

            // Exibe os registros
            if ($result_registros->num_rows > 0) {
                
                echo "<div class='table-container'>"; // Adição do contêiner
                echo "<table class='table'>";
                echo "<thead><tr><th>Nome do Aluno</th><th>Status</th><th>Teacher</th><th>Tempo de Aula</th><th>Data</th><th>Tipo de Curso</th><th>Tipo de Aula</th><th>Book</th><th>Página</th><th>Atividade</th><th>Ultimo HW</th><th>HW designado</th><th>Homework</th><th>Free Talk Subject</th><th>Free Talk Link</th><th>Observações</th><th>Informações dos Pais</th><th>Mensagem</th></tr></thead><tbody>";
                while ($row_registros = $result_registros->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row_registros['nome_aluno'] . "</td>";
                    echo "<td>" . $row_registros['info_status'] . "</td>";
                    echo "<td>" . $row_registros['teacher'] . "</td>";
                    echo "<td>" . $row_registros['tempo_aula'] . "</td>";
                    echo "<td>" . $row_registros['data'] . "</td>";
                    echo "<td>" . $row_registros['tipo_curso'] . "</td>";
                    echo "<td>" . $row_registros['tipo_aula'] . "</td>";
                    echo "<td>" . $row_registros['book'] . "</td>";
                    echo "<td>" . $row_registros['pagina'] . "</td>";
                    echo "<td>" . $row_registros['atividade'] . "</td>";
                    echo "<td>" . $row_registros['ultimohomework'] . "</td>";
                    echo "<td>" . $row_registros['homeworkdesignado'] . "</td>";
                    echo "<td>" . $row_registros['homework'] . "</td>";
                    echo "<td>" . $row_registros['free_talk_subject'] . "</td>";
                    echo "<td>" . $row_registros['free_talk_link'] . "</td>";
                    echo "<td>" . $row_registros['obs'] . "</td>";
                    echo "<td>" . $row_registros['info_parents'] . "</td>";
                    echo "<td>" . $row_registros['mensagem'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
                echo "</div>"; // Fechamento do contêiner
            } else {
                echo "<p>Nenhum registro encontrado para o aluno '$nome_aluno'.</p>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <footer>
        <!-- Incluir o arquivo do rodapé usando PHP -->
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>
