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
  <title>Registro de Aulas</title>
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
<body>
  <section data-bs-version="5.1" class="menu cid-tkzhgMMrxs" once="menu" id="menu1-x">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-logo">
            <a href="index.html">
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
              <a class="nav-link link text-black text-primary display-4" href="cadastro.php">Matrícula</a>
            </li>

            <li class="nav-item">
              <a class="nav-link link text-black text-primary display-4" href="reg_aulas.php">Registros de Aulas</a>
            </li> 

            <li class="nav-item">
              <a class="nav-link link text-black text-primary display-4" href="listar_reg.php">Ver Registros</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </section>

<body>
<section data-bs-version="5.1" class="features3 cid-tkzhgIxW41" id="features3-u">
    
  
  <form id="form_reg" class="container " action="processar_registro.php" method="post">
    <h2>Registros de Aulas</h2>

    <p></p>

    <div class="row input-group col-md-6 fw-semibold ">


            <div class="col-md-4 ">
    

        <!-- Nome do aluno selecionado após adicionar -->
        <div id="alunoSelecionado" class="aluno-nome"></div>

        <!-- Primeiro select oculto -->
        <label for="aluno">Nome do Aluno:</label>
        <p></p>
        <select name="aluno" id="aluno" class="form-select bg-light" onchange="buscarEmail(0)">
            <option value="">Selecione um aluno</option>
            <?php
            require_once "config.php";
            // Supondo que $conn seja a conexão com o banco de dados
            $sql = "SELECT nome_completo, email FROM formulario";
            $result = $conn->query($sql);
            $alunos = array();
            while ($row = $result->fetch_assoc()) {
                $nomeAluno = $row['nome_completo'];
                $emailAluno = $row['email'];
                echo "<option value='$nomeAluno'>$nomeAluno</option>";
                $alunos[$nomeAluno] = $emailAluno;
            }
            ?>
        </select>
        </div>

                <div class="col-md-4 ">
        <label for="email">Email:</label>
        <p></p>
        <input type="email" name="email" id="email" class="form-control bg-light" readonly>
        <br><br>
        </div>

        <div class="col-md-6 ">
        <div id="outrosAlunos"></div>
            
        <input type="hidden" id="numAlunos" value="0" class="form-select bg-light">

       

        <button class="btn btn-primary" type="button" onclick="adicionarAluno()">Adicionar Aluno</button>
        <br><br>
        </div>
                
        </div>

        <!-- Container para adicionar outros alunos, caso a aula seja em grupo -->

        <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">

        <label for="informacoesAula">Informações da Aula:</label>
        <h6>Caso Membro do grupo não compareça nome deve constar na obs dos pais </h6>
        <p></p>
        <select name="informacoesAula" id="informacoesAula" class="form-select bg-light">
            <option value="realizada">Realizada</option>
            <option value="MembroGrupo">Membro do Grupo não compareceu </option>
            <option value="naoCompareceu">Ausente</option>
            <option value="reposicao">Reposição Feita</option>
            <option value="reposicao">Inicial</option>
        </select>
              </div>

            <div class="col-md-4 ">
            <label for="tipoAula">Tipo de Aula:</label>
            <p></p>
            <p></p>
        <select name="tipoAula" id="tipoAula" class="form-select bg-light">
            <option value="class">Class</option>
            <option value="freeTalk">Free Talk</option>
        </select>
        <br><br>

          </div>
        </div>


        <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="dataAula">Data da Aula:</label>
        <p></p>
        <input type="date" name="dataAula" id="dataAula" class="form-control bg-light">
        <br><br>
        </div>
            <div class="col-md-4 ">
        <label for="curso">Curso:</label>
        <p></p>
        <select name="curso" id="curso" class="form-select bg-light">
            <option value="ingles">Inglês</option>
            <option value="espanhol">Espanhol</option>
        </select>
        <br><br>
        </div>        
      </div>
      <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="livro">Livro:</label>
        <p></p>
        <input type="text" name="livro" id="livro" class="form-control bg-light">
        <br><br>
        </div>
            <div class="col-md-4 ">          
        <label for="teacher">Nome do Teacher:</label>
        <p></p>
        <input type="text" name="teacher" id="teacher" class="form-control bg-light">
        <br><br>

        </div>        
      </div>

      <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="ultimaPagina">Última Página Trabalhada:</label>
        <h6>Se for Free Talk escreva free talk: </h6>
        <input type="text" name="ultimaPagina" id="ultimaPagina" class="form-control bg-light">
        <br><br>
        </div>
            <div class="col-md-4 ">    
        <label for="ultimaAtividade">Última Atividade Trabalhada:</label>
        <h6>Se for Free Talk escreva free talk: </h6>
        <input type="text" name="ultimaAtividade" id="ultimaAtividade" class="form-control bg-light">
        <br><br>
        </div>        
      </div>

      <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="freeTalkTrabalhado">Free Talk Trabalhado:</label>
        <h6>Coloque o link da atividade ou escreva o titulo do texto </h6>
        <input type="text" name="freeTalkTrabalhado" id="freeTalkTrabalhado" class="form-control bg-light">
        <br><br>
        </div>
            <div class="col-md-4 ">   
        <label for="homeWork">Home Work:</label>
        <h6>Descrever Claramente o HW </h6>
        <input type="text" name="homeWork" id="homeWork" class="form-control bg-light">
        <br><br>
        </div>        
      </div>
        <!-- OBS (only teachers can see) -->
        <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="obs">OBS (Apenas para professores):</label>
        <textarea name="obs" id="obs" rows="4" class="form-control bg-light"></textarea>
        <br><br>
        </div>        

        <div class="col-md-4 ">
        <label for="obs">OBS para os Pais:</label>
        <textarea name="obsPais" id="obsPais" rows="4" class="form-control bg-light"></textarea>
        <br><br>
        </div> 
      </div>
        <input id="botaoEnviar" class="btn btn-primary" type="submit" value="Registrar">
    </form>

    <script>
        // Armazenar os alunos e seus respectivos e-mails em um objeto JavaScript
        var alunosEEmails = <?php echo json_encode($alunos); ?>;

        // Função para buscar o email do aluno selecionado
        function buscarEmail(index) {
            var alunoSelect;
            var emailInput;
            if (index === 0) {
                // Se for o primeiro select, usar os elementos originais
                alunoSelect = document.getElementById("aluno");
                emailInput = document.getElementById("email");
            } else {
                // Para os outros selects, buscar dentro do container de outros alunos
                alunoSelect = document.getElementById("outrosAlunos").children[index].querySelector(".aluno-select");
                emailInput = document.getElementById("outrosAlunos").children[index].querySelector(".email-input");
            }
            var nomeSelecionado = alunoSelect.value;

            if (nomeSelecionado in alunosEEmails) {
                emailInput.value = alunosEEmails[nomeSelecionado];
            } else {
                emailInput.value = "";
            }
        }

        // Função para criar a caixa de e-mail e a caixa de seleção de aluno
        function criarCaixaAluno() {
            var outrosAlunosDiv = document.getElementById("outrosAlunos");
            var alunoContainer = document.createElement("div");
            alunoContainer.className = "aluno-container";

            var novoAlunoSelect = document.createElement("select");
            novoAlunoSelect.name = "outroAlunoNome[]";
            novoAlunoSelect.className = "aluno-select";
            novoAlunoSelect.innerHTML = document.getElementById("aluno").innerHTML;

            var novoEmailInput = document.createElement("input");
            novoEmailInput.type = "email";
            novoEmailInput.name = "outroAlunoEmail[]";
            novoEmailInput.placeholder = "Email do Aluno";
            novoEmailInput.className = "email-input";

            var removerAlunoButton = document.createElement("button");
            removerAlunoButton.type = "button";
            removerAlunoButton.className = "remover-aluno-button";
            removerAlunoButton.textContent = "Remover Aluno";
            removerAlunoButton.onclick = function() {
                outrosAlunosDiv.removeChild(alunoContainer);
                atualizarNumAlunos();
            };

            alunoContainer.appendChild(novoAlunoSelect);
            alunoContainer.appendChild(novoEmailInput);
            alunoContainer.appendChild(removerAlunoButton);

            outrosAlunosDiv.appendChild(alunoContainer);

            // Adicionar evento onchange ao novo select de aluno
            novoAlunoSelect.onchange = function() {
                var index = Array.prototype.indexOf.call(outrosAlunosDiv.children, alunoContainer);
                buscarEmail(index);
            };

            // Atualizar o e-mail do novo aluno adicionado
            buscarEmail(outrosAlunosDiv.childElementCount - 1);
        }

        // Função para adicionar outro aluno (caso a aula seja em grupo)
        function adicionarAluno() {
            criarCaixaAluno();
            atualizarNumAlunos();
        }

        // Função para atualizar o número de alunos adicionados
        function atualizarNumAlunos() {
            var numAlunos = document.getElementById("outrosAlunos").childElementCount;
            document.getElementById("numAlunos").value = numAlunos;
        }
    </script>
    </section>
