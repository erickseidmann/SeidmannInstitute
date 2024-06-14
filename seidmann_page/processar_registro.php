<?php

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php";

    // Dados do aluno principal
    $alunoPrincipal = $_POST["aluno"];
    $emailAlunoPrincipal = $_POST["email"];

    // Informações da aula
    $informacoesAula = $_POST["informacoesAula"];
    $teacher = $_POST["teacher"];
    $dataAula = $_POST["dataAula"];
    $curso = $_POST["curso"];
    $livro = $_POST["livro"];
    $tipoAula = $_POST["tipoAula"];
    $ultimaPagina = $_POST["ultimaPagina"];
    $ultimaAtividade = $_POST["ultimaAtividade"];
    $freeTalkTrabalhado = $_POST["freeTalkTrabalhado"];
    $homeWork = $_POST["homeWork"];
    $obs = $_POST["obs"];
    $obsPais = $_POST["obsPais"];

    // Construir a consulta SQL para o aluno principal
    $sql = "INSERT INTO registros_aulas (aluno_principal, email_aluno_principal, informacoes_aula, teacher, data_aula, curso, livro, tipo_aula, ultima_pagina_trabalhada, ultima_atividade_trabalhada, free_talk_trabalhado, home_work, obs, obsPais) VALUES (
        '$alunoPrincipal',
        '$emailAlunoPrincipal',
        '$informacoesAula',
        '$teacher',
        '$dataAula',
        '$curso',
        '$livro',
        '$tipoAula',
        '$ultimaPagina',
        '$ultimaAtividade',
        '$freeTalkTrabalhado',
        '$homeWork',
        '$obs',
        '$obsPais'
    )";

    // Executar a consulta para o aluno principal
    if (!mysqli_query($conn, $sql)) {
        echo "Erro ao inserir registro do aluno principal: " . mysqli_error($conn);
    }

    // Enviar email para o aluno principal
    $mailPrincipal = new PHPMailer\PHPMailer\PHPMailer();
    $mailPrincipal->isSMTP();
    $mailPrincipal->Host       = 'mail.seidmanninstitute.com';
    $mailPrincipal->SMTPAuth   = true;
    $mailPrincipal->Username   = 'gestao@seidmanninstitute.com';
    $mailPrincipal->Password   = '37216744*CaCo';
    $mailPrincipal->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mailPrincipal->Port       = 587;
    $mailPrincipal->setFrom('seidmanninstitute@seidmanninstitute.com.br', 'Gestao de Aulas');
    $mailPrincipal->isHTML(true);
    $mailPrincipal->Subject = 'Nova Aula Registrada';
    $mailPrincipal->addAddress($emailAlunoPrincipal);
    $mailPrincipal->Body = "
    <img src='assets/images/Welcome.png' alt='Seidmann Institute' style='max-width: 100%; height: auto;' />

        <h2>Aula Resgitrada</h2>
        <h2>Segue informações da aula</h2>
        <p>Curso: $curso </p>
        <p>Data da Aula: $dataAula </p>
        <p>Nome do Aluno : $alunoPrincipal</p>
        <p>Nome do Professor: $teacher </p>
        <p>Status da Aula: $informacoesAula </p>
        <p>Livro : $livro </p>
        <p>Ultima pagina trabalhada: $ultimaPagina </p>
        <p>Homework : $homeWork</p> 
        <p>Observações para os Pais: $obsPais</p>

        <p>Qualquer duvida estamos a disposição</p>
         
    ";

   
    if ($mailPrincipal->send()) {
        echo " E-mail enviado para $emailAlunoPrincipal.";
    } else {
        echo "Erro ao enviar o e-mail para $emailAlunoPrincipal: " . $mailPrincipal->ErrorInfo;
    }

    // Processar dados dos outros alunos
    if (isset($_POST["outroAlunoNome"])) {
        $outroAlunoNomes = $_POST["outroAlunoNome"];
        $outroAlunoEmails = $_POST["outroAlunoEmail"];

        for ($i = 0; $i < count($outroAlunoNomes); $i++) {
            $nome = $outroAlunoNomes[$i];
            $email = $outroAlunoEmails[$i];

            // ... (código para inserir registro na tabela registros_aulas)

            // Enviar email para o aluno atual
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host       = 'mail.seidmanninstitute.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'gestao@seidmanninstitute.com';
            $mail->Password   = '37216744*CaCo';
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->setFrom('seidmanninstitute@seidmanninstitute.com.br', 'Gestao de Aulas');
            $mail->isHTML(true);
            $mail->Subject = 'Nova Aula Registrada';
            $mail->addAddress($email);
            $mail->Body = "Uma nova aula foi registrada para você. Detalhes da aula:\n\n..."; // Preencha com o conteúdo do e-mail

            if ($mail->send()) {
                echo " E-mail enviado para $email.";
            } else {
                echo "Erro ao enviar o e-mail para $email: " . $mail->ErrorInfo;
            }
        }
    }

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
  <title>Registro de Aulas </title>
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
              <img src="assets/images/whatsapp-image-2022-09-13-at-14.34.33-121x121.jpg" alt="Seidmann Institute" style="height: 3.8rem;">
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
                    <h1 class="p-3 mb-2 bg-dark text-white text-center bg-opacity-75">Registro realizado com sucesso!</h1>
                        <div class="d-flex justify-content-evenly ">
                            <div>
                            <a href="reg_aulas.php"> <button type="button" class=" btn btn-info btn-lg"> 
                            Novo Registro </button> </a>         
                            </div>
    
                            <div >
                            <a href="listar_reg.php"> <button type="button" class=" btn btn-danger btn-lg"> 
                            Ver Registros </button> </a>         
                            </div>
                        </div>
                </div>    
            </div>
        </div> 
</div>      
</body>
</html>