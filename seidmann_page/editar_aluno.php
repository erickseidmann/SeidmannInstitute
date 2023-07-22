<!-- editar_aluno.php -->
<!DOCTYPE html>
<html>
<head>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.6.8, mobirise.com">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image:src" content="">
  <meta property="og:image" content="">
  <meta name="twitter:title" content="Blog">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <title>Editar Aluno</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
  <script defer src="script.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
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
            <li class="nav-item">
              <a class="nav-link link text-black text-primary display-4" href="listar_alunos.php">listar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <section data-bs-version="5.1" class="info3 cid-tkzhgHSUx7" id="info3-t">
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(53, 53, 53);"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="card col-12 col-lg-10">
          <div class="card-wrapper">
            <div class="card-box align-center">
              <h4 class="card-title mbr-fonts-style align-center mb-4 display-1"><strong>Inglês para alcançar o mundo!</strong></h4>
              <div class="mbr-section-btn mt-3">
                <a class="btn btn-warning-outline display-4" href="https://wa.me/5519988279707" target="_blank">Falar com a Direção!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <h1>Editar Aluno</h1>
    <?php
    // Inclua o arquivo de configuração do banco de dados
    require_once "config.php";

    // Verifica se o ID do aluno foi fornecido via parâmetro na URL
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Obtém o ID do aluno da URL
        $id = trim($_GET["id"]);

        // Consulta o aluno com base no ID fornecido
        $sql = "SELECT * FROM formulario WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Obtém os dados do aluno da consulta
            $row = $result->fetch_assoc();

            // Exibe o formulário preenchido com os dados do aluno
            ?>
        <section data-bs-version="5.1" class="features3 cid-tkzhgIxW41" id="features3-u">
            <form class="container " action="salvar_edicao_aluno.php" method="post">
            <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-6 ">
            <label for="nome_completo" class="form-label ">Numero de  matricula:</label>
                <input type="number" name="id" class="form-control bg-light" value="<?php echo $row["id"]; ?>" disabled="">
            </div>
            <p></p>
            </div>

                <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-6 ">
                <label for="nome_completo" class="form-label ">Nome Completo:</label>
                <input type="text" id="nome_completo" class="form-control bg-light" name="nome_completo" value="<?php echo $row["nome_completo"]; ?>" aria-describedby="emailHelp" ><br>
            </div>
            
            <div class="col-md-6 ">
                <label for="nome_responsavel" class="form-label ">Nome do responsável:</label>
                <input type="text" id="nome_responsavel" class="form-control bg-light" name="nome_responsavel" value="<?php echo $row["nome_responsavel"]; ?>" ><br>
            </div>
        </div>

        <!-- Informações para  nota fiscal  -->
        <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-6 " >
                <label for="cpf" class="form-label ">CPF Se você for menor de idade adicionar o cpf do responsável:</label>
                <input class="form-control bg-light" type="text" id="cpf" name="cpf" value="<?php echo $row["cpf"]; ?>" ><br>
            </div>

            <div class="col-md-6 ">
                <label for="telefone" class="form-label ">Celular:</label>
                <input class="form-control bg-light" type="text" id="telefone" name="telefone" value="<?php echo $row["telefone"]; ?>" ><br>
            </div>
            
            <div class="col-md-6 ">
                <label for="data_nascimento" class="form-label ">Data de nascimento:</label>
                <input class="form-control bg-light" type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $row["data_nascimento"]; ?>" ><br>
            </div>

            <div class="col-md-6 ">
                <label for="email" class="form-label ">E-mail:</label>
                <input class="form-control bg-light" type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" ><br>
            </div>
        </div>

        <!-- INFORMAÇÕES SOBRE O ENDEREÇO -->
        <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-6">
                <label for="cep" class="form-label ">CEP*</label>
                <input type="text" name="cep" class="form-control bg-light" id="cep" maxlength="8" onkeyup="mascara_cep()" placeholder="__.___-__" value="<?php echo $row["cep"]; ?>" />
            </div>
            <div class="col-md-6">
                <label for="logradouro" class="form-label ">Rua*</label>
                <input type="text" name="logradouro" class="form-control bg-light" id="logradouro" placeholder="Logradouro" readonly value="<?php echo $row["logradouro"]; ?>" />
            </div>
        </div>
        <div class="col-md-6">
                <label for="cidade" class="form-label ">Cidade*</label>
                <input type="text" name="cidade" class="form-control bg-light" id="cidade" placeholder="Cidade" readonly value="<?php echo $row["cidade"]; ?>" />
            </div>
            <div class="col-md-6">
                <label for="estado" class="form-label ">Estado*</label>
                <select id="uf" name="estado" class="form-control bg-light" readonly>
                    <option value="MG" <?php if ($row["estado"] == "MG") echo "selected"; ?>>MG</option>
                    <option value="DF" <?php if ($row["estado"] == "DF") echo "selected"; ?>>DF</option>
                    <option value="SP" <?php if ($row["estado"] == "SP") echo "selected"; ?>>SP</option>
                    <option value="GO" <?php if ($row["estado"] == "GO") echo "selected"; ?>>GO</option>
                    <option value="RR" <?php if ($row["estado"] == "RR") echo "selected"; ?>>RR</option>
                    <option value="AP" <?php if ($row["estado"] == "AP") echo "selected"; ?>>AP</option>
                    <option value="AM" <?php if ($row["estado"] == "AM") echo "selected"; ?>>AM</option>
                    <option value="AC" <?php if ($row["estado"] == "AC") echo "selected"; ?>>AC</option>
                    <option value="RO" <?php if ($row["estado"] == "RO") echo "selected"; ?>>RO</option>
                    <option value="TO" <?php if ($row["estado"] == "TO") echo "selected"; ?>>TO</option>
                    <option value="MA" <?php if ($row["estado"] == "MA") echo "selected"; ?>>MA</option>
                    <option value="PI" <?php if ($row["estado"] == "PI") echo "selected"; ?>>PI</option>
                    <option value="CE" <?php if ($row["estado"] == "CE") echo "selected"; ?>>CE</option>
                    <option value="RN" <?php if ($row["estado"] == "RN") echo "selected"; ?>>RN</option>
                    <option value="PB" <?php if ($row["estado"] == "PB") echo "selected"; ?>>PB</option>
                    <option value="PE" <?php if ($row["estado"] == "PE") echo "selected"; ?>>PE</option>
                    <option value="AL" <?php if ($row["estado"] == "AL") echo "selected"; ?>>AL</option>
                    <option value="SE" <?php if ($row["estado"] == "SE") echo "selected"; ?>>SE</option>
                    <option value="BA" <?php if ($row["estado"] == "BA") echo "selected"; ?>>BA</option>
                    <option value="MT" <?php if ($row["estado"] == "MT") echo "selected"; ?>>MT</option>
                    <option value="MS" <?php if ($row["estado"] == "MS") echo "selected"; ?>>MS</option>
                    <option value="ES" <?php if ($row["estado"] == "ES") echo "selected"; ?>>ES</option>
                    <option value="RJ" <?php if ($row["estado"] == "RJ") echo "selected"; ?>>RJ</option>
                    <option value="PR" <?php if ($row["estado"] == "PR") echo "selected"; ?>>PR</option>
                    <option value="SC" <?php if ($row["estado"] == "SC") echo "selected"; ?>>SC</option>
                    <option value="RS" <?php if ($row["estado"] == "RS") echo "selected"; ?>>RS</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="bairro" class="form-label ">Bairro*</label>
                <input type="text" name="bairro" class="form-control bg-light" id="bairro" placeholder="Bairro" readonly value="<?php echo $row["bairro"]; ?>" />
            </div>
            <div class="col-md-6">
                <label for="numero" class="form-label ">Número*</label>
                <input type="number" name="numero" class="form-control bg-light" id="numero" placeholder="Número" value="<?php echo $row["numero"]; ?>" />
            </div>
            <div class="col-md-6">
                <label for="complemento" class="form-label ">Complemento</label>
                <input type="text" name="complemento" class="form-control bg-light" id="complemento" placeholder="Complemento" value="<?php echo $row["complemento"]; ?>" />
            </div>
        </div>


        <!-- Campo "Valor combinado com vendedor(a)" -->
        <div class="col-md-4">
            <label class="form-label" for="valor_combinado">Valor combinado com vendedor(a):</label>
            <input class="form-control bg-light" type="text" id="valor_combinado" name="valor_combinado" placeholder="R$00,00" value="<?php echo $row["valor_combinado"]; ?>"><br>
        </div>
        <br>


        <!-- Select "Opção de pagamento" -->
        <div class="row input-group col-md-6 fw-semibold ">
            <h3>Opção de pagamento:</h3>
            <div class="col-md-4 ">
                <select id="opcao_pagamento" name="opcao_pagamento" class="form-select bg-light" >
                    <option value="pix" <?php if ($row["opcao_pagamento"] == "pix") echo "selected"; ?>  >PIX</option>
                    <option  value="boleto" <?php if ($row["opcao_pagamento"] == "boleto") echo "selected"; ?>  >Pagamento por BOLETO (acréscimo de R$2,00)</option>
                    <option value="recorrencia" <?php if ($row["opcao_pagamento"] == "recorrencia") echo "selected"; ?>>RECORRÊNCIA (CARTÃO DE CRÉDITO)</option>
                </select><br>
            </div>
        </div>

        <p></p>
        <br>

        <h3 class="text-center">Receber um lembrete de vencimento?</h3>
          <h5 class="lh-base p-3 mb-2 bg-light text-dark">Os lembretes são enviando sempre um dia antes do vencimento da mensalidade. Caso opte por não receber é importante lembrar que um atraso não notificado pode resultar em perca do desconto oferecido pela escola. </h5>
        <br>
        <div class="row input-group col-md-6 fw-semibold ">
        <div class="col-md-4 ">
        <select class="form-select bg-light" id="lembrete" name="lembrete" required>
            <option value="sim" <?php if ($row["lembrete"] == "SIM") echo "selected"; ?>>SIM</option>
            <option value="nao" <?php if ($row["lembrete"] == "NAO") echo "selected"; ?>>Não</option>
            </select><br>
        </div>
        </div>
          <br>

        <!-- Frequência das aulas -->
        <h3>Frequência das aulas:</h3>
        <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-6 ">
                <select class="form-select bg-light" id="frequencia_aulas" name="frequencia_aulas" required>
                    <option value="selecione">Selecionar</option>
                    <option value="30min_1x" <?php if ($row["frequencia_aulas"] == "30min_1x") echo "selected"; ?>>1x de 30 min</option>
                    <option value="30min_2x" <?php if ($row["frequencia_aulas"] == "30min_2x") echo "selected"; ?>>2x de 30 min</option>
                    <option value="30min_3x" <?php if ($row["frequencia_aulas"] == "30min_3x") echo "selected"; ?>>3x de 30 min</option>
                    <option value="30min_4x"<?php if ($row["frequencia_aulas"] == "30min_4x") echo "selected"; ?> >4x de 30 min</option>
                    <option value="30min_5x" <?php if ($row["frequencia_aulas"] == "30min_5x") echo "selected"; ?> >5x de 30 min</option>
                    <option value="aulas_1h"<?php if ($row["frequencia_aulas"] == "aulas_1h") echo "selected"; ?>>Aulas de 1 hora</option>
                </div>
            </select><br>
        </div>
        <p></p>

        <div class="col-md-3 ">
            <label for="melhores_horarios">Melhores horários (trabalhamos das 7:00 as 21:30):</label>
            <input class="form-control" id="melhores_horarios" name="melhores_horarios" rows="4" cols="50" value="<?php echo $row["melhores_horarios"]; ?>"></input><br>
        </div>
        <br>


        <!-- Checkbox "Melhores dias da semana para fazer aula" -->
        <p></p>
        <br>

        <div class="row input-group col-md-6 fw-semibold ">
              <div class="col-md-4 ">
                <h3>Melhores dias da semana para fazer aula:</h3>
                <h5>não trabalhamos aos sabados e domingos</h5>
                <input class="form-control bg-light" id="dia_semana" name="dia_semana" rows="4" cols="50" value="<?php echo $row["dia_semana"]; ?>"></input><br>
              </div>
          </div>

        <p></p>
        <br>

        <!-- Campo "Nome do vendedor" -->
        <div class="col-md-6 ">
            <label for="nome_vendedor" class="form-label ">Nome do vendedor:</label>
            <input type="text" id="nome_vendedor" name="nome_vendedor" class="form-control bg-light" value="<?php echo $row["nome_vendedor"]; ?>" ><br>
        </div>





        
                <div class="row input-group col-md-6 fw-semibold ">
                    <div class="col-md-6 ">
                <!-- Botão para enviar o formulário de edição -->
                    <input type="submit" class="btn btn-primary" value="Salvar Edição">
                    </div>
                </div>
            </form>
            </section>    
            <section data-bs-version="5.1" class="footer3 cid-tkzhgNDZCM" once="footers" id="footer3-y">
    <div class="container">
      <div class="media-container-row align-center mbr-white">
        <div class="row row-links">
          <ul class="foot-menu">
            <li class="foot-menu-item mbr-fonts-style display-7">Email</li>
            <li class="foot-menu-item mbr-fonts-style display-7">Instagram</li>
            <li class="foot-menu-item mbr-fonts-style display-7">Facebook</li>
          </ul>
        </div>
        <div class="row social-row">
          <div class="social-list align-right pb-2">
            <div class="soc-item">
              <a href="http://seidmanninstitute.com/" target="_blank">
                <span class="mbr-iconfont mbr-iconfont-social mobi-mbri-arrow-next mobi-mbri"></span>
              </a>
            </div>
            <div class="soc-item">
              <a href="https://www.facebook.com/Seidmanninstitute" target="_blank">
                <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
              </a>
            </div>
            <div class="soc-item">
              <a href="https://www.youtube.com/channel/UCrVxXG9Z2TqdokA7ST91bcA" target="_blank">
                <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon"></span>
              </a>
            </div>
            <div class="soc-item">
              <a href="https://www.instagram.com/seidmann_institute/" target="_blank">
                <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="row row-copirayt">
          <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">© Seidmann Institute All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
  <script src="//http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/jquery.mask.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/additional-methods.js"></script>
  <script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>
            <?php
        } else {
            echo "Aluno não encontrado.";
        }

    } else {
        echo "ID do aluno não fornecido.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>
