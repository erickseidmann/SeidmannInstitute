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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seidmann Institute</title>
    <link rel="icon" href="image/icon.png" type="image/x-icon">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar-expand.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <style>
#pdfViewerWrapper {
            max-height: 80vh; /* Define a altura máxima */
            overflow-y: scroll; /* Adiciona a barra de rolagem vertical */
        }
        #pdfViewer canvas {
            display: block;
            margin: auto;
            margin-bottom: 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-home"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Seidmann Institute</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Homework</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Materiais</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Livros de inglês
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="epblbook1.php" class="sidebar-link">Book 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Book 2</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Book 3</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Book 4</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Book 5</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Book 6</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Book 7</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Book 8</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item ">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two-espanhol" aria-expanded="false" aria-controls="multi-two-espanhol">
                                Livros de Espanhol
                            </a>
                            <ul id="multi-two-espanhol" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Libro 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Libro 2</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Libro 3</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Libro 4</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Libro 5</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 6</a>

                            </ul>
                        </li>
                    </ul>

                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
                <h1>
                    Student Portal
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




    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
