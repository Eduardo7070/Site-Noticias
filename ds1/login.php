
<script>
  var resposta = confirm("Apenas Adms podem acessar essa página! Caso não seja adm, clique em Cancelar para permanecer na página.");

  if (!resposta) {
    window.history.back(); // Substitua "index.html" pelo caminho da página desejada
  }
</script>

<!DOCTYPE html>
<html>
<head>
  <title>Tela de Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .login-container {
      width: 300px;
      margin: 0 auto;
      margin-top: 150px;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 4px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-container input[type="email"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      border-radius: 4px;
    }

    .login-container button {
      background-color: #4CAF50;
      color: #fff;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 4px;
    }

    .login-container button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Tela de Login</h2>
    <form action="login.php" method="post">
      <input type="email" placeholder="Usuário" name="email" id="email">
      <input type="password" placeholder="Senha" name="senha" id="senha">
      <button type="submit">Entrar</button>
    </form>
  </div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $pass = $_POST['senha'];

    include('admin/conexao.php');

    $stmt = $pdo->prepare("SELECT emailAdm, senhaAdm FROM tbadm");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $validCredentials = false;
    foreach ($result as $row) {
      if ($email === $row['emailAdm'] && $pass === $row['senhaAdm']) {
        $validCredentials = true;
        break;
      }
    }

    if ($validCredentials) {
      header('Location: ../ds1/consultas.php');
      exit();
    } else {
      echo "<script>alert('Usuário ou senha incorretos!');</scrip>";
    }
  }
}
?>
</body>
</html>