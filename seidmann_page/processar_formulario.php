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
    $numero_matricula = $_POST["numero_matricula"];
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
    $sql = "INSERT INTO formulario ( nome_completo, nome_responsavel, cpf, telefone, data_nascimento, email, cep, logradouro, cidade, estado, bairro, numero, complemento, valor_combinado, termos_condicoes, cancelamento_curso, ferias, opcao_livro, material, dia_pagamento, lembrete, opcao_pagamento, frequencia_aulas, melhores_horarios, dia_semana, nome_vendedor, numero_matricula)
            VALUES ( '$nome_completo', '$nome_responsavel', '$cpf', '$telefone', '$data_nascimento', '$email', '$cep', '$logradouro', '$cidade', '$estado', '$bairro', '$numero', '$complemento', '$valor_combinado', '$termos_condicoes', '$cancelamento_curso', '$ferias', '$opcao_livro', '$material', '$dia_pagamento', '$lembrete', '$opcao_pagamento', '$frequencia_aulas', '$melhores_horarios', '$dia_semana', '$nome_vendedor', '$numero_matricula')";

//    if ($conn->query($sql) === TRUE) {
//        echo " Matrícula realizada com sucesso!";
//    } else {
//        echo "Erro ao enviar o formulário: " . $conn->error;
//    }
//
//    // Fecha a conexão com o banco de dados
//    $conn->close();
//}
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Configurações do servidor de e-mail
    $mail->isSMTP();
    $mail->Host       = 'mail.seidmanninstitute.com'; // Insira o host do servidor de e-mail
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gestao@seidmanninstitute.com'; // Insira o e-mail do remetente
    $mail->Password   = '37216744*CaCo'; // Insira a senha do remetente
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Remetente e destinatário
    $mail->setFrom('seidmanninstitute@seidmanninstitute.com.br', 'Gestao de Aulas'); // Insira o e-mail e nome do remetente
    $mail->addAddress($email); // Utiliza o e-mail do usuário matriculado como o endereço de e-mail do destinatário
    $mail->addAddress('seidmanninstitute@seidmanninstitute.com.br'); // Adiciona o endereço de e-mail para a cópia do e-mail

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Matricula Seidmann'; // Assunto do e-mail

    // Corpo do e-mail (conteúdo do formulário)
    $body = "
    <img src='assets/images/Welcome.png' alt='Seidmann Institute' style='max-width: 100%; height: auto;' />

        <h2>Agradecemos sua matrícula!</h2>
        <h2>Segue os dados da Matricula</h2>
        <p>Numero de Matricula: $numero_matricula</p>
        <p>Nome : $nome_completo</p>
        <p>Valor do Curso : $valor_combinado</p>
        <p>Frequencia : $frequencia_aulas</p>
        <p>Melhores horarios : $melhores_horarios</p>
        <p>Melhores dias da semana: $dia_semana</p>
        <p>Opção de Pagamento : $opcao_pagamento</p>
        <p>Opção de Material : $opcao_livro</p>

        <p>$nome_completo , a equipe Seidmann, sente muita alegria e satisfação por ter você estudando, crescendo e aprendendo conosco e queremos que saiba que estaremos dando nosso melhor para ajudar você a realizar seus sonhos e suas metas de aprender um novo idioma. E para melhor atender nossos alunos(as), segue alguns importantes tópicos e regras sobre pagamentos e cancelamentos de aulas, por favor caso tenha qualquer dúvida entrar em contato com a escola. Att. Equipe Seidmann</p>
        
        <h3>Dia do pagamento:</h3>
        <p>Todos os pagamentos devem ser realizados até o dia acordado pelo aluno e o professor, caso caia em fim de semana ou feriado, deverá ser feito no próximo dia.</p>
        <h3>Valores para cursos individuais:</h3>
        <p>Valor hora/aula R$ 65,00; Valor, mensalidade para 1 h semanal R$ 260,00; Valor, mensalidade para 2 hs semanal R$ 500,00; valor, mensalidade para 2,5hs semanal R$ 600,00. Para cursos em grupos: Valor mensalidade para 2 hs semanal R$ 230,00 Valor, mensalidade para 2,5hs semanal R$ 280,00 POR integrante.</p>
        <p><strong>VALORES DE COMBOS DEVEM SER ESPECIFICADOS</strong></p>
        <p><strong>O valor do seu curso é: $valor_combinado </strong></p>
        
        
        <p>Caso o aluno(a) não notifique a escola do atraso do pagamento, o aluno(a) fica sujeito a perca de descontos na mensalidade, ou seja, é cobrado a mensalidade sem descontos.</p>
        <p><strong>a data de pagamento é:  $dia_pagamento </strong></p>
        
        <h3>Cancelamentos:</h3>
        <p>A fim de garantir a qualidade de nossos serviços educacionais, solicitamos que qualquer cancelamento de aula seja feito com, no mínimo, 6 horas de antecedência. Caso não seja possível efetuar o cancelamento dentro desse prazo, a aula será considerada como realizada. Além disso, todos os alunos têm direito a uma aula emergencial por mês, que pode ser cancelada com até 30 minutos de antecedência. Valorizamos o compromisso e o respeito com nossos horários de aulas para proporcionar uma experiência de aprendizado satisfatória para todos os nossos alunos.</p>
        <h3>Aulas perdidas:</h3>
        <p>Uma aula é perdida quando o aluno(a) não realiza os cancelamentos com o tempo determinado de 6 horas antes da aula, a aula fica computada no sistema como perdida.</p>
        <h3>Troca de Horário e reposição de aulas:</h3>
        <p>Quanto à troca de horário e reposição de aulas, solicitamos que os alunos entrem em contato com nossa equipe de gestão de aulas para efetuar qualquer alteração. As reposições devem ser realizadas dentro do prazo de até 1 (um) mês, pois, caso não sejam agendadas nesse período, a aula será considerada como perdida, não sendo possível acumulá-la para o mês seguinte. No entanto, fazemos exceções para cancelamentos de longa duração notificados com, pelo menos, 1 mês de antecedência.

        Além disso, ressaltamos que o cancelamento do curso deve ser comunicado com pelo menos uma semana de antecedência em relação à data de pagamento mensal. Caso o cancelamento ocorra fora desse prazo, será aplicada uma taxa referente a uma semana de aulas</p>
        <h3>Férias:</h3>
        <p>A escola não faz ajustes nos valores para os meses de 5 semanas, mas para ajustar o banco de horas, a escola tem duas férias no ano, sendo a última semana do mês de julho e a última semana de dezembro e a primeira de janeiro. Totalizando 3 semanas e dois dias de férias por ano. Qualquer dúvida favor comunicar-se com o professor responsável.</p>
        <p>A escola não trabalha nos feriados nacionais, as únicas aulas que podem ser remanejadas são as aulas de 1 vez por semana.</p>
        <h3>Material:</h3>
        <p>O valor do material não está incluso no valor das mensalidades, o material é adquirido com a parceria da EPBL, sendo o preço estabelecido pela EPBL. O valor atual é de R$ 100,00 cada livro (1 ao 8), é possível compras em combo. O material é vendido em PDF, mas o fornecedor nos dá a opção de enviar o material impresso também. O aluno pode optar. A partir do ano de 2020 todos os materiais só serão entregues depois do envio do valor do mesmo.</p>
        <h3>Lembretes:</h3>
        <p>Os lembretes são enviados sempre um dia antes do vencimento da mensalidade. Caso opte por não receber, é importante lembrar que um atraso não notificado pode resultar em perda do desconto oferecido pela escola.</p>
        
  
    
        
    ";

    $mail->Body = $body;

    // Envio do e-mail
    if ($mail->send()) {
        echo "Matrícula realizada com sucesso! Um e-mail com os dados do formulário foi enviado.";
    } else {
        echo "Erro ao enviar o e-mail: " . $mail->ErrorInfo;
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