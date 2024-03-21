<?php
// Conexão com o banco de dados (substitua os valores conforme necessário)
require_once "config.php";

// Obtém a data de referência do formulário
$dataReferencia = $_POST['dataReferencia'];

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Prepara a declaração SQL para inserir os dados na tabela
$sql = "INSERT INTO DataReferencia (data) VALUES (?)";

// Prepara a declaração
$stmt = $conn->prepare($sql);

// Vincula os parâmetros
$stmt->bind_param("s", $dataReferencia);

// Executa a declaração
if ($stmt->execute()) {
    echo "Data de referência salva com sucesso!";
} else {
    echo "Erro ao salvar a data de referência: " . $conn->error;
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>
