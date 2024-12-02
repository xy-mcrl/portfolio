<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $password]);

    echo "Usuário registrado com sucesso!";
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Nome completo" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Registrar</button>
</form>
