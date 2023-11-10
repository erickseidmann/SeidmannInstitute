<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendário Semanal</title>
  <!-- Adicione os links para os estilos do Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .vertical-header {
      writing-mode: vertical-lr;
      text-orientation: mixed;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <!-- Abas para as semanas -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#semana1">Semana 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#semana2">Semana 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#semana3">Semana 3</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#semana4">Semana 4</a>
    </li>
  </ul>

  <!-- Conteúdo das abas -->
  <div class="tab-content mt-3">
    <div class="tab-pane fade show active" id="semana1">
      <!-- Tabela para exibir os dias da semana e horas -->
      <table class="table">
        <thead>
          <tr>
            <th>Dia</th>
            <th class="vertical-header">6:00 am</th>
            <th class="vertical-header">8:00 am</th>
            <th class="vertical-header">10:00 am</th>
            <th class="vertical-header">12:00 pm</th>
            <th class="vertical-header">2:00 pm</th>
            <th class="vertical-header">4:00 pm</th>
            <th class="vertical-header">6:00 pm</th>
            <th class="vertical-header">8:00 pm</th>
            <th class="vertical-header">10:00 pm</th>
            <!-- Adicione mais colunas conforme necessário -->
          </tr>
        </thead>
        <tbody>
          <!-- Adicione linhas para cada dia da semana com intervalos de 30 minutos -->
          <!-- Por exemplo: -->
          <tr>
            <td>Segunda-feira</td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
          </tr>
          <tr>
            <td>Terça-feira</td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
          </tr>
          <tr>
            <td>Quarta-feira</td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
          </tr>
          <tr>
            <td>Quinta-feira</td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
          </tr>
          <tr>
            <td>Sexta-feira</td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
          </tr>
          <tr>
            <td>Sábado</td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
          </tr>
          <tr>
            <td>Domingo</td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
          </tr>
          <!-- Adicione mais linhas conforme necessário -->
        </tbody>
      </table>
    </div>
    <!-- Adicione mais abas conforme necessário -->
  </div>
</div>

<!-- Adicione os scripts do Bootstrap e do jQuery para funcionalidades interativas -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
