<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? "Gerador de Orçamentos Online - Profissional & Minimalista"; ?></title>
    <meta name="description" content="<?php echo $meta_description ?? "Gere orçamentos profissionais, elegantes e minimalistas em menos de 1 minuto. Exporte para PDF e encante seus clientes."; ?>">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <?php if (isset($canonical_url)): ?>
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    <?php endif; ?>

    <?php if (isset($schema_json)): ?>
    <script type="application/ld+json">
    <?php echo json_encode($schema_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>
    <?php endif; ?>
</head>
<body>
    <header>
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <a href="/" class="logo">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--accent);"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                <span>gerador d'orçamento</span>
            </a>
            <nav class="nav-links">
                <a href="#geradores" class="nav-link">Profissões</a>
                <a href="/gerador-de-orcamento-eletricista" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.75rem;">CRIAR AGORA</a>
            </nav>
        </div>
    </header>
    <?php if (isset($breadcrumbs) && $breadcrumbs): ?>
    <div class="container" style="margin-top: 1rem;">
        <nav class="breadcrumbs" aria-label="Breadcrumb" style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            <ol style="list-style: none; display: flex; gap: 0.5rem; padding: 0;">
                <?php foreach ($breadcrumbs as $index => $crumb): ?>
                    <li>
                        <?php if ($index > 0): ?> <span style="margin-right: 0.5rem; opacity: 0.3;">/</span> <?php endif; ?>
                        <?php if ($crumb['url']): ?>
                            <a href="<?php echo $crumb['url']; ?>" style="color: inherit; text-decoration: none;"><?php echo $crumb['name']; ?></a>
                        <?php else: ?>
                            <span style="color: var(--text-main); font-weight: 600;"><?php echo $crumb['name']; ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    </div>
    <?php endif; ?>
