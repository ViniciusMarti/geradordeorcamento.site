    <footer>
        <div class="container footer-grid">
            <div class="footer-link-col">
                <a href="/" class="logo" style="margin-bottom: 1.5rem;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--accent);"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                    <span>gerador d'orçamento</span>
                </a>
                <p style="color: var(--text-muted); font-size: 0.875rem; max-width: 320px; line-height: 1.6;">
                    Gere propostas que convertem. Ferramenta minimalista focada na profissionalismo e agilidade do seu negócio.
                </p>
            </div>
            <div class="footer-link-col">
                <h4>Serviços</h4>
                <ul>
                    <li><a href="/gerador-de-orcamento-eletricista">Eletricista</a></li>
                    <li><a href="/gerador-de-orcamento-pintor">Pintor</a></li>
                    <li><a href="/gerador-de-orcamento-design-grafico">Designer Gráfico</a></li>
                    <li><a href="/gerador-de-orcamento-programador">Programador</a></li>
                </ul>
            </div>
            <div class="footer-link-col">
                <h4>Plataforma</h4>
                <ul>
                    <li><a href="/">Início</a></li>
                    <li><a href="/#geradores">Categorias</a></li>
                    <li><a href="#">Privacidade</a></li>
                    <li><a href="#">Termos</a></li>
                </ul>
            </div>
        </div>
        <div class="container" style="margin-top: 6rem; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center; color: var(--text-muted); font-size: 0.75rem;">
            <p>&copy; <?php echo date('Y'); ?> Gerador d'Orçamento. Propostas profissionais em segundos.</p>
            <div style="display: flex; gap: 1.5rem;">
                <span>Feito com elegância.</span>
            </div>
        </div>
    </footer>
    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Sticky Actions visibility on mobile
        document.addEventListener('scroll', function() {
           const dock = document.querySelector('.dock-actions');
           if (dock) {
             const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
             if (scrollPercent > 10) {
               dock.style.opacity = '1';
               dock.style.transform = 'translateX(-50%) translateY(0)';
             }
           }
        });
    </script>
</body>
</html>
