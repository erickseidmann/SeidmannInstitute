<!DOCTYPE html>
<?php
include('header.php'); // Inclui o cabeçalho
?>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-6">
        <?php
        // Verifica se o parâmetro de erro está presente na URL
        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
            if ($errorMessage === "sql_error") {
                $message = "Erro ao criar registro. Por favor, entre em contato com o suporte técnico.";
            } elseif ($errorMessage === "empty_name") {
                $message = "O nome do aluno está vazio. Por favor, preencha o nome do aluno e tente novamente.";
            } elseif ($errorMessage === "no_students") {
                $message = "Nenhum aluno foi enviado. Por favor, envie pelo menos um aluno e tente novamente.";
            } elseif ($errorMessage === "no_data") {
                $message = "Nenhum dado de aluno foi enviado. Por favor, preencha os dados do aluno e tente novamente.";
            } else {
                $message = "Erro desconhecido. Por favor, entre em contato com o suporte técnico.";
            }
            echo '<div class="alert alert-danger" role="alert">';
            echo "<h4 class='alert-heading'>Erro no registro!</h4>";
            echo "<p>$message</p>";
            echo '</div>';
        } else {
            // Se não houver parâmetro de erro na URL, exibe uma mensagem genérica de sucesso
            echo '<div class="alert alert-success" role="alert">';
            echo "<h4 class='alert-heading'>Registro realizado com sucesso!</h4>";
            echo "<p>O registro da aula foi criado com sucesso.</p>";
            echo '</div>';
        }
        ?>
        <hr>
        <p class="mb-0">Escolha uma das opções abaixo:</p>
        <div class="d-flex justify-content-evenly mt-3">
          <a href="reg_aulas.php" class="btn btn-info">Novo Registro</a>
          <a href="exibir_registros.php" class="btn btn-danger">Ver Registros</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
