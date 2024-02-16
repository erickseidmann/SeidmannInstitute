// script.js

// Capturar o botão "Grupo"
var btnGrupo = document.getElementById('mostrar-grupo');

// Capturar as divs que contém as informações dos alunos 2, 3, 4 e 5
var divsAlunos = document.querySelectorAll('.aluno-info');

// Adicionar um evento de clique ao botão "Grupo"
btnGrupo.addEventListener('click', function() {
    // Iterar sobre as divs das informações dos alunos 2, 3, 4 e 5
    divsAlunos.forEach(function(div) {
        // Alternar a exibição das divs
        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    });
})