<?php
  $login = $_POST['inputEmail'];
  $senha = MD5($_POST['inputSenha']);
  $mysqli = new mysqli("localhost","root","","help19");

  // Check connection
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  // Perform query
  if ($result = $mysqli->query("SELECT email FROM usuarios WHERE email = '$login' AND senha = '$senha'")) {
    if ($result->num_rows == 0) {
      echo "Credenciais inválidas!";
      echo "<br><br><a onclick='history.back();' href='#'>Voltar</a>";
    } else {
      session_start();
      $_SESSION["usuario"] = $login;
      header("Location: /25_05/index.php");
    }

    // Free result set
    $result -> free_result();
  }

  $mysqli -> close();
?>