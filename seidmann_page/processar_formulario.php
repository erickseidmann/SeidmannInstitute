<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Função para converter array em string
function arrayToString($value) {
    if (is_array($value)) {
        return implode(", ", $value);
    }
    return $value;
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Percorre todas as variáveis do formulário e as converte em strings
    foreach ($_POST as $key => $value) {
        $_POST[$key] = arrayToString($value);
    }

    // Recupera os dados do formulário
    $numero_matricula = $_POST["numero_matricula"];
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
    $sql = "INSERT INTO formulario ( nome_completo, nome_responsavel, cpf, telefone, data_nascimento, email, cep, logradouro, cidade, estado, bairro, numero, complemento, valor_combinado, termos_condicoes, cancelamento_curso, ferias, opcao_livro, material, dia_pagamento, lembrete, opcao_pagamento, frequencia_aulas, melhores_horarios, dia_semana, nome_vendedor, numero_matricula)
            VALUES ( '$nome_completo', '$nome_responsavel', '$cpf', '$telefone', '$data_nascimento', '$email', '$cep', '$logradouro', '$cidade', '$estado', '$bairro', '$numero', '$complemento', '$valor_combinado', '$termos_condicoes', '$cancelamento_curso', '$ferias', '$opcao_livro', '$material', '$dia_pagamento', '$lembrete', '$opcao_pagamento', '$frequencia_aulas', '$melhores_horarios', '$dia_semana', '$nome_vendedor', '$numero_matricula')";

//    if ($conn->query($sql) === TRUE) {
//        echo " Matrícula realizada com sucesso!";
//    } else {
//        echo "Erro ao enviar o formulário: " . $conn->error;
//    }
//
//    // Fecha a conexão com o banco de dados
//    $conn->close();
//}
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Configurações do servidor de e-mail
    $mail->isSMTP();
    $mail->Host       = 'mail.seidmanninstitute.com'; // Insira o host do servidor de e-mail
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gestao@seidmanninstitute.com'; // Insira o e-mail do remetente
    $mail->Password   = '37216744*CaCo'; // Insira a senha do remetente
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Remetente e destinatário
    $mail->setFrom('seidmanninstitute@seidmanninstitute.com.br', 'Gestão de Aulas'); // Insira o e-mail e nome do remetente
    $mail->addAddress($email); // Utiliza o e-mail do usuário matriculado como o endereço de e-mail do destinatário
    $mail->addAddress('seidmanninstitute@seidmanninstitute.com.br'); // Adiciona o endereço de e-mail para a cópia do e-mail

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Sua Matricula Seidmann'; // Assunto do e-mail

    // Corpo do e-mail (conteúdo do formulário)
    $body = "
        <h2>Dados da Matricula</h2>
        <p> A equipe Seidmann, sente muita alegria e satisfação por ter você estudando, 
        crescendo e aprendendo conosco e queremos que saiba que estaremos dando nosso melhor 
        para ajudar você a realizar seus sonhos e suas metas de aprender um novo idioma. 
        E para melhor atender nossos alunos(as), segue alguns importantes tópicos e regras 
        sobre pagamentos e cancelamentos de aulas, por favor caso tenha qualquer dúvida entrar em contato com a escola. 
        Att. Equipe Seidmann </p>
        <p>Nome Completo: $nome_completo</p>
        <p>Matricula: $numero_matricula</p>
        <h5>Dia do pagamento: Todos os pagamentos devem ser realizados até o dia acordado pelo aluno e o professor, caso caia em fim de semana ou feriado, devera ser feito no próximo dia.
            Valores para cursos individuais: Valor hora/aula R$ 65,00; Valor, mensalidade para 1 h semanal R$ 260,00; Valor, mensalidade para 2 hs semanal R$ 500,00; valor, mensalidade para 2,5hs semanal R$ 600,00. Para cursos em grupos: Valor mensalidade para 2 hs semanal R$ 230,00 Valor, mensalidade para 2,5hs semanal R$ 280,00 POR integrante.
            **VALORES DE COMBOS DEVEM SER ESPECIFICADOS***
            Caso o aluno(a) não notifique a escola do atraso do pagamento, o aluno(a) fica sujeito a perca de descontos na mensalidade, ou seja, é cobrado a mensalidade sem descontos.</h5>
        <p>CPF: $cpf</p>
        <p>Telefone: $telefone</p>
        <p>E-mail: $email</p>
        <p>Endereço: $logradouro, $numero, $bairro, $cidade - $estado</p>
        <!-- Insira os demais campos do formulário aqui -->
    ";

    $mail->Body = $body;

    // Envio do e-mail
    if ($mail->send()) {
        echo "Matrícula realizada com sucesso! Um e-mail com os dados do formulário foi enviado.";
    } else {
        echo "Erro ao enviar o e-mail: " . $mail->ErrorInfo;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}

?>
