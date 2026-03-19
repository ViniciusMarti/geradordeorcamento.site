    <footer>
        <div class="container footer-grid">
            <div class="footer-link-col">
                <a href="/" class="logo" style="margin-bottom: 1.5rem; color: #FFF;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--accent);"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                    <span>Gerador de Orçamento</span>
                </a>
                <p style="color: #666; font-size: 0.9375rem; max-width: 320px; line-height: 1.6;">
                    A ferramenta mais simples e elegante para profissionais que buscam agilidade e apresentações impecáveis para seus clientes.
                </p>
                <div style="margin-top: 2rem; color: #444; font-size: 0.75rem;">
                   v2.0 Beta &bull; Desenvolvido com Estética Superior
                </div>
            </div>
            <div class="footer-link-col">
                <h4>Serviços Populares</h4>
                <ul>
                    <li><a href="/gerador-de-orcamento-eletricista">Eletricista</a></li>
                    <li><a href="/gerador-de-orcamento-pintor">Pintor</a></li>
                    <li><a href="/gerador-de-orcamento-design-grafico">Designer Gráfico</a></li>
                    <li><a href="/gerador-de-orcamento-programador">Programador</a></li>
                </ul>
            </div>
            <div class="footer-link-col">
                <h4>Navegação</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/#geradores">Todas as Profissões</a></li>
                    <li><a href="#">Privacidade</a></li>
                    <li><a href="#">Termos de Uso</a></li>
                </ul>
            </div>
        </div>
        <div class="container" style="margin-top: 5rem; padding-top: 2rem; border-top: 1px solid #222; text-align: center; color: #444; font-size: 0.8125rem;">
            <p>&copy; <?php echo date('Y'); ?> Gerador de Orçamento. Criado para elevar o nível das suas propostas.</p>
        </div>
    </footer>
    <script>
        // Smooth scroll implementation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
