<?php include 'includes/header.php'; ?>
<main>
    <section id="home">
        <h1>Bem-vindo ao meu Portfólio</h1>
        <p>Olá, eu sou [Seu Nome]. Desenvolvedor apaixonado por criar soluções incríveis!</p>
    </section>
    <section id="about">
        <h2>Sobre Mim</h2>
        <p>Formação, experiência, habilidades...</p>
    </section>
    <section id="projects">
        <h2>Projetos</h2>
        <p>Galeria com projetos desenvolvidos.</p>
    </section>
    <section id="contact">
        <h2>Contato</h2>
        <form method="POST" action="pages/contact.php">
            <input type="text" name="full_name" placeholder="Seu nome completo" required>
            <input type="email" name="email" placeholder="Seu e-mail" required>
            <input type="text" name="subject" placeholder="Assunto" required>
            <textarea name="message" placeholder="Sua mensagem" required></textarea>
            <button type="submit">Enviar</button>
        </form>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
