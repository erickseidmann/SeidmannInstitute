<?php
// Inclui o arquivo de configuração do banco de dados
require_once 'config.php';

// Define uma variável para armazenar a mensagem de erro
$error_message = "";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o número de matrícula submetido
    $numero_matricula = $_POST["numero_matricula"];

    // Prepara a query SQL para verificar se o número de matrícula está correto
    $stmt = $conn->prepare("SELECT * FROM formulario WHERE numero_matricula = ?");
    $stmt->bind_param("s", $numero_matricula);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Número de matrícula correto, inicia a sessão e armazena o número de matrícula na variável de sessão
        session_start();
        $_SESSION['numero_matricula'] = $numero_matricula;

        // Redireciona para a página principal (index.php)
        header("Location: index.php");
        exit();
    } else {
        // Número de matrícula incorreto, define a mensagem de erro
        $error_message = "Número de matrícula incorreto. Por favor, tente novamente.";
    }

    // Fecha a declaração
    $stmt->close();
} else {
    // Se o formulário não foi submetido via POST, redireciona de volta para a página de login
    header("Location: login.php");
    exit();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro de Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="image/icon.png" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
        <a href="login.php" class="btn btn-primary">Voltar para o Login</a>
    </div>
</body>
</html>
