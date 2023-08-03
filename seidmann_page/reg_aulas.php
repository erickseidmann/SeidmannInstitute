<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Aulas</title>
    <style>
        .aluno-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .aluno-select {
            flex: 1;
        }

        .remover-aluno-button {
            margin-left: 10px;
        }

        .aluno-nome {
            display: none;
        }
    </style>
</head>

<body>
    <h2>Registros de Aulas</h2>
    <form action="processar_formulario.php" method="post">

        <!-- Nome do aluno selecionado após adicionar -->
        <div id="alunoSelecionado" class="aluno-nome"></div>

        <!-- Primeiro select oculto -->
        <label for="aluno">Nome do Aluno:</label>
        <select name="aluno" id="aluno" onchange="buscarEmail(0)">
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


        <label for="email">Email:</label>
        <input type="email" name="email" id="email" readonly>
        <br><br>

        <button type="button" onclick="adicionarAluno()">Adicionar Aluno</button>
        <br><br>

        <!-- Container para adicionar outros alunos, caso a aula seja em grupo -->
        <div id="outrosAlunos"></div>

        <input type="hidden" id="numAlunos" value="0">


        <label for="informacoesAula">Informações da Aula:</label>
        <select name="informacoesAula" id="informacoesAula">
            <option value="realizada">Realizada</option>
            <option value="naoCompareceu">Aluno Não Compareceu</option>
            <option value="reposicao">Reposição Feita</option>
        </select>
        <br><br>

        <label for="teacher">Nome do Teacher:</label>
        <input type="text" name="teacher" id="teacher">
        <br><br>

        <label for="dataAula">Data da Aula:</label>
        <input type="date" name="dataAula" id="dataAula">
        <br><br>

        <label for="curso">Curso:</label>
        <select name="curso" id="curso">
            <option value="ingles">Inglês</option>
            <option value="espanhol">Espanhol</option>
        </select>
        <br><br>

        <label for="livro">Livro:</label>
        <input type="text" name="livro" id="livro">
        <br><br>

        <label for="tipoAula">Tipo de Aula:</label>
        <select name="tipoAula" id="tipoAula">
            <option value="class">Class</option>
            <option value="freeTalk">Free Talk</option>
        </select>
        <br><br>

        <label for="ultimaPagina">Última Página Trabalhada:</label>
        <input type="text" name="ultimaPagina" id="ultimaPagina">
        <br><br>

        <label for="ultimaAtividade">Última Atividade Trabalhada:</label>
        <input type="text" name="ultimaAtividade" id="ultimaAtividade">
        <br><br>

        <label for="freeTalkTrabalhado">Free Talk Trabalhado:</label>
        <input type="text" name="freeTalkTrabalhado" id="freeTalkTrabalhado">
        <br><br>

        <label for="homeWork">Home Work:</label>
        <input type="text" name="homeWork" id="homeWork">
        <br><br>

        <!-- OBS (only teachers can see) -->
        <label for="obs">OBS (Apenas para professores):</label>
        <textarea name="obs" id="obs" rows="4"></textarea>
        <br><br>

        <input type="submit" value="Enviar">
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
</body>

</html>
