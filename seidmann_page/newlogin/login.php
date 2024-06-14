<!doctype html>
<html lang="en">
    <?php
include 'header.php';
?>

<head>


    <!-- Bootstrap CSS -->
    <link rel="icon" href="image/icon.png" type="image/x-icon">
    
    <link href="css/signin.css" rel="stylesheet" >
    <title>Seidmann Institute</title>
</head>
<body>
<div class="container-fluid">
    <form class="mx-auto" id="loginForm" method="POST" action="verificar_login.php">
        <h4 class="text-center">Seidmann Student Portal</h4>
        <div class="mb-3 mt-5">
            <label for="matricula" class="form-label">Numero de Matricula</label>
            <input type="text" class="form-control" id="matricula" name="numero_matricula" aria-describedby="matriculahelp">
        </div>
        <div class="mb-3">
            <a href="https://wa.me/5519987726318">Esqueceu sua matricula?</a>
        </div>

        <button type="submit" class="btn btn-primary mt-5">Login</button>
    </form>
</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
