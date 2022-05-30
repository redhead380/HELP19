<?php
  $login = trim($_POST['inputEmail']);
  $senha = MD5(trim($_POST['inputSenha']));
  $confirmarSenha = MD5(trim($_POST['inputConfirmarSenha']));
  $nome = trim($_POST['inputNome']);
  $mensagem = "";

  if (empty($nome)) {
    $mensagem =  "Nome obrigatório!";
  } else if (empty($login)) {
    $mensagem = "E-mail obrigatório!";
  } else if (empty($senha)) {
    $mensagem =  "Senha obrigatória!";
  } else if (empty($confirmarSenha)) {
    $mensagem =  "Confirmação de Senha obrigatório!";
  } else if ($senha != $confirmarSenha) {
    $mensagem =  "Senhas não conferem";
  }

  if ($mensagem != "") {
    echo $mensagem;
    echo "<br><br><a onclick='history.back();' href='#'>Voltar</a>";
    exit();
  }

  $mysqli = new mysqli("localhost","root","","help19");

  // Check connection
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  // Perform query
  if ($result = $mysqli->query("SELECT email FROM usuarios WHERE email = '$login'")) {
    if ($result->num_rows == 0) {
      if ($mysqli->query("INSERT INTO usuarios (email, nm_usuario, senha) VALUES ('$login', '$nome','$senha')") == true) {
        session_start();
        $_SESSION["usuario"] = $login;
        header("Location: /25_05/index.php");
      } else {
        echo "Erro inesperado!";
      }
    } else {
      echo "E-mail já cadastrado!";
    }

    // Free result set
    $result -> free_result();
  }

  $mysqli -> close();
?>



