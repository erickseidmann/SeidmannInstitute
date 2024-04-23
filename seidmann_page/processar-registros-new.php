<?php
// Verifica se os dados foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados
    require_once "config.php";

    // Verifique se a chave 'alunos' está definida no $_POST
    if(isset($_POST['alunos'])) {
        foreach ($_POST['alunos'] as $aluno) {
            // Verificar se o nome do aluno não está vazio
            if (!empty($aluno['nome'])) {
                // Extrair os valores do array $aluno
                $nome_aluno = $aluno['nome'];
                $info_status = $aluno['info-status'];
                $teacher = $_POST['teacher'];
                $tempo_aula = $_POST['tempo-aula'];
                $data = $_POST['data'];
                $tipo_curso = $_POST['tipo-curso'];
                $tipo_aula = $_POST['tipo-aula'];
                $book = $_POST['book'];
                $pagina = $_POST['page'];
                $atividade = $_POST['atividade'];
                $ultimohomework =$_POST['ultimohomework'];
                $homeworkdesignado =$_POST['homeworkdesignado'];
                $homework = $_POST['homework'];
                $free_talk_subject = $_POST['free-talk'];
                $free_talk_link = $_POST['free-link'];
                $obs = $_POST['obs'];
                $info_parents = $_POST['info'];
                $mensagem = $_POST['msg'];

                // Execute a sua lógica de inserção no banco de dados aqui
                $sql = "INSERT INTO aulas_grupo (nome_aluno, info_status, teacher, tempo_aula, data, tipo_curso, tipo_aula, book, pagina, atividade, ultimohomework, homeworkdesignado, homework, free_talk_subject, free_talk_link, obs, info_parents, mensagem) VALUES ('$nome_aluno', '$info_status', '$teacher', '$tempo_aula', '$data', '$tipo_curso', '$tipo_aula', '$book','$pagina', '$atividade', '$ultimohomework','$homeworkdesignado','$homework', '$free_talk_subject', '$free_talk_link', '$obs', '$info_parents', '$mensagem')";

                // Execute a consulta SQL
                if ($conn->query($sql) !== TRUE) {
                    // Se ocorrer um erro, redirecionar para a página de sucesso com parâmetro de erro
                    header("Location: sucesso.php?error=sql_error");
                    exit();
                }
            }
        }
        // Redirecionar para a página de sucesso após processar todos os alunos
        header("Location: sucesso.php");
        exit();
    } else {
        // Se nenhum aluno foi enviado, redirecionar para a página de sucesso com parâmetro de erro
        header("Location: sucesso.php?error=no_students");
        exit();
    }

    // Fecha a conexão
    $conn->close();
}
?>