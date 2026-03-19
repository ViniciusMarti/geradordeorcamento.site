<div class="container tool-main">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h1 style="color: var(--primary); font-size: 2rem;">Gerador de Orçamento para <?php echo $profissao_atual['nome'] ?? 'Profissionais'; ?></h1>
        <p style="color: var(--text-muted);">Preencha os campos abaixo para gerar um orçamento profissional em menos de 1 minuto.</p>
    </div>

    <div class="tool-grid">
        <!-- Form Section -->
        <div class="card form-card">
            <h2 style="margin-bottom: 1.5rem; font-size: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                Seus Dados (Profissional)
            </h2>
            <div class="form-group">
                <label>Nome / Empresa</label>
                <input type="text" id="prof_nome" placeholder="Ex: João Eletricista" oninput="updatePreview()">
            </div>
            <div class="form-group">
                <label>WhatsApp / Telefone</label>
                <input type="text" id="prof_tel" placeholder="(00) 00000-0000" oninput="updatePreview()">
            </div>
            
            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border);">
            
            <h2 style="margin-bottom: 1.5rem; font-size: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Dados do Cliente
            </h2>
            <div class="form-group">
                <label>Nome do Cliente</label>
                <input type="text" id="client_nome" placeholder="Ex: Maria Souza" oninput="updatePreview()">
            </div>

            <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border);">

            <h2 style="margin-bottom: 1.5rem; font-size: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                Itens do Orçamento
            </h2>
            <div id="items-list">
                <!-- Items will be added here -->
            </div>
            <button class="btn btn-secondary" onclick="addItem()" style="background: transparent; border: 2px dashed var(--border); color: var(--text-muted); width: 100%; margin-top: 1rem;">
                + Adicionar Item
            </button>

            <div class="form-group" style="margin-top: 2rem;">
                <label>Prazo e Pagamento</label>
                <textarea id="obs" rows="3" placeholder="Ex: Prazo de 5 dias úteis. Pagamento via PIX." oninput="updatePreview()"></textarea>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="preview-card" id="pdf-content" style="background: white; border-radius: var(--radius); padding: 4rem; box-shadow: var(--shadow); color: #000;">
            <div style="display: flex; justify-content: space-between; border-bottom: 2px solid var(--primary); padding-bottom: 2rem; margin-bottom: 2rem;">
                <div>
                    <h1 style="color: var(--primary); font-size: 2.5rem; margin: 0;">ORÇAMENTO</h1>
                    <p id="prev_prof_nome" style="font-weight: 800; font-size: 1.25rem; margin-top: 0.5rem;"></p>
                    <p id="prev_prof_tel" style="color: var(--text-muted);"></p>
                </div>
                <div style="text-align: right;">
                    <p style="color: var(--text-muted);">Data: <?php echo date('d/m/Y'); ?></p>
                </div>
            </div>

            <div style="margin-bottom: 3rem;">
                <p style="color: var(--text-muted); font-size: 0.875rem; text-transform: uppercase; font-weight: 600; margin-bottom: 0.5rem;">Para:</p>
                <h3 id="prev_client_nome" style="font-size: 1.5rem;"></h3>
            </div>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 3rem;">
                <thead>
                    <tr style="background: #f1f5f9; text-align: left;">
                        <th style="padding: 1rem; border-bottom: 2px solid var(--border);">Descrição</th>
                        <th style="padding: 1rem; border-bottom: 2px solid var(--border); width: 100px;">Qtd</th>
                        <th style="padding: 1rem; border-bottom: 2px solid var(--border); text-align: right; width: 150px;">Unitário</th>
                        <th style="padding: 1rem; border-bottom: 2px solid var(--border); text-align: right; width: 150px;">Total</th>
                    </tr>
                </thead>
                <tbody id="prev_items"></tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="padding: 2rem 1rem; text-align: right; font-weight: 800; font-size: 1.5rem;">VALOR TOTAL:</td>
                        <td id="prev_total" style="padding: 2rem 1rem; text-align: right; font-weight: 800; font-size: 1.5rem; color: var(--primary);">R$ 0,00</td>
                    </tr>
                </tfoot>
            </table>

            <div style="background: #f8fafc; padding: 2rem; border-radius: 0.5rem; border-left: 4px solid var(--primary);">
                <p id="prev_obs" style="white-space: pre-wrap; font-size: 0.95rem;"></p>
            </div>
            
            <div style="margin-top: 4rem; text-align: center; font-size: 0.8rem; color: var(--text-muted);">
                Este orçamento é válido por 10 dias. Gerado em geradordeorcamento.site
            </div>
        </div>
    </div>

    <!-- Sticky Actions -->
    <div class="sticky-actions">
        <div class="container" style="display: flex; gap: 1rem; justify-content: center; padding: 1rem 0;">
            <button class="btn btn-pdf" onclick="generatePDF()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 0.5rem;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                Baixar PDF
            </button>
            <button class="btn btn-whatsapp" onclick="sendWhatsapp()" style="background: #25d366;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 0.5rem;"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-11.7"></path><path d="M16 8l5 5-5 5"></path><path d="M8 13h13"></path></svg>
                Enviar WhatsApp
            </button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
