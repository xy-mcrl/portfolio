<?php 
include '../includes/header.php'; 
include '../includes/db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Inserir a mensagem no banco de dados
    $stmt = $conn->prepare("INSERT INTO messages (full_name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $subject, $message]);

    $success = "Mensagem enviada com sucesso!";
}
?>
<main>
    <section id="contact">
        <h2>Contato</h2>
        <?php if (isset($success)) echo "<p style='color: green;'>$success</p>"; ?>
        <form method="POST" action="">
            <label for="full_name">Nome Completo</label>
            <input type="text" name="full_name" id="full_name" required>
            
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
            
            <label for="subject">Assunto</label>
            <input type="text" name="subject" id="subject" required>
            
            <label for="message">Mensagem</label>
            <textarea name="message" id="message" rows="5" required></textarea>
            
            <button type="submit">Enviar</button>
        </form>
    </section>
</main>
<?php include '../includes/footer.php'; ?>
