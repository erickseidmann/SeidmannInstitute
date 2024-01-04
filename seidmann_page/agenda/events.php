<?php
// Simulando eventos, substitua por sua lógica real de obtenção de eventos
$events = array(
    array('title' => 'Aula de Inglês', 'start' => '2023-01-01'),
    array('title' => 'Aula de Português', 'start' => '2023-01-05'),
    array('title' => 'Aula de Espanhol', 'start' => '2023-01-10')
);

header('Content-Type: application/json');
echo json_encode($events);
?>
