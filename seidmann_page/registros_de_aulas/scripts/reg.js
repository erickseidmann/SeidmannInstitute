
// Armazenar os alunos e seus respectivos e-mails em um objeto JavaScript


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
