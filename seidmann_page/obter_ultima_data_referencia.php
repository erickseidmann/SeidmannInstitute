<?php
// obter.php

// Conexão com o banco de dados (supondo que você já tenha essa parte configurada)
require_once "config.php";

// Consulta para obter a última informação salva em "DataReferencia"
$sql = "SELECT `data` FROM `DataReferencia` ORDER BY `ID` DESC LIMIT 1";
$result = mysqli_query($conexao, $sql);

if ($result) {
    // Se a consulta for bem-sucedida
    $row = mysqli_fetch_assoc($result);
    $ultimaDataReferencia = $row['data'];
    echo $ultimaDataReferencia;
} else {
    // Se houver um erro na consulta
    echo "Erro ao obter a última DataReferencia do banco de dados";
}
?>