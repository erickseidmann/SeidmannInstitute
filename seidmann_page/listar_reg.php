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

<?php
include('header.php'); // Inclui o cabeçalho
?>
<body>

</section>
<section data-bs-version="5.1" class="features3 cid-tkzhgIxW41" id="features3-u">
    <div class="container">
        <div class="row input-group col-md-6 fw-semibold">
            <h1 class="text-center">Registro de Aulas</h1>
            <p></p>

            <div class="row input-group col-md-6 fw-semibold ">
            <div class="col-md-4 ">
            <label for="searchAluno">Pesquisar Aluno:</label>
            <input type="text" id="searchAluno">

            </div>
            <div class="col-md-3 ">
            <!-- Filtro por Data (Mais novo / Mais antigo) -->
            <label for="ordenarData">Ordenar/Data:</label>
            <select id="ordenarData">
                <option value="desc">Mais novo primeiro</option>
                <option value="asc">Mais antigo primeiro</option>
            </select>
            </div>
            <div class="col-md-3 ">

                        <!-- Filtro por Aluno (A-Z / Z-A) -->
            <label for="ordenarAluno">Ordenar por Aluno:</label>
            <select id="ordenarAluno">
                <option value="asc">A-Z</option>
                <option value="desc">Z-A</option>
            </select>
            </div>
            <div class="col-md-2">
                 <button class="btn btn-success" id="exportToExcel">Exportar</button>
            </div>
            </div>


            <p></p>


            <!-- Corpo rolável da tabela -->
            <div style="max-height: 400px; overflow-y: scroll;">
            <table border="1" class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th>Aluno</th>
                        <th>Info da Aula</th>
                        <th>Teacher</th>
                        <th>Data da Aula</th>
                        <th>Tipo de Aula</th>
                        <th>Livro/Book</th>
                        <th>Ultima Pagina feita</th>
                        <th>Ultima Atividade feita</th>
                        <th>HOMEWORK</th>
                        <th>Obs</th>
                        <th>obsPais</th>
                        <th>APAGAR</th>

                    </tr>
                </thead>
            </table>
                <table border="1" class="table table-bordered border-primary">
                    <tbody>
                        <?php
                        // Loop através dos registros e exibir na tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            $class = ($row['informacoes_aula'] == 'Ausente') ? 'ausente' : '';
                            echo "<tr class='$class'>";
                            echo "<td class='aluno'>" . $row['aluno_principal'] . "</td>";
                            echo "<td class='informacoes'>" . $row['informacoes_aula'] . "</td>";
                            echo "<td class='teacher'>" . $row['teacher'] . "</td>";
                            echo "<td class='data'>" . $row['data_aula'] . "</td>";
                            echo "<td>" . $row['tipo_aula'] . "</td>";
                            echo "<td>" . $row['livro'] . "</td>";
                            echo "<td>" . $row['ultima_pagina_trabalhada'] . "</td>";
                            echo "<td class='expandable'>" . $row['ultima_atividade_trabalhada'] . "</td>";
                            echo "<td class='expandable'>" . $row['home_work'] . "</td>";
                            echo "<td class='expandable'>" . $row['obs'] . "</td>";
                            echo "<td class='expandable'>" . $row['obsPais'] . "</td>";
                            // Dentro do loop que exibe os registros
                            
                            echo "<td><a href='#' class='excluir-btn' data-id='" . $row['id'] . "'>Apagar</a></td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php'); // Inclui o rodapé
?>
<section class="display-7" ><p hidden href="https://mobiri.se/2782058" ></a><p hidden> &#8204;</p><a  href="https://mobirise.com/offline-website-builder.html"></a></section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/embla/embla.min.js"></script>  <script src="assets/embla/script.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/theme/js/script.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>  

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
  <script src="//http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/jquery.mask.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/additional-methods.js"></script>
  <script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#ordenarAluno").change(function () {
            var order = $(this).val();
            sortTable("aluno", order);
        });

        $("#ordenarData").change(function () {
            var order = $(this).val();
            sortTable("data", order);
        });

        $("#searchAluno").on("keyup", function () {
            var input = $(this).val().toLowerCase();
            searchTable("aluno", input);
        });

        function sortTable(column, order) {
            var rows = $("table tbody tr").get();

            rows.sort(function (a, b) {
                var aValue = $(a).find("td." + column).text();
                var bValue = $(b).find("td." + column).text();

                if (order === "asc") {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            });

            $.each(rows, function (index, row) {
                $("table tbody").append(row);
            });
        }

        function searchTable(column, input) {
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).find("td." + column).text().toLowerCase().indexOf(input) > -1);
            });
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
  $(document).ready(function() {
    // Função para exportar os dados de registro de aula em formato Excel
    $("#exportToExcel").on("click", function() {
      // Consulta todos os registros de aula na tabela "registros_aulas"
      $.ajax({
        url: "exportar_dados_registros_aulas.php", // Crie um novo arquivo PHP para gerar o arquivo Excel
        type: "GET",
        dataType: "json",
        success: function(data) {
          // Chamada de função para gerar o arquivo Excel com os dados recebidos
          gerarExcel(data);
        },
        error: function() {
          alert("Erro ao exportar os dados em Excel.");
        }
      });
    });

    // Função para gerar o arquivo Excel com os dados de registro de aula
    function gerarExcel(data) {
      const workSheet = XLSX.utils.json_to_sheet(data);
      const workBook = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(workBook, workSheet, "Registros Aulas");

      // Cria o nome do arquivo com a data atual
      const date = new Date();
      const fileName = "registros_aulas_" + date.toISOString().slice(0, 10) + ".xlsx";

      // Salva o arquivo Excel e faz o download
      XLSX.writeFile(workBook, fileName);
    }
     // Adicione um evento de clique às células que deseja expandir
     $(".table-bordered td.expandable").click(function () {
         if ($(this).hasClass("expanded")) {
             // Se a célula estiver expandida, retorna ao tamanho normal
             $(this).removeClass("expanded");
             $(this).css("max-width", "150px"); // Ajuste o tamanho máximo conforme necessário
         } else {
             // Se a célula não estiver expandida, expande para mostrar todo o conteúdo
             $(this).addClass("expanded");
             $(this).css("max-width", "none");
         }
     });
  });
</script>
<script>
    $(document).ready(function () {
        // Função para verificar a senha antes de excluir um registro
        function verificarSenha(id) {
            var senha = prompt("Digite a senha para confirmar a exclusão:");
            if (senha === "seidmann@123") {
                window.location.href = 'excluir_registro.php?id=' + id;
            } else {
                alert("Senha incorreta. A exclusão não foi realizada.");
            }
        }

        // Adicionar evento de clique ao botão de exclusão
        $(".excluir-btn").click(function () {
            var id = $(this).data('id');
            verificarSenha(id);
        });
    });
</script>



</body>
</html>
