<?php
// Obtenha os dados dos alunos e e-mails do banco de dados ou de onde estiverem disponíveis
require_once "config.php";

$sql = "SELECT nome_completo, email FROM formulario";
$result = $conn->query($sql);

$alunos = array();

while ($row = $result->fetch_assoc()) {
    $nomeAluno = $row['nome_completo'];
    $emailAluno = $row['email'];
    $alunos[$nomeAluno] = $emailAluno;
}
?>
<!DOCTYPE html>
<html>

<?php
include('header.php'); // Inclui o cabeçalho
?>


<link rel="stylesheet" href="style/registrar.css">
<link rel="stylesheet" href="style/registrar-large.css">
<body>
    <!--start of the tag header-->
    <header>
        <!-- aqui vai ficar a imagem-->
        
    </header>
    <!--the end of the tag header-->
       <!--the start of the tag main-->
    <main>
    <h2>New Class Registrations</h2>

<!-- Botão "Grupo" para exibir informações dos alunos 2, 3, 4 e 5 -->
<h2>Se for em grupo clique nesse botão abaixo:</h2>
<button id="mostrar-grupo">Grupo</button>
<br>
<section class="grup" id="group"><!--aqui começa o formulario para a aula em grupo-->

    <form id="form-group" action="processar-registros-new.php" method="post"><!-- aqui começa o form do -group classes-->

    <div>
    <h3>Informações do aluno </h3>
    <label for="nome-1">Nome / Name:</label>
    <select name="alunos[1][nome]" id="nome-1" class="form-select bg-light">
        <option value="">Selecione um aluno</option>
        <?php
        require_once "config.php";
        $sql = "SELECT nome_completo, email FROM formulario";
        $result = $conn->query($sql);
        $nomes = array(); // Array para armazenar os nomes dos alunos
        while ($row = $result->fetch_assoc()) {
            $nomeAluno = $row['nome_completo'];
            $nomes[] = $nomeAluno; // Adiciona o nome ao array
        }
        // Remove duplicatas e reordena o array em ordem alfabética
        $nomes = array_unique($nomes);
        sort($nomes);
        
        // Itera sobre os nomes para criar as opções do select
        $count = 1;
        foreach ($nomes as $nome) {
            echo "<option value='$nome'>$count. $nome</option>";
            $count++;
        }
        ?>
    </select>
    <div>
                    <label for="info-status-1">Status</label>
                    <select name="alunos[1][info-status]" id="info-status-1" class="form-select bg-light">
                        <option selected>Selecione...</option>
                        <option value="compareceu">Compareceu / showed up</option>
                        <option value="nao-compareceu">Não compareceu /  Didn't attend</option>
                        <option value="cancelou">Cancelou / Canceled</option>
                        <option value="demonstrativa">Demonstrativa / Demonstrative</option>
                    </select>
                </div>
            </div>
</div>

