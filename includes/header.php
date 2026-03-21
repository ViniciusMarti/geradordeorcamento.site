<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J4KW8K21TS"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-J4KW8K21TS');
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png?v=2.0">
    <link rel="apple-touch-icon" href="/assets/images/favicon.png?v=2.0">
    <title><?php echo $page_title ?? "Gerador de Orçamento - Profissional & Gratuito"; ?></title>
    <meta name="description" content="<?php echo $meta_description ?? "Crie orçamentos profissionais, elegantes e minimalistas em menos de 1 minuto. Exporte para PDF e encante seus clientes."; ?>">
    <link rel="stylesheet" href="/assets/css/style.css?v=2.0">
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
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--accent);"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                <span>Gerador de Orçamento</span>
            </a>
            <nav style="display: flex; gap: 2rem; align-items: center;">
                <a href="/#geradores" style="text-decoration:none; color:var(--text-muted); font-size:1rem; font-weight:600;">Profissões</a>
                <a href="/gerador-de-orcamento-eletricista" class="btn btn-primary" style="padding: 0.6rem 1.25rem; font-size: 0.8125rem;">CRIAR AGORA</a>
            </nav>
        </div>
    </header>
    <?php if (isset($breadcrumbs) && $breadcrumbs): ?>
    <div class="container" style="margin-top: 1.5rem;">
        <nav aria-label="Breadcrumb" style="color: var(--text-muted); font-size: 0.8125rem; font-weight: 500;">
            <ol style="list-style: none; display: flex; gap: 0.5rem; padding: 0;">
                <?php foreach ($breadcrumbs as $index => $crumb): ?>
                    <li>
                        <?php if ($index > 0): ?> <span style="margin-right: 0.5rem; opacity: 0.5;">/</span> <?php endif; ?>
                        <?php if ($crumb['url']): ?>
                            <a href="<?php echo $crumb['url']; ?>" style="color: inherit; text-decoration: none;"><?php echo $crumb['name']; ?></a>
                        <?php else: ?>
                            <span style="color: var(--text-main); font-weight: 700;"><?php echo $crumb['name']; ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    </div>
    <?php endif; ?>
