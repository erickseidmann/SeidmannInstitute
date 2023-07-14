<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
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

    // Insira os dados no banco de dados
    $sql = "INSERT INTO formulario (nome_completo, nome_responsavel, cpf, telefone, data_nascimento, email, cep, logradouro, cidade, estado, bairro, numero, complemento, valor_combinado, termos_condicoes, cancelamento_curso, ferias, opcao_livro, material, dia_pagamento, lembrete, opcao_pagamento, frequencia_aulas, melhores_horarios, dia_semana, nome_vendedor)
            VALUES ('$nome_completo', '$nome_responsavel', '$cpf', '$telefone', '$data_nascimento', '$email', '$cep', '$logradouro', '$cidade', '$estado', '$bairro', '$numero', '$complemento', '$valor_combinado', '$termos_condicoes', '$cancelamento_curso', '$ferias', '$opcao_livro', '$material', '$dia_pagamento', '$lembrete', '$opcao_pagamento', '$frequencia_aulas', '$melhores_horarios', '$dia_semana', '$nome_vendedor')";

    if ($conn->query($sql) === TRUE) {
        echo "Formulário enviado com sucesso!";
    } else {
        echo "Erro ao enviar o formulário: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
