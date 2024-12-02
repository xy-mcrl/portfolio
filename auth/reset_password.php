<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Verifica se o e-mail existe no banco de dados
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Gerar um token único
        $token = bin2hex(random_bytes(50));
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id = ?");
        $stmt->execute([$token, $user['id']]);

        // Enviar e-mail (simples para exemplo)
        $resetLink = "http://localhost/auth/new_password.php?token=$token";
        mail($email, "Redefinição de Senha", "Clique no link para redefinir sua senha: $resetLink");

        $success = "Um link de redefinição foi enviado para o seu e-mail.";
    } else {
        $error = "E-mail não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body>
    <h2>Redefinir Senha</h2>
    <?php if (isset($success)) echo "<p style='color: green;'>$success</p>"; ?>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Enviar Link de Redefinição</button>
    </form>
</body>
</html>
