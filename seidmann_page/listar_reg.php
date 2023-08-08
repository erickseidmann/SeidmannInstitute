<?php
require_once "config.php";

// Consulta para buscar todos os registros
$query = "SELECT * FROM registros_aulas";
$result = mysqli_query($conn, $query);

// Verifica se houve erro na consulta
if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<head>
    <!-- ... Seu código de cabeçalho ... -->
    <style>
        .ausente {
            background-color: lightcoral;
        }
    </style>
</head>
</head>
<body>
    <h1>Lista de Registros</h1>
    <table border="1">
        <tr>
            <th>Aluno</th>
            <th>Informações da Aula</th>
            <th>Data da Aula</th>
            <th>Tipo de Aula</th>
            <th>Livro/Book</th>
            <th>Ultima Pagina Trabalhada</th>
            <th> Ultima Atividade Trabalhada</th>
            
            <th>Ações</th>
        </tr>
        <?php
        // Loop através dos registros e exibir na tabela
        while ($row = mysqli_fetch_assoc($result)) {
            $class = ($row['informacoes_aula'] == 'ausente') ? 'ausente' : '';
            echo "<tr class='$class'>";
            echo "<td>" . $row['aluno_principal'] . "</td>";
            echo "<td>" . $row['informacoes_aula'] . "</td>";
            echo "<td>" . $row['data_aula'] . "</td>";
            echo "<td>" . $row['tipo_aula'] . "</td>";
            echo "<td>" . $row['livro'] . "</td>";
            echo "<td>" . $row['ultima_pagina_trabalhada'] . "</td>";
            echo "<td>" . $row['ultima_atividade_trabalhada'] . "</td>";
            echo "<td>
                      <a href='editar_registro.php?id=" . $row['id'] . "'>Editar</a>
                      <a href='apagar_registro.php?id=" . $row['id'] . "'>Apagar</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
