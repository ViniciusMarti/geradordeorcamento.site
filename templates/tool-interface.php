<div class="container" style="padding: 4rem 0 8rem;">
    <div class="tool-grid">
        <!-- Input Panel -->
        <div class="input-panel">
            <div class="sticky-panel">
                <div style="margin-bottom: 3rem;">
                    <h1 style="font-size: 1.75rem; margin-bottom: 0.5rem;">Gerador d'Orçamento</h1>
                    <p style="color: var(--text-muted); font-size: 0.875rem;">Para <?php echo $profissao_atual['nome'] ?? 'especialistas'; ?>.</p>
                </div>

                <div class="form-section">
                    <h3 class="section-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        Seu Perfil
                    </h3>
                    <div class="form-group">
                        <label>Nome ou Empresa</label>
                        <input type="text" id="prof_nome" placeholder="Ex: Studio Design Co." oninput="updatePreview()">
                    </div>
                    <div class="form-group">
                        <label>Contato</label>
                        <input type="text" id="prof_tel" placeholder="Ex: (11) 99999-9999" oninput="updatePreview()">
                    </div>
                </div>

                <div class="form-section" style="margin-top: 3rem;">
                    <h3 class="section-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        Destinatário
                    </h3>
                    <div class="form-group">
                        <label>Nome do Cliente</label>
                        <input type="text" id="client_nome" placeholder="Ex: Maria Clara" oninput="updatePreview()">
                    </div>
                </div>

                <div class="form-section" style="margin-top: 3rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
                        <h3 class="section-title" style="margin-bottom: 0;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
                            Serviços
                        </h3>
                        <button class="btn btn-secondary" onclick="addItem()" style="padding: 0.25rem 0.75rem; font-size: 0.75rem;">+ ITEM</button>
                    </div>
                    <div id="items-list">
                        <!-- Items dynamically rendered here -->
                    </div>
                </div>

                <div class="form-section" style="margin-top: 3rem;">
                    <h3 class="section-title">Termos</h3>
                    <div class="form-group">
                        <label>Prazo e Pagamento</label>
                        <textarea id="obs" rows="3" placeholder="Ex: 5 dias úteis. Pix na entrega." oninput="updatePreview()"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Panel -->
        <div class="preview-panel">
            <div class="proposal-box" id="pdf-content">
                <div class="proposal-header">
                    <div>
                        <div style="width: 48px; height: 48px; background: var(--bg-secondary); border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: center; color: var(--accent);">
                             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        </div>
                        <h1 class="proposal-title">Proposta d'Orçamento</h1>
                        <p style="color: var(--text-muted); font-size: 0.875rem;">Emitido em <?php echo date('d/m/Y'); ?></p>
                    </div>
                    <div style="text-align: right;">
                        <p id="prev_prof_nome" style="font-weight: 700; font-size: 1.125rem; margin-bottom: 0.25rem;">Seu Nome</p>
                        <p id="prev_prof_tel" style="color: var(--text-muted); font-size: 0.875rem;">Seu Contato</p>
                    </div>
                </div>

                <div style="margin-bottom: 4rem;">
                    <p style="font-size: 0.6875rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-bottom: 0.75rem;">Preparado para:</p>
                    <h2 id="prev_client_nome" style="font-size: 1.5rem; font-weight: 700;">Nome do Cliente</h2>
                </div>

                <table class="proposal-table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>Descrição do Serviço</th>
                            <th style="width: 60px; text-align: center;">Qtd</th>
                            <th style="width: 120px; text-align: right;">Unitário</th>
                            <th style="width: 120px; text-align: right;">Total</th>
                        </tr>
                    </thead>
                    <tbody id="prev_items"></tbody>
                </table>

                <div class="proposal-total">
                    <p style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-bottom: 0.5rem;">Investimento Total</p>
                    <h2 id="prev_total" style="font-size: 2rem; font-weight: 800; letter-spacing: -0.04em; color: var(--text-main);">R$ 0,00</h2>
                </div>

                <div style="margin-top: 6rem; border-top: 1px solid #eee; padding-top: 3rem;">
                    <h4 style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-bottom: 1rem;">Termos e Condições</h4>
                    <p id="prev_obs" style="font-size: 0.875rem; color: #444; white-space: pre-wrap; line-height: 1.7;"></p>
                </div>

                <div style="margin-top: 8rem; text-align: center; border-top: 1px solid #f9f9f9; padding-top: 2rem;">
                    <p style="font-size: 0.6875rem; color: #ccc; letter-spacing: 0.05em;">Este documento foi gerado profissionalmente via geradordeorcamento.site</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Dock Actions -->
<div class="dock-actions" style="opacity: 0; transform: translateX(-50%) translateY(20px); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
    <button class="btn btn-pdf" onclick="generatePDF()">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:0.5rem;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
        Exportar PDF
    </button>
    <button class="btn btn-whatsapp" onclick="sendWhatsapp()">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:0.5rem;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l2.28-2.28a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
        WhatsApp
    </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
