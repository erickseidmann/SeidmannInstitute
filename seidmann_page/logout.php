<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: loginstudent.php"); // Redireciona para a página de login após o logout
?>
