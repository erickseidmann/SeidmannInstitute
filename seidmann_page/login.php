<?php
// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Valide as credenciais
  if ($username === '101' && $password === '2023101') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }   elseif ($username === '102' && $password === '2023102') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  } elseif ($username === 'direcao' && $password === 'seidmann@2023') {
      // As credenciais estão corretas, redirecione para a página protegida
      header('Location: listar_alunos.php');
      exit();
  } elseif ($username === '103' && $password === '2023103') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  } elseif ($username === '104' && $password === '2023104') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  } elseif ($username === '105' && $password === '2023105') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '106' && $password === '2023106') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '107' && $password === '2023107') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '108' && $password === '2023108') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '109' && $password === '2023109') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '110' && $password === '2023110') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '111' && $password === '2023111') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '112' && $password === '2023112') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '113' && $password === '2023113') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '114' && $password === '2023114') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }elseif ($username === '115' && $password === '2023115') {
    // As credenciais estão corretas, redirecione para a página protegida
    header('Location: horarios.php');
    exit();
  }else {
    // As credenciais estão incorretas, exiba uma mensagem de erro
    echo 'Credenciais inválidas. Tente novamente.';
  }
}
?>
