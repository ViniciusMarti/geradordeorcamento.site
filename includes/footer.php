    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-links">
                    <h4 style="color: white; font-weight: 800; font-size: 1.25rem;">Gerador de Orçamento</h4>
                    <p style="color: #94a3b8; font-size: 0.875rem; margin-top: 1rem;">
                        Conectando você aos melhores profissionais em todo o Brasil. Qualidade, rapidez e economia.
                    </p>
                </div>
                <div class="footer-links">
                    <h4>Serviços Populares</h4>
                    <ul>
                        <li><a href="/orcamento-eletricista-sao-paulo-sp">Eletricistas em SP</a></li>
                        <li><a href="/orcamento-pintor-rio-de-janeiro-rj">Pintores no RJ</a></li>
                        <li><a href="/orcamento-encanador-curitiba-pr">Encanadores em PR</a></li>
                        <li><a href="/orcamento-pedreiro-belo-horizonte-mg">Pedreiros em MG</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Capitais</h4>
                    <ul>
                        <li><a href="/">Cidades Principais</a></li>
                        <li><a href="/">Profissões</a></li>
                        <li><a href="/">Sobre Nós</a></li>
                        <li><a href="/">Políticas</a></li>
                    </ul>
                </div>
            </div>
            <div style="border-top: 1px solid #334155; padding-top: 2rem; text-align: center; color: #94a3b8; font-size: 0.75rem;">
                <p>&copy; <?php echo date('Y'); ?> geradordeorcamento.site. Todos os direitos reservados. Feito com paixão pela comunidade.</p>
            </div>
        </div>
    </footer>
    <script>
        // Smooth scroll for anchors
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Lazy load optimization for images if any
        document.addEventListener("DOMContentLoaded", function() {
            var lazyloadImages = document.querySelectorAll("img.lazy");    
            if ("IntersectionObserver" in window) {
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove("lazy");
                            imageObserver.unobserve(image);
                        }
                    });
                });
                lazyloadImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            }
        });
    </script>
</body>
</html>