let items = [
    { desc: 'Serviço de <?php echo $profissao_atual['nome'] ?? ''; ?>', qt: 1, val: 0 }
];

function addItem() {
    items.push({ desc: '', qt: 1, val: 0 });
    renderItems();
}

function updateItem(index, field, value) {
    items[index][field] = value;
    updatePreview();
}

function removeItem(index) {
    items.splice(index, 1);
    renderItems();
}

function renderItems() {
    const list = document.getElementById('items-list');
    list.innerHTML = '';
    items.forEach((item, i) => {
        list.innerHTML += `
            <div class="item-row" style="display: grid; grid-template-columns: 1fr 60px 100px 40px; gap: 0.5rem; margin-bottom: 0.5rem;">
                <input type="text" placeholder="Nome do item" value="${item.desc}" oninput="updateItem(${i}, 'desc', this.value)">
                <input type="number" value="${item.qt}" oninput="updateItem(${i}, 'qt', this.value)">
                <input type="number" value="${item.val}" oninput="updateItem(${i}, 'val', this.value)">
                <button onclick="removeItem(${i})" style="border:0; background:none; color: #ef4444; font-weight:800; cursor:pointer;">&times;</button>
            </div>
        `;
    });
    updatePreview();
}

function updatePreview() {
    document.getElementById('prev_prof_nome').innerText = document.getElementById('prof_nome').value || 'Seu Nome';
    document.getElementById('prev_prof_tel').innerText = document.getElementById('prof_tel').value || '(00) 00000-0000';
    document.getElementById('prev_client_nome').innerText = document.getElementById('client_nome').value || 'Nome do Cliente';
    document.getElementById('prev_obs').innerText = document.getElementById('obs').value || 'Observações sobre o serviço...';

    const tbody = document.getElementById('prev_items');
    tbody.innerHTML = '';
    let total = 0;
    items.forEach(item => {
        let lineTotal = item.qt * item.val;
        total += lineTotal;
        tbody.innerHTML += `
            <tr>
                <td style="padding: 1rem; border-bottom: 1px solid var(--border);">${item.desc}</td>
                <td style="padding: 1rem; border-bottom: 1px solid var(--border);">${item.qt}</td>
                <td style="padding: 1rem; border-bottom: 1px solid var(--border); text-align: right;">R$ ${parseFloat(item.val).toFixed(2)}</td>
                <td style="padding: 1rem; border-bottom: 1px solid var(--border); text-align: right; font-weight: 600;">R$ ${lineTotal.toFixed(2)}</td>
            </tr>
        `;
    });
    document.getElementById('prev_total').innerText = 'R$ ' + total.toFixed(2);
    
    // Save to localStorage
    const data = {
        prof_nome: document.getElementById('prof_nome').value,
        prof_tel: document.getElementById('prof_tel').value,
        items: items,
        obs: document.getElementById('obs').value
    };
    localStorage.setItem('last_quote_config', JSON.stringify(data));
}

function generatePDF() {
    const element = document.getElementById('pdf-content');
    const client = document.getElementById('client_nome').value || 'cliente';
    const opt = {
        margin: 0,
        filename: `orcamento-${client}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(element).save();
}

function sendWhatsapp() {
    const prof = document.getElementById('prof_nome').value || 'Seu Nome';
    const client = document.getElementById('client_nome').value || 'Cliente';
    const total = document.getElementById('prev_total').innerText;
    const msg = `Olá ${client}, segue seu orçamento gerado por *${prof}*:\n\n` + 
                items.map(i => `- ${i.desc}: R$ ${(i.qt * i.val).toFixed(2)}`).join('\n') +
                `\n\n*Total: ${total}*\n\nGerado em geradordeorcamento.site`;
    const url = "https://wa.me/?text=" + encodeURIComponent(msg);
    window.open(url, '_blank');
}

// Load from LocalStorage
window.onload = () => {
    const saved = localStorage.getItem('last_quote_config');
    if (saved) {
        const data = JSON.parse(saved);
        document.getElementById('prof_nome').value = data.prof_nome || '';
        document.getElementById('prof_tel').value = data.prof_tel || '';
        document.getElementById('obs').value = data.obs || '';
        if (data.items) items = data.items;
    }
    renderItems();
};
</script>

<style>
.tool-grid {
    display: grid;
    grid-template-columns: 450px 1fr;
    gap: 3rem;
    align-items: start;
}

@media (max-width: 1024px) {
    .tool-grid { grid-template-columns: 1fr; }
    .preview-card { transform: scale(0.9); transform-origin: top center; overflow-x: auto; padding: 1.5rem !important; }
}

.form-card {
    padding: 2rem;
    position: sticky;
    top: 2rem;
}

.item-row input {
    padding: 0.5rem;
    border: 1px solid var(--border);
    border-radius: 4px;
}

.sticky-actions {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: white;
    border-top: 1px solid var(--border);
    box-shadow: 0 -4px 12px rgba(0,0,0,0.1);
    z-index: 1000;
}

.tool-main { padding-bottom: 100px; }
</style>
