<!DOCTYPE html>
<html>
<?php
include('header.php'); // Inclui o cabeçalho
?>

<body>

<main>
<section id="formReg">
    
  
  <form id="form_reg" class="container" action="processar_registro.php" method="post">

        <h1>Registros de Aulas</h1>

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
        <select name="informacoesAula" id="informacoesAula" class="form-select bg-light">
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
        <input type="date" name="dataAula" id="dataAula" class="form-control bg-light" require>
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
        <input type="text" name="livro" id="livro" class="form-control bg-light" require>
        <br><br>
        </div>
            <div class="col-md-4 ">          
        <label for="teacher">Nome do Teacher:</label>
        <p></p>
        <input type="text" name="teacher" id="teacher" class="form-control bg-light" require>
        <br><br>

        </div>        
      </div>

      <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
        <label for="ultimaPagina">Última Página Trabalhada:</label>
        <h6>Se for Free Talk escreva free talk: </h6>
        <input type="text" name="ultimaPagina" id="ultimaPagina" class="form-control bg-light" require>
        <br><br>
        </div>
            <div class="col-md-4 ">    
        <label for="ultimaAtividade">Última Atividade Trabalhada:</label>
        <h6>Se for Free Talk escreva free talk: </h6>
        <input type="text" name="ultimaAtividade" id="ultimaAtividade" class="form-control bg-light" require>
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
        <input type="text" name="homeWork" id="homeWork" class="form-control bg-light" require>
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
    </form>

    <script>
        var alunosEEmails = <?php echo json_encode($alunos); ?>;
    </script>
    </section>


</main>
<script src="scripts/reg.js"></script>
</body>
</html>
