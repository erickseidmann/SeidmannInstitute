<?php
// Inclui o arquivo de configuração do banco de dados
require_once 'config.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['numero_matricula'])) {
    header("Location: login.php");
    exit();
}

// Obtém o número de matrícula do usuário da sessão
$numero_matricula = $_SESSION['numero_matricula'];

// Inicializa a variável $nome_aluno
$nome_aluno = "";

// Consulta para recuperar o nome do aluno
$sql_nome_aluno = "SELECT nome_completo FROM formulario WHERE numero_matricula = '$numero_matricula'";
$result_nome_aluno = $conn->query($sql_nome_aluno);

if ($result_nome_aluno->num_rows == 1) {
    $row_nome_aluno = $result_nome_aluno->fetch_assoc();
    $nome_aluno = $row_nome_aluno['nome_completo'];
} else {
    $nome_aluno = "Nome do Aluno Desconhecido";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include 'newheader.php'; ?>

<title>Seidmann Institute</title>
<link rel="icon" href="image/icon.png" type="image/x-icon">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/sidebar-expand.css">
<style>
    .table-container {
        max-height: 300px;
        overflow-y: auto;
        max-width: 90%;
        margin-left: 5%;
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
<div class="wrapper">
    <div class="main p-3">
        <div class="text-center">
            <h1>Seidmann Institute Student Portal</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 header">
                    <p>Número de Matrícula: <?php echo $numero_matricula; ?></p>
                </div>
                <div class="col-sm-12 header">
                    <p>Nome do Aluno: <?php echo $nome_aluno; ?></p>
                </div>
            </div>
        </div>

        <!-- Resumo -->
        <div class="container total-table-container">
            <h2 class="text-center">Resumo de Aulas</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Total</th>
                            <th>Compareceu</th>
                            <th>Nao compareceu</th>
                            <th>Reposição</th>
                            <th>Cancelou</th>
                            <th>Cancelou Antecedência</th>
                            <th>Extra</th>
                            <th>Canc. Prof</th>
                            <th>Trocou</th>
                            <th>% Presença</th>
                            <th>HW Solicitados</th>
                            <th>HW Feitos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Função auxiliar para contar status
                        function contarStatus($conn, $nome_aluno, $status) {
                            $sql = "
                                SELECT COUNT(*) AS total FROM (
                                    SELECT id FROM registro_aulas 
                                    WHERE aluno_nome = '$nome_aluno' AND status_aula = '$status'
                                    UNION ALL
                                    SELECT id FROM registro_aulas_grupo 
                                    WHERE FIND_IN_SET('$nome_aluno', aluno_nome) AND status_aluno LIKE '%$status%'
                                ) AS temp
                            ";
                            return $conn->query($sql)->fetch_assoc()['total'];
                        }

                        // Totais
                        $sql_total_aulas = "
                            SELECT COUNT(*) AS total FROM (
                                SELECT id FROM registro_aulas WHERE aluno_nome = '$nome_aluno'
                                UNION ALL
                                SELECT id FROM registro_aulas_grupo WHERE FIND_IN_SET('$nome_aluno', aluno_nome)
                            ) AS todas
                        ";
                        $total_aulas = $conn->query($sql_total_aulas)->fetch_assoc()['total'];

                        $total_compareceu = contarStatus($conn, $nome_aluno, "Compareceu");
                        $total_nao_compareceu = contarStatus($conn, $nome_aluno, "Nao compareceu");
                        $total_reposicao = contarStatus($conn, $nome_aluno, "Reposicao");
                        $total_cancelou = contarStatus($conn, $nome_aluno, "Cancelou");
                        $total_cancelou_antecedencia = contarStatus($conn, $nome_aluno, "Cancelou Antecedência");
                        $total_extra = contarStatus($conn, $nome_aluno, "Extra");
                        $total_canc_prof = contarStatus($conn, $nome_aluno, "Canc. Prof");
                        $total_trocou = contarStatus($conn, $nome_aluno, "Trocou");

                        $porcentagem = $total_aulas > 0 ? ($total_compareceu / $total_aulas) * 100 : 0;
                        $porcentagem_formatada = number_format($porcentagem, 1);

                        // Homeworks Solicitados
                        $sql_hw_solicitados = "
                            SELECT COUNT(*) AS total FROM (
                                SELECT id FROM registro_aulas WHERE aluno_nome = '$nome_aluno' AND new_homework = 'Sim'
                                UNION ALL
                                SELECT id FROM registro_aulas_grupo WHERE FIND_IN_SET('$nome_aluno', aluno_nome) AND new_homework = 'Sim'
                            ) AS hw_solicitados
                        ";
                        $hw_solicitados = $conn->query($sql_hw_solicitados)->fetch_assoc()['total'];

                        // Homeworks Feitos
                        $sql_hw_feitos = "
                            SELECT COUNT(*) AS total FROM (
                                SELECT id FROM registro_aulas WHERE aluno_nome = '$nome_aluno' AND old_homework = 'Sim'
                                UNION ALL
                                SELECT id FROM registro_aulas_grupo WHERE FIND_IN_SET('$nome_aluno', aluno_nome) AND old_homework = 'Sim'
                            ) AS hw_feitos
                        ";
                        $hw_feitos = $conn->query($sql_hw_feitos)->fetch_assoc()['total'];

                        echo "<tr>
                                <td>$total_aulas</td>
                                <td>$total_compareceu</td>
                                <td>$total_nao_compareceu</td>
                                <td>$total_reposicao</td>
                                <td>$total_cancelou</td>
                                <td>$total_cancelou_antecedencia</td>
                                <td>$total_extra</td>
                                <td>$total_canc_prof</td>
                                <td>$total_trocou</td>
                                <td>$porcentagem_formatada%</td>
                                <td>$hw_solicitados</td>
                                <td>$hw_feitos</td>
                              </tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fim do Resumo -->

        <!-- Tabela unificada -->
        <?php
        $sql_registros = "
            SELECT 
                'Individual' AS tipo_aula,
                aluno_nome,
                professor_nome,
                status_aula AS status,
                data_aula,
                hora_aula,
                duracao_aula AS tempo_aula,
                livro_utilizado AS livro,
                numero_pagina AS pagina,
                ultima_atividade,
                old_homework,
                new_homework,
                descricao_homework,
                free_talk,
                mensagem_aluno_pais AS mensagem_pais,
                mensagem_professor
            FROM registro_aulas
            WHERE aluno_nome = '$nome_aluno'

            UNION ALL

            SELECT 
                'Grupo' AS tipo_aula,
                aluno_nome,
                professor_nome,
                status_aluno AS status,
                data_aula,
                hora_aula,
                tempo_aula,
                livro,
                pagina,
                ultima_atividade,
                old_homework,
                new_homework,
                descricao_homework,
                free_talk,
                mensagem_pais_alunos AS mensagem_pais,
                mensagem_professores AS mensagem_professor
            FROM registro_aulas_grupo
            WHERE FIND_IN_SET('$nome_aluno', aluno_nome)

            ORDER BY data_aula DESC, hora_aula DESC
        ";
        $result_registros = $conn->query($sql_registros);

        if ($result_registros->num_rows > 0) {
            echo "<div class='table-container'>";
            echo "<h2 class='text-center'>Registros de Aulas</h2>";
            echo "<table class='table'>";
            echo "<thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Aluno</th>
                        <th>Professor</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Duração</th>
                        <th>Livro</th>
                        <th>Página</th>
                        <th>Última Atividade</th>
                        <th>Old HW</th>
                        <th>New HW</th>
                        <th>Descrição HW</th>
                        <th>Free Talk</th>
                        <th>Mensagem Pais</th>
                        <th>Mensagem Professor</th>
                    </tr>
                  </thead><tbody>";

            while ($row = $result_registros->fetch_assoc()) {
                // Ajuste para aulas em grupo: pegar apenas o aluno logado e seu status correspondente
                if ($row['tipo_aula'] == 'Grupo') {
                    $alunos = array_map('trim', explode(',', $row['aluno_nome']));
                    $status = array_map('trim', explode(',', $row['status']));

                    $indice = array_search($nome_aluno, $alunos);

                    if ($indice !== false && isset($status[$indice])) {
                        $row['aluno_nome'] = $alunos[$indice];
                        $row['status'] = $status[$indice];
                    } else {
                        $row['aluno_nome'] = $nome_aluno;
                        $row['status'] = "Não encontrado";
                    }
                }

                echo "<tr>";
                echo "<td>{$row['tipo_aula']}</td>";
                echo "<td>{$row['aluno_nome']}</td>";
                echo "<td>{$row['professor_nome']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>{$row['data_aula']}</td>";
                echo "<td>{$row['hora_aula']}</td>";
                echo "<td>{$row['tempo_aula']}</td>";
                echo "<td>{$row['livro']}</td>";
                echo "<td>{$row['pagina']}</td>";
                echo "<td>{$row['ultima_atividade']}</td>";
                echo "<td>{$row['old_homework']}</td>";
                echo "<td>{$row['new_homework']}</td>";
                echo "<td>{$row['descricao_homework']}</td>";
                echo "<td>{$row['free_talk']}</td>";
                echo "<td>{$row['mensagem_pais']}</td>";
                echo "<td>{$row['mensagem_professor']}</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            echo "</div>";
        } else {
            echo "<p class='text-center'>Nenhum registro encontrado para o aluno '$nome_aluno'.</p>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>
