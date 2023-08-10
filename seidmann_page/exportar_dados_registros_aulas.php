<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Consulta todos os registros de aula na tabela "registros_aulas"
$sql = "SELECT * FROM registros_aulas";
$result = $conn->query($sql);

// Array para armazenar os dados dos registros de aula
$data = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Adiciona os dados do registro de aula ao array
    $data[] = array(
      "Aluno" => $row["aluno_principal"],
      "Informações da Aula" => $row["informacoes_aula"],
      "Data da Aula" => date("d/m/Y", strtotime($row["data_aula"])),
      "Tipo de Aula" => $row["tipo_aula"],
      "Livro/Book" => $row["livro"],
      "Última Página Trabalhada" => $row["ultima_pagina_trabalhada"],
      "Última Atividade Trabalhada" => $row["ultima_atividade_trabalhada"],
      "Observação Pais" => $row["obsPais"],
      "Observação" => $row["obs"]
    );
  }
}

// Fecha a conexão com o banco de dados
$conn->close();

// Define o cabeçalho da resposta como JSON
header("Content-type: application/json");

// Retorna os dados dos registros de aula como JSON
echo json_encode($data);
?>
