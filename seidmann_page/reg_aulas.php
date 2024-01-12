<!DOCTYPE html>
<html>
<?php
include('header.php'); // Inclui o cabeçalho
?>

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



        <select name="aluno" id="aluno" class="form-select bg-light" onchange="buscarEmail(0)" required>
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
                     $alunos[$nomeAluno] = $emailAluno;
                 }

                 // Ordenar o array de nomes
                 ksort($alunos);

                 // Exibir os nomes na opção
                 $contador = 1;
                 foreach ($alunos as $nomeAluno => $emailAluno) {
                     echo "<option value='$nomeAluno'>$contador. $nomeAluno</option>";
                     $contador++;
                 }
                 ?>
        </select>





        </div>

                <div class="col-md-4 ">
        <label for="email">Email:</label>
        <p></p>
        <input type="email" name="email" id="email" class="form-control bg-light" readonly >
        <br><br>
        </div>

        <div class="col-md-6 ">
        <div id="outrosAlunos"></div>
            
        <input type="hidden" id="numAlunos" value="0" class="form-select bg-light">

       <p></p>

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
        <select name="informacoesAula" id="informacoesAula" class="form-select bg-light" required>
            <option value="realizada">Realizada</option>
            <option value="Membro do Grupo não compareceu">Membro do Grupo não compareceu </option>
            <option value="Ausente">Ausente</option>
            <option value="reposicao">Reposição Feita</option>
            <option value="Inicial">Inicial</option>
        </select>
              </div>

            <div class="col-md-4 ">
            <label for="tipoAula">Tipo de Aula:</label>
            <p></p>
            <p></p>
        <select name="tipoAula" id="tipoAula" class="form-select bg-light" >
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
        <input type="date" name="dataAula" id="dataAula" class="form-control bg-light" required>
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
        <input type="text" name="livro" id="livro" class="form-control bg-light" required>
        <br><br>
        </div>
            <div class="col-md-4 ">          
        <label for="teacher">Nome do Teacher:</label>
        <p></p>
        <input type="text" name="teacher" id="teacher" class="form-control bg-light" required>
        <br><br>

        </div>        
      </div>

      <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="ultimaPagina">Última Página Trabalhada:</label>
        <h6>Se for Free Talk escreva free talk: </h6>
        <input type="text" name="ultimaPagina" id="ultimaPagina" class="form-control bg-light" required>
        <br><br>
        </div>
            <div class="col-md-4 ">    
        <label for="ultimaAtividade">Última Atividade Trabalhada:</label>
        <h6>Se for Free Talk escreva free talk: </h6>
        <input type="text" name="ultimaAtividade" id="ultimaAtividade" class="form-control bg-light" required>
        <br><br>
        </div>        
      </div>

      <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="freeTalkTrabalhado">Free Talk Trabalhado:</label>
        <h6>Coloque o link da atividade ou escreva o titulo do texto </h6>
        <input type="text" name="freeTalkTrabalhado" id="freeTalkTrabalhado" class="form-control bg-light" required>
        <br><br>
        </div>
            <div class="col-md-4 ">   
        <label for="homeWork">Home Work:</label>
        <h6>Descrever Claramente o HW </h6>
        <input type="text" name="homeWork" id="homeWork" class="form-control bg-light" required>
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
        <label for="obs">OBS:</label>
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
            alunoContainer.className = "aluno-container  input-group col-md-30 fw-semibold ";

            var novoAlunoSelect = document.createElement("select");
            novoAlunoSelect.name = "outroAlunoNome[]";
            novoAlunoSelect.className = "aluno-select form-select bg-light";
            novoAlunoSelect.innerHTML = document.getElementById("aluno").innerHTML;

            var novoEmailInput = document.createElement("input");
            novoEmailInput.type = "email";
            novoEmailInput.name = "outroAlunoEmail[]";
            novoEmailInput.placeholder = "Email do Aluno";
            novoEmailInput.className = "email-input form-select bg-light";

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
    <?php
include('footer.php'); // Inclui o rodapé
?>
</body>
</html>