<!-- Loop para criar as informações de até 5 alunos -->
<?php for ($i = 2; $i <= 5; $i++): ?>
    <div class="aluno-info" style="display: none;">
        <h3>Informações do aluno <?php echo $i; ?></h3>
        <div>
            <label for="nome-<?php echo $i; ?>">Nome / Name:</label>
            <select name="alunos[<?php echo $i; ?>][nome]" id="nome-<?php echo $i; ?>" class="form-select bg-light">
                <option value="">Selecione um aluno</option>
                <?php
                require_once "config.php";
                $sql = "SELECT nome_completo, email FROM formulario";
                $result = $conn->query($sql);
                $nomes = array(); // Array para armazenar os nomes dos alunos
                while ($row = $result->fetch_assoc()) {
                    $nomeAluno = $row['nome_completo'];
                    echo "<option value='$nomeAluno'>$nomeAluno</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="info-status-<?php echo $i; ?>">Status</label>
            <select name="alunos[<?php echo $i; ?>][info-status]" id="info-status-<?php echo $i; ?>" class="form-select bg-light">
                <option selected>Selecione...</option>
                <option value="compareceu">Compareceu / showed up</option>
                <option value="nao-compareceu">Não compareceu /  Didn't attend</option>
                <option value="cancelou">Cancelou / Canceled</option>
                <option value="demonstrativa">Demonstrativa / Demonstrative</option>
            </select>
        </div>
    </div>
<?php endfor; ?>
</div><!--FIM div info-aluno-->

                                


                <div ><!--DIV INFO-AULA-->

                    <h3 >Informaçoes sobre a aula/ Class information </h3>
                    
                    <div class="teacher"><!--Div nome do aluno-->
                        <label for="teacher" required>Professor(a) / Teacher:</label>
                        <input type="text" id="teacher" name="teacher" required/>
                    </div><!-- FIM Div nome do aluno-->


                    <div class="tempo-aula"><!--Div tempo de aula  -->
                        <label for="tempo-aula">Tempo da aula / Class time</label>
                        <select name="tempo-aula" id="tempo-group" class="form-select bg-light" required>
                        <option value="" disabled selected>Selecione...</option>
                            <option value="30min">00:30 min</option>
                            <option value="45min">00:45 min</option>
                            <option value="60min">1:00 hr</option>
                            <option value="90min">1:30 hr/min</option>
                            <option value="120min">2:00 hr</option>
                        </select>
                    </div><!-- FIM Div tempo de aula-->

                    <div class="data"><!--Div para a data-->
                        <label for="data">Data / Date:</label>
                        <input type="date" id="data" name="data" required />
                    </div><!-- FIM Div para a data-->

                    <div class="tipo-curso" ><!--Div curso  -->
                        <label for="tipo-curso">Curso / Course</label>
                        <select name="tipo-curso" id="tipo-group" class="form-select bg-light" required>
                            <option value="" disabled selected>Selecione...</option>
                            <option value="ingles">Inglês / English</option>
                            <option value="espanhol">Espanhol / Spanish</option>
                            <option value="programacao">Programação / Programming</option>
                        </select>
                    </div><!-- FIM Div curso-->


                    <div class="tipo-aula" ><!--Div tipo-aula  -->
                        <label for="tipo-aula">Aula / Class</label>
                        <select name="tipo-aula" id="aula-group" class="form-select bg-light" required>
                        <option value="" disabled selected>Selecione...</option>
                            <option value="book">Book / talk </option>
                            <option value="free">Free talk</option>
                            <option value="review">Subject Review</option>
                        </select>
                    </div><!-- FIM Div tipo-aula-->

                    <div  class="page"><!--Div Book-->
                        <label for="Book">Book / Book</label>
                        <input type="text" id="page-group" name="book" required/>
                    </div><!-- FIM Div book-->


                    <div  class="page"><!--Div pagina-->
                        <label for="page">Ultima Pagina / Last page:</label>
                        <input type="number" id="page-group" name="page" required/>
                    </div><!-- FIM Div pagina-->

                    <div class="atividade"><!--Div atividade-->
                        <label for="atividade">Ultima Atividade / Last activity:</label>
                        <input type="text" id="page-group-number" name="atividade" required/>
                    </div><!-- FIM Div atividade-->

                    <div  class="homework"><!--Div atividade-->
                        <label for="homework">Homework:</label>
                        <input type="text" id="Homework-group" name="homework" required/>
                    </div><!-- FIM Div atividade-->

                    <div  class="free-talk"><!--Div free talk-->
                        <label for="free-talk">Assunto do Free Talk / Free Talk subject:</label>
                        <input type="text" id="free-group" name="free-talk" />
                    </div><!-- FIM Div free talk-->

                    <div  class="free-talk-link"><!--Div free talk link-->
                        <label for="free-talk-link">Free Talk link / Free Talk link:</label>
                        <input type="text" id="link-group" name="free-link"  />
                    </div><!-- FIM Div free talk link-->

                    <div ><!--Div  obs-->
                        <label for="obs">OBS sobre a aula / NOTE about the class:</label>
                        <textarea id="obs-group" name = "obs"></textarea>
                    </div><!--FIM Div  obs-->
                    
                    <div ><!--Div  INFO PARENTS-->
                        <label for="info">INFO PARENTS / INFO PARA OS PAIS:</label>
                        <textarea id="info-group" name="info"></textarea>
                    </div><!--FIM INFO PARENTS-->
                
                </div> <!--FIM DIV INFO-AULA-->

                <div>
                  <label for="msg">Mensagem:</label>
                  <textarea id="msg-group" name="msg"></textarea>
                </div>

                <div class="button">
                  <button type="submit">Registrar Aula</button>
                </div>
              </form><!-- aqui termina o form do Group classes-->
            
        </section><!--aqui termina o formulario para aula em grupo-->

        


    </main>   
    <!--the end of the tag main-->
    <!-- the start of the tag footer-->
    <script>
    // Armazenar os alunos e seus respectivos e-mails em um objeto JavaScript
    
    </script>
    <script src="scripts/getDate.js"></script>  

     <!-- the end of the tag footer-->
     
</body>


</html>