let items = [
    { desc: 'Serviço Profissional de <?php echo $profissao_atual['nome'] ?? ''; ?>', qt: 1, val: 0 }
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
    if (items.length > 1) {
        items.splice(index, 1);
        renderItems();
    }
}

function renderItems() {
    const list = document.getElementById('items-list');
    list.innerHTML = '';
    items.forEach((item, i) => {
        list.innerHTML += `
            <div class="item-row" style="margin-bottom: 1rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
                <div style="grid-column: span 4;">
                    <input type="text" placeholder="Descrição do serviço ou produto" value="${item.desc}" oninput="updateItem(${i}, 'desc', this.value)" style="margin-bottom:0.5rem;">
                </div>
                <input type="number" placeholder="Qtd" value="${item.qt}" oninput="updateItem(${i}, 'qt', parseInt(this.value) || 0)">
                <input type="number" placeholder="Unitário" value="${item.val}" oninput="updateItem(${i}, 'val', parseFloat(this.value) || 0)">
                <div style="text-align: right;">
                    <button onclick="removeItem(${i})" style="border:0; background:none; color: #ef4444; font-size: 1.25rem; line-height:1; cursor:pointer; opacity: 0.5;">&times;</button>
                </div>
            </div>
        `;
    });
    updatePreview();
}

function updatePreview() {
    document.getElementById('prev_prof_nome').innerText = document.getElementById('prof_nome').value || 'Seu Nome';
    document.getElementById('prev_prof_tel').innerText = document.getElementById('prof_tel').value || 'Seu Contato';
    document.getElementById('prev_client_nome').innerText = document.getElementById('client_nome').value || 'Nome do Cliente';
    document.getElementById('prev_obs').innerText = document.getElementById('obs').value || 'Detalhes sobre o prazo, forma de pagamento e validade desta proposta.';

    const tbody = document.getElementById('prev_items');
    tbody.innerHTML = '';
    let total = 0;
    items.forEach(item => {
        let lineTotal = item.qt * item.val;
        total += lineTotal;
        tbody.innerHTML += `
            <tr>
                <td>${item.desc}</td>
                <td style="text-align: center;">${item.qt}</td>
                <td style="text-align: right;">R$ ${item.val.toFixed(2)}</td>
                <td style="text-align: right; font-weight: 700;">R$ ${lineTotal.toFixed(2)}</td>
            </tr>
        `;
    });
    document.getElementById('prev_total').innerText = 'R$ ' + total.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
    
    // Auto-save
    const data = {
        prof_nome: document.getElementById('prof_nome').value,
        prof_tel: document.getElementById('prof_tel').value,
        obs: document.getElementById('obs').value
    };
    localStorage.setItem('gerador_v2_profile', JSON.stringify(data));
}

function generatePDF() {
    const element = document.getElementById('pdf-content');
    const client = document.getElementById('client_nome').value || 'cliente';
    const opt = {
        margin: [0.5, 0.5, 0.5, 0.5],
        filename: `proposta-${client.toLowerCase().replace(/ /g, '-')}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 3, useCORS: true, letterRendering: true },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    };
    
    document.body.classList.add('is-generating');
    html2pdf().set(opt).from(element).save().then(() => {
        document.body.classList.remove('is-generating');
    });
}

function sendWhatsapp() {
    const prof = document.getElementById('prof_nome').value || 'Seu Nome';
    const client = document.getElementById('client_nome').value || 'Cliente';
    const total = document.getElementById('prev_total').innerText;
    const msg = `Olá *${client}*,\n\nSegue a proposta comercial conforme conversamos. O valor total do investimento é *${total}*.\n\nAguardo seu retorno para darmos o próximo passo.\n\nAtenciosamente,\n*${prof}*`;
    const url = "https://wa.me/?text=" + encodeURIComponent(msg);
    window.open(url, '_blank');
}

window.onload = () => {
    const saved = localStorage.getItem('gerador_v2_profile');
    if (saved) {
        const data = JSON.parse(saved);
        document.getElementById('prof_nome').value = data.prof_nome || '';
        document.getElementById('prof_tel').value = data.prof_tel || '';
        document.getElementById('obs').value = data.obs || '';
    }
    renderItems();
    
    // Show dock after a short delay
    setTimeout(() => {
        const dock = document.querySelector('.dock-actions');
        dock.style.opacity = '1';
        dock.style.transform = 'translateX(-50%) translateY(0)';
    }, 1000);
};
</script>

<style>
/* Refined form sections */
.form-section {
    background: white;
    padding: 1.5rem;
    border-radius: var(--radius);
    border: 1px solid var(--border);
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .proposal-box {
        padding: 2rem 1rem !important;
        font-size: 12px;
    }
    .proposal-title { font-size: 1.5rem; }
    .dock-actions { 
        width: 90%; 
        justify-content: space-between;
        bottom: 1rem;
    }
}
</style>
