<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Função para converter array em string
function arrayToString($value) {
    if (is_array($value)) {
        return implode(", ", $value);
    }
    return $value;
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Percorre todas as variáveis do formulário e as converte em strings
    foreach ($_POST as $key => $value) {
        $_POST[$key] = arrayToString($value);
    }

    // Recupera os dados do formulário
    $nome_completo = $_POST["nome_completo"];
    $nome_responsavel = $_POST["nome_responsavel"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $data_nascimento = $_POST["data_nascimento"];
    $email = $_POST["email"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $valor_combinado = $_POST["valor_combinado"];
    $termos_condicoes = $_POST["termos_condicoes"];
    $cancelamento_curso = $_POST["cancelamento_curso"];
    $ferias = $_POST["ferias"];
    $opcao_livro = $_POST["opcao_livro"];
    $material = $_POST["material"];
    $dia_pagamento = $_POST["dia_pagamento"];
    $lembrete = $_POST["lembrete"];
    $opcao_pagamento = $_POST["opcao_pagamento"];
    $frequencia_aulas = $_POST["frequencia_aulas"];
    $melhores_horarios = $_POST["melhores_horarios"];
    $dia_semana = $_POST["dia_semana"];
    $nome_vendedor = $_POST["nome_vendedor"];

    // Insira os dados no banco de dados
    $sql = "INSERT INTO formulario (nome_completo, nome_responsavel, cpf, telefone, data_nascimento, email, cep, logradouro, cidade, estado, bairro, numero, complemento, valor_combinado, termos_condicoes, cancelamento_curso, ferias, opcao_livro, material, dia_pagamento, lembrete, opcao_pagamento, frequencia_aulas, melhores_horarios, dia_semana, nome_vendedor)
            VALUES ('$nome_completo', '$nome_responsavel', '$cpf', '$telefone', '$data_nascimento', '$email', '$cep', '$logradouro', '$cidade', '$estado', '$bairro', '$numero', '$complemento', '$valor_combinado', '$termos_condicoes', '$cancelamento_curso', '$ferias', '$opcao_livro', '$material', '$dia_pagamento', '$lembrete', '$opcao_pagamento', '$frequencia_aulas', '$melhores_horarios', '$dia_semana', '$nome_vendedor')";

    if ($conn->query($sql) === TRUE) {
        echo " Matrícula realizada com sucesso!";
    } else {
        echo "Erro ao enviar o formulário: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.6.8, mobirise.com">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image:src" content="">
  <meta property="og:image" content="">
  <meta name="twitter:title" content="Blog">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <title>Cadastro</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pkubebP0x8l7s5bq4XgzLgvs5pP5Dpr8U0I6k7+4JcYKzzw3k0CGPlFElN4Q8RzO" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="assets/images/whatsapp-image-2022-09-13-at-14.34.33-121x121.jpg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <meta name="description" content="">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="/seidmann_page/style/style.css">
  <script type="text/javascript" src = "https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.min.js"> </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

  <script src="JS/app.js"></script>
  <script defer src="script.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <section data-bs-version="5.1" class="menu cid-tkzhgMMrxs" once="menu" id="menu1-x">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-logo">
            <a href="https://mobiri.se">
              <img src="assets/images/whatsapp-image-2022-09-13-at-14.34.33-121x121.jpg" alt="Mobirise Website Builder" style="height: 3.8rem;">
            </a>
          </span>
          <span class="navbar-caption-wrap">
            <a class="navbar-caption text-black text-primary display-7" href="http://seidmanninstitute.com/">SEIDMANN INSTITUTE</a>
          </span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
            <li class="nav-item">
              <a class="nav-link link text-black text-primary display-4" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link text-black text-primary display-4" href="page1.html">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link text-black text-primary display-4" href="horarios.html">Agenda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link text-black text-primary display-4" href="formularios.html">Formulários</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <section data-bs-version="5.1" class="info3 cid-tkzhgHSUx7" id="info3-t">
<div class="container ">
        <div class="row form-cadastro justify-content-center">
            <div class="col-6 aling-self-center bg-white">
                <div class="row justify-content-center mb-4">
                    <h1 class="p-3 mb-2 bg-dark text-white text-center bg-opacity-75">Matrícula realizada com sucesso!</h1>
                        <div class="d-flex justify-content-evenly ">
                            <div>
                            <a href="cadastro.php"> <button type="button" class=" btn btn-info btn-lg"> 
                            Novo Usuario </button> </a>         
                            </div>
    
                            <div >
                            <a href="https://www.google.com/"> <button type="button" class=" btn btn-danger btn-lg"> 
                            Sair </button> </a>         
                            </div>
                        </div>
                </div>    
            </div>
        </div> 
</div>      
</body>
</html>