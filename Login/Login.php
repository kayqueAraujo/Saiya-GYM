<?php
require_once 'conectaBD.php';

session_start();

if (isset($_POST['Email']) && isset($_POST['senha'])) {
    $Email = $_POST['Email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM clientesite WHERE Email = $1 AND Senha = $2";
    $result = pg_prepare($conn, "login_query", $query);
    $result = pg_execute($conn, "login_query", array($Email, $senha));

    if (pg_num_rows($result) > 0) {
        $_SESSION['usuario'] = $Email;
        header("Location: painel.php");
        exit;
    } else {
        $loginError = "Email ou senha inválidos";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<link rel="stylesheet" href="Login.css" />

<body>

    <div class="logoGYM">
        <img src="logo gym.png" alt="Logo">
    </div>
    <?php if (!empty($loginError)) : ?>
        <p class="erro"><?php echo $loginError; ?></p>
    <?php endif; ?>
    <div class="form">
        <form action="Login.php" method="post">
            <input type="text" name="Email" placeholder="Email">

            <br>
            <input type="password" name="senha" placeholder="Senha">
            <br>
            <button type="submit"><img src="icone-login.png" alt="Login"></button>
        </form>
    </div>
</body>

</html>