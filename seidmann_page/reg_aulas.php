<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Aulas</title>
</head>

<body>
    <h2>Registros de Aulas</h2>
    <form action="processar_formulario.php" method="post">
        <label for="aluno">Nome do Aluno:</label>
        <select name="aluno" id="aluno" onchange="buscarEmail()">
            <option value="">Selecione um aluno</option>
            <!-- Aqui você pode popular a lista com os nomes dos alunos da tabela "formulario" -->
            <option value="NomeAluno1">Nome Aluno 1</option>
            <option value="NomeAluno2">Nome Aluno 2</option>
            <!-- Adicione mais opções de alunos conforme necessário -->
        </select>
        <button type="button" onclick="adicionarAluno()">Adicionar Aluno</button>
        <br><br>

        <!-- Container para adicionar outros alunos, caso a aula seja em grupo -->
        <div id="outrosAlunos"></div>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" readonly>
        <br><br>

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
        // Função para buscar o email do aluno selecionado
        function buscarEmail() {
            var alunoSelect = document.getElementById("aluno");
            var emailInput = document.getElementById("email");
            // Aqui você deve fazer a lógica para buscar o email do aluno selecionado na tabela "formulario"
            // Por exemplo, você pode usar uma requisição AJAX para buscar o email do aluno no backend e preencher o campo "emailInput" com o valor retornado.
        }

        // Função para adicionar outro aluno (caso a aula seja em grupo)
        function adicionarAluno() {
            var outrosAlunosDiv = document.getElementById("outrosAlunos");
            var novoAlunoSelect = document.createElement("select");
            novoAlunoSelect.name = "outroAluno[]";
            novoAlunoSelect.innerHTML = document.getElementById("aluno").innerHTML;
            var removerAlunoButton = document.createElement("button");
            removerAlunoButton.type = "button";
            removerAlunoButton.textContent = "Remover Aluno";
            removerAlunoButton.onclick = function () {
                outrosAlunosDiv.removeChild(novoAlunoSelect);
                outrosAlunosDiv.removeChild(removerAlunoButton);
            };
            outrosAlunosDiv.appendChild(novoAlunoSelect);
            outrosAlunosDiv.appendChild(removerAlunoButton);
        }
    </script>
</body>

</html>
