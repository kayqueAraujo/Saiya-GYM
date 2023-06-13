<?php
require_once 'conectaBD.php';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['contato']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];
    $senha = $_POST['senha'];

    // Verificar se todos os campos foram preenchidos
    if (!empty($nome) && !empty($email) && !empty($contato) && !empty($senha)) {
        // Realizar a inserção no banco de dados
        $query = "INSERT INTO clientesite (Nome, Email, Contato, Senha) VALUES ($1, $2, $3, $4)";
        $result = pg_prepare($conn, "cadastro_query", $query);
        $result = pg_execute($conn, "cadastro_query", array($nome, $email, $contato, $senha));

        if ($result) {
            echo "Cadastro realizado com sucesso!";
        } else {
            $errorMessage = "Erro ao cadastrar o cliente.";
        }
    } else {
        $errorMessage = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>


</head>
<link rel="stylesheet" href="Cadastro.css">

<body>
    <?php
    if (isset($errorMessage)) {
        echo "<p class='erro'>$errorMessage</p>";
    }
    ?>
    <div class="logoGYM">
        <img src="logo gym.png" alt="Logo">
    </div>
    <div class="form">
        <form action="Cadastro.php" method="post">
            <input type="text" name="nome" placeholder="Nome" id="nome" required>
            <br>
            <input type="email" name="email" placeholder="E-mail" id="email" required>
            <br>
            <input type="text" name="contato" placeholder="Contato" id="contato" required>
            <br>
            <input type="password" name="senha" placeholder="Senha" id="senha" required>
            <br>
            <button type="submit"><img src="icone-login.png" alt="Login"></button>
    </div>
    </form>
</body>

</html>