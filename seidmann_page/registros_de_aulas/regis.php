<!DOCTYPE html>
<html>
<?php
include('header.php'); // Inclui o cabeçalho
?>

<body>

<main>
<section id="formReg">
    
  
  <form id="form_reg" class="container" action="processar_registro.php" method="post">

        <h1>Registros de Aulas</h1>

        <div class=" ">
            <label for="aluno">Student:</label>
                <select name="aluno" id="aluno" class="form-select bg-light" onchange="buscarEmail(0)">
                    <option value="">Selecione um aluno</option>
                        <?php
                        require_once "config.php";
                        $sql = "SELECT nome_completo, email FROM formulario";
                        $result = $conn->query($sql);
                        $alunos = array();
                        while ($row = $result->fetch_assoc()) {
                            $nomeAluno = $row['nome_completo'];
                            $emailAluno = $row['email'];
                            echo "<option value='$nomeAluno'>$nomeAluno</option>";
                            $alunos[$nomeAluno] = $emailAluno;
                        }
                        ?>
                </select>
            <label for="email">Email:</label>

                <input type="email" name="email" id="email" class="form-control bg-light" readonly>
                <input id="botaoEnviar" class="btn btn-primary" type="submit" value="Registrar">
        </div>

    </form>

    <script>
        var alunosEEmails = <?php echo json_encode($alunos); ?>;
    </script>
    </section>


</main>
<script src="scripts/reg.js"></script>
</body>
</html>
