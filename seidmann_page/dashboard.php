<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Saudação</title>
</head>
<body>
    <?php
        session_start();

        // Verifica se o aluno está logado
        if(isset($_SESSION['nome_aluno'])) {
            $nome_aluno = $_SESSION['nome_aluno'];
            echo "<h1>Olá aluno $nome_aluno, seja bem-vindo!</h1>";
        } else {
            // Se não estiver logado, redireciona para a página de login
            header("Location: login_aluno.php");
            exit(); // Encerra o script para evitar que o restante do código seja executado
        }
    ?>
    <!-- Seu conteúdo adicional aqui -->
    <a href="logout.php">Logout</a> <!-- Link para a página de logout -->
</body>
</html>