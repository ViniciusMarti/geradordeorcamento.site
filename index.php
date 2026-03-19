<?php
require_once 'includes/functions.php';

$profissoes = load_data('data/profissoes.json');
$cidades = load_data('data/cidades.json');

// Routing logic
$url = $_GET['url'] ?? '';

if ($url == '' || $url == '/') {
    // HOMEPAGE - REFINAÇÃO VISUAL
    $page_title = "Gerador de Orçamento Profissional & Minimalista - Grátis";
    $meta_description = "Gere orçamentos e propostas comerciais impecáveis em segundos. No celular ou PC, a melhor ferramenta para seu negócio.";
    include 'includes/header.php';
    ?>
    <section class="hero container">
        <h1>Propostas que <span style="color: var(--accent);">elevam</span> o seu nível.</h1>
        <p>A ferramenta minimalista que transforma orçamentos em propostas de alto valor em menos de 1 minuto.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; align-items: center; flex-wrap: wrap;">
            <a href="#geradores" class="btn btn-primary">ESCOLHER CATEGORIA</a>
            <a href="#features" class="btn btn-secondary">COMO FUNCIONA?</a>
        </div>
    </section>

    <section id="geradores" style="background: var(--bg-secondary); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
        <div class="container">
            <div style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.25rem; margin-bottom: 1rem;">Selecione sua Profissão</h2>
                <p style="color: var(--text-muted); max-width: 580px; margin: 0 auto; line-height: 1.6;">Otimizamos o layout de cada proposta para as necessidades específicas da sua área de atuação.</p>
            </div>
            <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));">
                <?php 
                $count = 0;
                foreach ($profissoes as $prof): 
                    if ($count < 12):
                        $count++;
                ?>
                <a href="/gerador-de-orcamento-<?php echo $prof['id']; ?>" class="card">
                    <h3><?php echo $prof['nome']; ?></h3>
                    <span>GERAR AGORA &rarr;</span>
                </a>
                <?php 
                    endif;
                endforeach; ?>
            </div>
            <div style="text-align: center; margin-top: 4rem;">
                <p style="color: var(--text-muted); font-size: 0.875rem; font-weight: 500;">Disponível para mais de 50 outras profissões no sistema.</p>
            </div>
        </div>
    </section>

    <section id="features" class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 5rem; align-items: center;">
            <div>
                <h2 style="font-size: 2.5rem; line-height: 1.1; margin-bottom: 1.5rem;">Sua apresentação é o seu cartão de visitas.</h2>
                <p style="color: var(--text-muted); font-size: 1.125rem; margin-bottom: 2.5rem; line-height: 1.7;">Muitos orçamentos são perdidos por falta de clareza e profissionalismo. Nosso design limpo garante que seu cliente entenda o valor real do seu trabalho.</p>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div>
                        <h4 style="font-size: 1.5rem; color: var(--accent);">60s</h4>
                        <p style="font-size: 0.8125rem; text-transform: uppercase; font-weight: 700; color: #999; letter-spacing: 1px;">Tempo Médio</p>
                    </div>
                    <div>
                        <h4 style="font-size: 1.5rem; color: var(--accent);">PDF</h4>
                        <p style="font-size: 0.8125rem; text-transform: uppercase; font-weight: 700; color: #999; letter-spacing: 1px;">Layout d'Elite</p>
                    </div>
                </div>
            </div>
            <div style="background: var(--bg-secondary); border-radius: 1.5rem; padding: 3rem; border: 1px solid var(--border);">
                 <div style="background: white; border-radius: 8px; padding: 2rem; box-shadow: var(--shadow-md); opacity: 0.9;">
                    <div style="height: 1.25rem; width: 80px; background: var(--bg-secondary); margin-bottom: 1.5rem; border-radius: 4px;"></div>
                    <div style="height: 1px; width: 100%; background: var(--border); margin-bottom: 1.5rem;"></div>
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <div style="height: 0.5rem; width: 100%; background: #F9F9F9; border-radius: 4px;"></div>
                        <div style="height: 0.5rem; width: 100%; background: #F9F9F9; border-radius: 4px;"></div>
                        <div style="height: 0.5rem; width: 60%; background: #F9F9F9; border-radius: 4px;"></div>
                    </div>
                    <div style="margin-top: 3rem; text-align: right;">
                        <div style="display: inline-block; height: 1.25rem; width: 100px; background: var(--accent); border-radius: 4px; opacity: 0.2;"></div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
    <?php
    include 'includes/footer.php';

} elseif (preg_match('/^gerador-de-orcamento-(.*)$/', $url, $matches)) {
    // MANUAL GENERATOR PAGE: /gerador-de-orcamento-{profissao}
    $profissao_slug = $matches[1];
    $profissao_atual = null;
    foreach ($profissoes as $p) {
        if ($p['id'] == $profissao_slug) {
            $profissao_atual = $p;
            break;
        }
    }

    if (!$profissao_atual) {
        // Fallback or generic
        $page_title = "Gerador de Orçamento Grátis - Profissional";
    } else {
        $page_title = "Gerador de Orçamento para {$profissao_atual['nome']} - Criar em 1 Minuto";
    }

    $meta_description = "Use nossa ferramenta grátis para criar orçamentos profissionais de {$profissao_atual['nome']}. Exporte para PDF e envie por WhatsApp em menos de 1 minuto.";
    
    include 'includes/header.php';
    include 'templates/tool-interface.php';
    include 'includes/footer.php';

} elseif (preg_match('/^orcamento-(.*)-(.*)-(.*)$/', $url, $matches)) {
    // PROGRAMMATIC PAGE: /orcamento-{profissao}-{cidade}-{estado}
    $profissao_slug = $matches[1];
    $cidade_slug = $matches[2];
    $estado_slug = $matches[3];

    $profissao_atual = null;
    foreach ($profissoes as $p) {
        if ($p['id'] == $profissao_slug) {
            $profissao_atual = $p;
            break;
        }
    }

    $cidade_atual = null;
    foreach ($cidades as $c) {
        if ($c['id'] == $cidade_slug) {
            $cidade_atual = $c;
            break;
        }
    }

    if ($profissao_atual && $cidade_atual) {
        $nome_prof = $profissao_atual['nome'];
        $nome_cidade = $cidade_atual['nome'];
        $uf = $cidade_atual['uf'];

        $page_title = "Orçamento de {$nome_prof} em {$nome_cidade}-{$uf} - Peça Grátis Agora";
        $meta_description = "Procurando por {$nome_prof} em {$nome_cidade}-{$uf}? Peça seu orçamento online agora e receba até 3 propostas de profissionais qualificados hoje.";
        $canonical_url = "https://geradordeorcamento.site/orcamento-{$profissao_slug}-{$cidade_slug}-{$estado_slug}";
        
        $breadcrumbs = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => $nome_cidade, 'url' => null],
            ['name' => $nome_prof, 'url' => null]
        ];

        // Schema.org LocalBusiness + Service
        $schema_json = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "name" => "Serviço de {$nome_prof} em {$nome_cidade}",
            "serviceType" => $nome_prof,
            "areaServed" => [
                "@type" => "City",
                "name" => $nome_cidade
            ],
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Rede Profissional {$nome_cidade}",
                "address" => [
                    "@type" => "PostalAddress",
                    "addressLocality" => $nome_cidade,
                    "addressRegion" => $uf,
                    "addressCountry" => "BR"
                ]
            ]
        ];

        $faqs = get_dynamic_faq($profissao_atual, $cidade_atual);
        $faq_schema = [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => array_map(function($f) {
                return [
                    "@type" => "Question",
                    "name" => $f['q'],
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => $f['a']
                    ]
                ];
            }, $faqs)
        ];

        include 'includes/header.php';
        ?>
        <main>
            <section class="container">
                <h1>Orçamento de <?php echo $nome_prof; ?> em <?php echo $nome_cidade; ?> - <?php echo $uf; ?></h1>
                <p style="font-size: 1.15rem; color: var(--text-muted); margin-bottom: 2.5rem; max-width: 800px;">
                    <?php echo generate_unique_text($profissao_atual, $cidade_atual, $uf, 'intro'); ?>
                </p>

                <div style="display: flex; gap: 3rem; flex-wrap: wrap;">
                    <div style="flex: 2; min-width: 300px;">
                        <section style="margin-bottom: 3rem;">
                            <h2 style="margin-bottom: 1rem; color: var(--text-main);">Quanto custa um <?php echo $nome_prof; ?> em <?php echo $nome_cidade; ?>?</h2>
                            <p>O preço de orçamento para um <strong><?php echo $nome_prof; ?></strong> na região de <strong><?php echo $nome_cidade; ?></strong> pode variar de acordo com o tipo de serviço. Em média, os profissionais cobram <?php echo $profissao_atual['custo_medio']; ?> dependendo da localização e urgência.</p>
                            
                            <h3 style="margin-top: 2rem; margin-bottom: 1rem;">Fatores que influenciam o preço</h3>
                            <ul style="margin-left: 1.5rem; margin-bottom: 2rem;">
                                <li><strong>Complexidade:</strong> Serviços mais complexos ou que exigem ferramentas especiais tendem a ser mais caros.</li>
                                <li><strong>Localização em <?php echo $nome_cidade; ?>:</strong> O custo do deslocamento pode ser adicionado se o profissional morar longe.</li>
                                <li><strong>Experiência:</strong> O currículo do <?php echo $nome_prof; ?> faz diferença no valor final da diária ou do serviço.</li>
                                <li><strong>Materiais:</strong> Verifique se a cotação inclui as peças de reposição.</li>
                            </ul>

                            <h2 style="margin-bottom: 1rem; color: var(--text-main);">Como escolher um bom profissional</h2>
                            <p><?php echo generate_unique_text($profissao_atual, $cidade_atual, $uf, 'how_to_choose'); ?></p>

                            <h2 style="margin-top: 2.5rem; margin-bottom: 1rem; color: var(--text-main);">Dicas para economizar</h2>
                            <p><?php echo generate_unique_text($profissao_atual, $cidade_atual, $uf, 'saving_tips'); ?></p>
                        </section>

                        <section class="faq-section">
                            <h2 style="margin-bottom: 2rem;">Principais dúvidas sobre <?php echo $nome_prof; ?> em <?php echo $nome_cidade; ?></h2>
                            <?php foreach ($faqs as $faq): ?>
                            <div class="faq-item">
                                <h4><?php echo $faq['q']; ?></h4>
                                <p><?php echo $faq['a']; ?></p>
                            </div>
                            <?php endforeach; ?>
                        </section>
                    </div>

                    <div style="flex: 1; min-width: 300px;">
                        <div style="position: sticky; top: 2rem;">
                            <?php include 'includes/form.php'; ?>
                            
                            <div style="margin-top: 2rem; background: #fff; padding: 1.5rem; border-radius: var(--radius); border: 1px solid var(--border);">
                                <h4 style="margin-bottom: 1rem;">Outras cidades no <?php echo $uf; ?></h4>
                                <ul style="list-style: none;">
                                    <?php 
                                    $count = 0;
                                    foreach ($cidades as $c): 
                                        if ($c['uf'] == $uf && $c['id'] != $cidade_slug && $count < 5):
                                            $count++;
                                    ?>
                                    <li><a href="/orcamento-<?php echo $profissao_slug; ?>-<?php echo $c['id']; ?>-<?php echo strtolower($c['uf']); ?>" style="text-decoration: none; color: var(--primary); display: block; margin-bottom: 0.5rem; font-size: 0.95rem;">
                                        &bull; <?php echo $nome_prof; ?> em <?php echo $c['nome']; ?>
                                    </a></li>
                                    <?php 
                                        endif;
                                    endforeach; ?>
                                </ul>
                            </div>

                            <div style="margin-top: 1.5rem; background: #fff; padding: 1.5rem; border-radius: var(--radius); border: 1px solid var(--border);">
                                <h4 style="margin-bottom: 1rem;">Outros serviços em <?php echo $nome_cidade; ?></h4>
                                <ul style="list-style: none;">
                                    <?php 
                                    $count = 0;
                                    foreach ($profissoes as $p): 
                                        if ($p['id'] != $profissao_slug && $count < 5):
                                            $count++;
                                    ?>
                                    <li><a href="/orcamento-<?php echo $p['id']; ?>-<?php echo $cidade_slug; ?>-<?php echo strtolower($uf); ?>" style="text-decoration: none; color: var(--primary); display: block; margin-bottom: 0.5rem; font-size: 0.95rem;">
                                        &bull; <?php echo $p['nome']; ?> em <?php echo $nome_cidade; ?>
                                    </a></li>
                                    <?php 
                                        endif;
                                    endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.php';
    } else {
        // Page not found
        header("HTTP/1.0 404 Not Found");
        include 'includes/header.php';
        echo "<div class='container' style='padding: 5rem 0; text-align: center;'><h1>Página não encontrada</h1><p>Desculpe, a página que você procura não existe.</p><a href='/' class='btn'>Voltar para Home</a></div>";
        include 'includes/footer.php';
    }
} else {
    // Other pages or 404
    header("HTTP/1.0 404 Not Found");
    include 'includes/header.php';
    echo "<div class='container' style='padding: 5rem 0; text-align: center;'><h1>Página não encontrada</h1><p>Desculpe, a página que você procura não existe.</p><a href='/' class='btn'>Voltar para Home</a></div>";
    include 'includes/footer.php';
}
?>