<section data-bs-version="5.1" class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-i">

    

    

<div class="container">
    <div class="media-container-row align-center mbr-white">
        <div class="row row-links">
            <ul class="foot-menu">
                
                
                
                
                
            <li class="foot-menu-item mbr-fonts-style display-7">Email</li><li class="foot-menu-item mbr-fonts-style display-7">Instagram</li><li class="foot-menu-item mbr-fonts-style display-7">Facebook</li></ul>
        </div>
        <div class="row social-row">
            <div class="social-list align-right pb-2">
                
                
                
                
                
                
            <div class="soc-item">
                    <a href="http://seidmanninstitute.com/" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social mobi-mbri-arrow-next mobi-mbri"></span>
                    </a>
                </div><div class="soc-item">
                    <a href="https://www.facebook.com/Seidmanninstitute" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                    </a>
                </div><div class="soc-item">
                    <a href="https://www.youtube.com/channel/UCrVxXG9Z2TqdokA7ST91bcA" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon"></span>
                    </a>
                </div><div class="soc-item">
                    <a href="https://www.instagram.com/seidmann_institute/" target="_blank">
                        <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                    </a>
                </div></div>
        </div>
        <div class="row row-copirayt">
            <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                © Seidmann Institute All Rights Reserved.
            </p>
        </div>
    </div>
</div>
</section><section class="display-7" ><p hidden href="https://mobiri.se/2782058" ></a><p hidden> &#8204;</p><a  href="https://mobirise.com/offline-website-builder.html"></a></section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/embla/embla.min.js"></script>  <script src="assets/embla/script.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/theme/js/script.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>  

</body>
</html>
