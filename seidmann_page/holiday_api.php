<?php
// Conectar ao banco de dados (substitua os valores pelos seus próprios)
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root123';
$db_name = 'cadastroaluno';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die('Erro de conexão com o banco de dados: ' . $conn->connect_error);
}

// Endpoint para adicionar feriado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['name'];
    $day = $data['day'];
    $month = $data['month'];

    $sql = "INSERT INTO holidays (name, day, month) VALUES ('$name', $day, $month)";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
}

// Endpoint para excluir feriado
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'];

    $sql = "DELETE FROM holidays WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
