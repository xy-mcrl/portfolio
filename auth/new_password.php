<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?");
        $stmt->execute([$password, $user['id']]);
        echo "Senha redefinida com sucesso!";
    } else {
        echo "Token inválido ou expirado.";
    }
} elseif (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    die("Token não fornecido.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Senha</title>
</head>
<body>
    <h2>Defina Sua Nova Senha</h2>
    <form method="POST" action="">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="password">Nova Senha:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Redefinir Senha</button>
    </form>
</body>
</html>
