<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        form {
            margin-top: 20px;
        }

        .btn-salvar {
            background-color: #4CAF50;
            color: white;
            padding: 8px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        select {
            width: 100%;
            padding: 6px;
        }

        .linha-pausada {
            background-color: lightblue;
        }
        .linha-cancelada {
            background-color: #FFC0CB; /* Cor de fundo rosa para linhas canceladas */
        }
    </style>
</head>
<body>

<?php
require_once "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// ... (código PHP para processar o formulário)

// Exibe a tabela
$sql_select = "SELECT numero_matricula, nome_completo, nome_responsavel, cpf, data_nascimento, 
               frequencia_aulas, valor_combinado, DAY(dia_pagamento) AS dia_pagamento, 
               lembrete, Banco, status_pag 
        FROM formulario";

$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Número Matrícula</th>
                <th>Nome Completo</th>
                <th>Nome Responsável</th>
                <th>CPF</th>
                <th>Data Nascimento</th>
                <th>Frequência de Aulas</th>
                <th>Valor Combinado</th>
                <th>Dia Pagamento</th>
                <th>Lembrete</th>
                <th>Banco</th>
                <th>Status Pagamento</th>
                <th>Ação</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $linhaClass = '';

        if ($row['status_pag'] === 'pausado') {
            $linhaClass = 'linha-pausada';
        } elseif ($row['status_pag'] === 'cancelado') {
            $linhaClass = 'linha-cancelada';
        }

        echo "<tr class='$linhaClass'>
                <td>{$row['numero_matricula']}</td>
                <td>{$row['nome_completo']}</td>
                <td>{$row['nome_responsavel']}</td>
                <td>{$row['cpf']}</td>
                <td>{$row['data_nascimento']}</td>
                <td>{$row['frequencia_aulas']}</td>
                <td>{$row['valor_combinado']}</td>
                <td>{$row['dia_pagamento']}</td>
                <td>{$row['lembrete']}</td>
                <td class='highlightable' onclick='startEditing(this)'>{$row['Banco']}</td>
                <td class='highlightable' onclick='startEditingSelect(this)'>{$row['status_pag']}</td>
                <td><button class='btn-salvar' onclick='salvarRegistro({$row['numero_matricula']})'>Salvar</button></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();

?>

<!-- ... (código HTML do formulário) -->

<script>
    function salvarRegistro(numeroMatricula) {
        alert("Registro com Número de Matrícula " + numeroMatricula + " salvo com sucesso!");
    }

    function startEditing(cell) {
        // Salva o conteúdo original da célula
        cell.setAttribute('data-original-content', cell.innerText);

        // Entra no modo de edição
        cell.contentEditable = true;
        cell.classList.add('edit-mode');
        cell.focus();
        cell.addEventListener('blur', function () {
            // Sai do modo de edição e restaura o conteúdo original
            cell.contentEditable = false;
            cell.classList.remove('edit-mode');
            if (cell.innerText.trim() === "") {
                // Se o conteúdo for vazio, restaura o conteúdo original
                cell.innerText = cell.getAttribute('data-original-content');
            }
        });
    }

    function startEditingSelect(cell) {
        // Salva o conteúdo original da célula
        cell.setAttribute('data-original-content', cell.innerText);

        // Cria um menu suspenso
        const select = document.createElement('select');
        select.innerHTML = `
            <option value="ativo">Ativo</option>
            <option value="cancelado">Cancelado</option>
            <option value="pausado">Pausado</option>
        `;

        // Seleciona a opção atual
        select.value = cell.innerText;

        // Substitui a célula pelo menu suspenso
        cell.innerHTML = '';
        cell.appendChild(select);

        // Foca no menu suspenso
        select.focus();

        // Adiciona um evento para salvar a seleção ao perder o foco
        select.addEventListener('change', function () {
            cell.innerHTML = select.value;
            // Atualiza a classe da linha se for 'pausado' ou 'cancelado'
            const row = cell.parentElement;
            row.classList.toggle('linha-pausada', select.value === 'pausado');
            row.classList.toggle('linha-cancelada', select.value === 'cancelado');
        });

        // Adiciona um evento para impedir o fechamento ao clicar no menu suspenso
        select.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    }
</script>

</body>
</html>
