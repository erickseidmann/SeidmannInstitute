<!-- salvar_edicao_aluno.php -->
<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";
// Inclua o arquivo de funções utilitárias
require_once "utils.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Percorre todas as variáveis do formulário e as converte em strings
    foreach ($_POST as $key => $value) {
        $_POST[$key] = arrayToString($value);
    }

    // Recupera o ID do aluno a ser atualizado
   

    // Recupera os dados do formulário
    $id = $_POST["id"];
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
    // ... (outras variáveis aqui)

    // Atualiza os dados no banco de dados
    $sql = "UPDATE formulario SET 
            
            nome_completo = '$nome_completo',
            nome_responsavel = '$nome_responsavel',
            cpf = '$cpf',
            telefone = '$telefone',
            data_nascimento = '$data_nascimento',
            email = '$email',
            cep = '$cep',
            logradouro = '$logradouro',
            cidade = '$cidade',
            estado = '$estado',
            bairro = '$bairro',
            numero = '$numero',
            complemento = '$complemento',
            valor_combinado = '$valor_combinado',
            termos_condicoes = '$termos_condicoes',
            cancelamento_curso = '$cancelamento_curso',

            opcao_livro = '$opcao_livro',
            material = '$material',
            dia_pagamento = '$dia_pagamento',
            lembrete = '$lembrete',
            opcao_pagamento = '$opcao_pagamento',
            frequencia_aulas = '$frequencia_aulas',
            melhores_horarios = '$melhores_horarios',
            dia_semana = '$dia_semana',
            nome_vendedor = '$nome_vendedor'

            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Dados do aluno atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados do aluno: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
