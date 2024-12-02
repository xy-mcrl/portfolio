// Navegação Suave
document.querySelectorAll('header nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);

        window.scrollTo({
            top: targetSection.offsetTop - 60, // Ajuste do offset para header fixo
            behavior: 'smooth',
        });
    });
});

// Formulário: Validação Simples
const form = document.querySelector('form');
form.addEventListener('submit', function (e) {
    const name = form.querySelector('input[name="full_name"]').value.trim();
    const email = form.querySelector('input[name="email"]').value.trim();
    const message = form.querySelector('textarea[name="message"]').value.trim();

    if (!name || !email || !message) {
        e.preventDefault();
        alert('Por favor, preencha todos os campos!');
    } else {
        alert('Mensagem enviada com sucesso!');
    }
});

// Animação ao Rolagem
const sections = document.querySelectorAll('section');
const observer = new IntersectionObserver(
    (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.2,
    }
);

sections.forEach(section => {
    section.classList.add('hidden'); // Adicionar classe inicial
    observer.observe(section);
});

// Adicionar classes de animação (CSS necessário para animação)
