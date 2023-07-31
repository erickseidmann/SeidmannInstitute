<?php
// Inclua o arquivo de configuração do banco de dados
require_once "config.php";

// Consulta todos os alunos na tabela "formulario"
$sql = "SELECT *, TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) AS idade FROM formulario";
$result = $conn->query($sql);

// Array para armazenar os dados dos alunos
$data = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Adiciona os dados do aluno ao array
    $data[] = array(
      "numero_matricula" => $row["numero_matricula"],
      "Nome" => $row["nome_completo"],
      "nome_responsavel" => $row["nome_responsavel"] . "nome_responsavel",
      "Data de Registro" => date("d/m/Y", strtotime($row["data_registro"])),
      "data_nascimento" => date("d/m/Y", strtotime($row["data_nascimento"])),
      "Idade" => $row["idade"] . " anos",
      "telefone" => $row["telefone"],
      "cpf" => $row["cpf"],
      "email" => $row["email"],    
      "cep" => $row["cep"],
      "logradouro" => $row["logradouro"] ,
      "cidade" => $row["cidade"],      
      "estado" => $row["estado"] ,
      "bairro" => $row["bairro"],
      "numero" => $row["numero"] ,
      "complemento" => $row["complemento"] ,
      "valor_combinado" => $row["valor_combinado"] ,   
      "opcao_livro" => $row["opcao_livro"] ,
      "material" => $row["material"] ,
      "dia_pagamento" => date("d/m/Y", strtotime($row["dia_pagamento"])),
      "lembrete"=> $row["lembrete"] ,
      "opcao_pagamento" => $row["opcao_pagamento"] ,
      "frequencia_aulas" => $row["frequencia_aulas"] ,
      "melhores_horarios" => $row["melhores_horarios"] , 
      "dia_semana" => $row["dia_semana"] ,      
      "nome_vendedor" => $row["nome_vendedor"] ,
      "Status" => $row["status"] == 1 ? "Ativo" : "Inativo"
    );
  }
}

// Fecha a conexão com o banco de dados
$conn->close();

// Define o cabeçalho da resposta como JSON
header("Content-type: application/json");

// Retorna os dados dos alunos como JSON
echo json_encode($data);
?>
