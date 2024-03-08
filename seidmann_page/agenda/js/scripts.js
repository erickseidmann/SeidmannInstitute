//week 1
$(document).ready(function() {
    // Função para exibir o modal quando os botões protegidos forem clicados
    $("#alterarBotao1").click(function() {
        // Verifica se a senha foi inserida corretamente
        var senhaCorreta = false;
        if (!senhaCorreta) {
            // Pede a senha ao usuário
            var password = prompt("Por favor, insira a senha:");

            // Verifica se a senha está correta
            if (password === "123") { // Substitua "sua_senha_aqui" pela senha correta
                // Define que a senha foi inserida corretamente
                senhaCorreta = true;
            } else {
                // Exibe uma mensagem de senha incorreta
                alert("Senha incorreta. Tente novamente.");
                return; // Interrompe a execução da função se a senha estiver incorreta
            }
        }

        // Se a senha estiver correta, pede a nova data e atualiza o título
        var novaData = prompt("Digite a nova data:");
        if (novaData !== null) {
            // Armazena a nova data no localStorage
            localStorage.setItem('novaData', novaData);

            var titulo1 = document.getElementById('titulo1');
            titulo1.textContent = "Data de ref  - " + novaData;
        }
    });

    // Recupera a nova data do localStorage quando a página é carregada
    var novaDataArmazenada = localStorage.getItem('novaData');
    if (novaDataArmazenada) {
        var titulo1 = document.getElementById('titulo1');
        titulo1.textContent = "Data de ref - " + novaDataArmazenada;
    }
});

//week 2
$(document).ready(function() {
    // Função para exibir o modal quando os botões protegidos forem clicados
    $("#alterarBotao2").click(function() {
        // Verifica se a senha foi inserida corretamente
        var senhaCorreta = false;
        if (!senhaCorreta) {
            // Pede a senha ao usuário
            var password = prompt("Por favor, insira a senha:");

            // Verifica se a senha está correta
            if (password === "123") { // Substitua "sua_senha_aqui" pela senha correta
                // Define que a senha foi inserida corretamente
                senhaCorreta = true;
            } else {
                // Exibe uma mensagem de senha incorreta
                alert("Senha incorreta. Tente novamente.");
                return; // Interrompe a execução da função se a senha estiver incorreta
            }
        }

        // Se a senha estiver correta, pede a nova data e atualiza o título
        var novaData2 = prompt("Digite a nova data:");
        if (novaData2 !== null) {
            // Armazena a nova data no localStorage
            localStorage.setItem('novaData2', novaData2);

            var titulo2 = document.getElementById('titulo2');
            titulo2.textContent = "Data de ref  - " + novaData2;
        }
    });

    // Recupera a nova data do localStorage quando a página é carregada
    var novaDataArmazenada2 = localStorage.getItem('novaData2');
    if (novaDataArmazenada2) {
        var titulo2 = document.getElementById('titulo2');
        titulo2.textContent = "Data de Ref. - " + novaDataArmazenada2;
    }
});


//coloca senha nos botões com a classe "protectedButton"
$(document).ready(function() {
    // Variável para controlar se a senha foi inserida corretamente
    var senhaCorreta = false;

    // Função para exibir o modal quando os botões protegidos forem clicados
    $(".protectedButton").click(function() {
        // Verifica se a senha foi inserida corretamente
        if (!senhaCorreta) {
            // Pede a senha ao usuário
            var password = prompt("Por favor, insira a senha:");

            // Verifica se a senha está correta
            if (password === "123") { // Substitua "sua_senha_aqui" pela senha correta
                // Define que a senha foi inserida corretamente
                senhaCorreta = true;

                // Executa a ação associada ao botão protegido
                $(this).trigger('click');
            } else {
                // Exibe uma mensagem de senha incorreta
                alert("Senha incorreta. Tente novamente.");
            }
        } else {
            // Executa a ação associada ao botão protegido se a senha já foi inserida corretamente anteriormente
            $(this).trigger('click');
        }
    });

});

document.addEventListener('DOMContentLoaded', function() {
    // Adicione um evento de clique para os botões do professor
    document.querySelectorAll('.openIframeButton').forEach(button => {
        button.addEventListener('click', function() {
            // Recupere a senha e o link associados a este professor
            const teacherDiv = this.parentNode;
            const password = teacherDiv.dataset.password;
            const link = teacherDiv.dataset.link;

            // Verifique a senha ou faça qualquer ação necessária
            const enteredPassword = prompt('Por favor, insira a senha:');
            if (enteredPassword === password) {
                // Se a senha estiver correta, abra o link associado a este professor
                window.open(link);
            } else {
                alert('Senha incorreta. Tente novamente.');
            }
        });
    });
});