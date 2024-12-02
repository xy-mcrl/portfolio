<?php 
include '../includes/header.php'; 
include '../includes/db.php'; 
?>
<main>
    <section id="projects">
        <h2>Projetos</h2>
        <?php
        // Buscar projetos do banco de dados
        $stmt = $conn->prepare("SELECT * FROM projects ORDER BY date DESC");
        $stmt->execute();
        $projects = $stmt->fetchAll();

        if ($projects):
            foreach ($projects as $project): ?>
                <article class="project">
                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                    <img src="../assets/images/<?php echo htmlspecialchars($project['image']); ?>" alt="Imagem do projeto">
                    <p><strong>Tecnologias:</strong> <?php echo htmlspecialchars($project['technologies']); ?></p>
                    <p><strong>Data:</strong> <?php echo htmlspecialchars($project['date']); ?></p>
                    <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank">Ver Projeto</a>
                </article>
            <?php endforeach;
        else: ?>
            <p>Nenhum projeto disponível no momento.</p>
        <?php endif; ?>
    </section>
</main>
<?php include '../includes/footer.php'; ?>
