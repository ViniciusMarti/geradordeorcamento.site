<div id="solicitar" class="form-container">
    <h2 style="text-align: center; margin-bottom: 2rem; color: var(--primary);">Solicitar Orçamento Grátis</h2>
    <form action="/obrigado" method="post" id="quote-form">
        <div class="form-group">
            <label for="nome">Qual seu nome?</label>
            <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone (WhatsApp)</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
        </div>
        <div class="form-group">
            <label for="profissao">Serviço desejado</label>
            <select id="profissao" name="profissao" required>
                <option value="">Selecione o serviço...</option>
                <?php foreach ($profissoes as $prof): ?>
                <option value="<?php echo $prof['id']; ?>" <?php echo (isset($profissao_atual) && $profissao_atual['id'] == $prof['id']) ? 'selected' : ''; ?>>
                    <?php echo $prof['nome']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="cidade">Sua cidade</label>
            <input type="text" id="cidade" name="cidade" placeholder="Ex: São Paulo" value="<?php echo $cidade_atual['nome'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Fale mais sobre o que você precisa</label>
            <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva brevemente o serviço que deseja contratar..." required></textarea>
        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn" style="width: 100%; font-size: 1.1rem; padding: 1rem;">Receber orçamento agora</button>
            <p style="margin-top: 1rem; font-size: 0.8rem; color: var(--text-muted);">
                Grátis e sem compromisso. Seus dados estão protegidos.
            </p>
        </div>
    </form>
</div>
