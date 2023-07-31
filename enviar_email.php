<?php
require_once "config.php"; // Inclua o arquivo de configuração do banco de dados

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (Seu código existente para inserir dados no banco de dados)

    // Recupera o e-mail do destinatário do banco de dados
    $sql_destinatario = "SELECT email FROM formulario WHERE id = 1"; // Substitua "formulario" pelo nome correto da tabela e "id = 1" pela condição que identifica o destinatário
    $result_destinatario = $conn->query($sql_destinatario);

    if ($result_destinatario->num_rows > 0) {
        $row_destinatario = $result_destinatario->fetch_assoc();
        $destinatario_email = $row_destinatario["email"];

        // Enviar e-mail com os dados do formulário
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Configurações do servidor de e-mail
        $mail->isSMTP();
        $mail->Host       = 'ns1.innserver12.net'; // Insira o host do servidor de e-mail
        $mail->SMTPAuth   = true;
        $mail->Username   = 'seidmanninstitute@seidmanninstitute.com.br'; // Insira o e-mail do remetente
        $mail->Password   = '37216744'; // Insira a senha do remetente
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remetente e destinatário
        $mail->setFrom('seidmanninstitute@seidmanninstitute.com.br', 'Gestão de Aulas'); // Insira o e-mail e nome do remetente
        $mail->addAddress($destinatario_email); // Utiliza o e-mail do destinatário do banco de dados como o endereço de e-mail do destinatário
        $mail->addAddress('seidmanninstitute@seidmanninstitute.com.br'); // Adiciona o endereço de e-mail para a cópia do e-mail

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Sua Matricula Seidmann'; // Assunto do e-mail

        // Corpo do e-mail (conteúdo do formulário)
        $body = "
            <h2>Dados do Formulário de Cadastro</h2>
            <p>Nome Completo: $nome_completo</p>
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
    } else {
        echo "E-mail do destinatário não encontrado no banco de dados.";
    }
}
?>
