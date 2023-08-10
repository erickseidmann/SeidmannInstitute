<?php
require_once "config.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $registro_id = $_GET['id'];
    
    // Consulta para excluir o registro pelo ID
    $query = "DELETE FROM registros_aulas WHERE id = $registro_id";
    
    if(mysqli_query($conn, $query)) {
        // Registro excluído com sucesso, redireciona de volta para a página de listagem
        header("Location: listar_reg.php");
        exit();
    } else {
        echo "Erro ao excluir o registro: " . mysqli_error($conn);
    }
} else {
    echo "ID do registro não fornecido.";
}
?>
