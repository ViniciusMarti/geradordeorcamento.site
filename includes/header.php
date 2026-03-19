<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? "Gerador de Orçamentos Online para Serviços em Todo o Brasil"; ?></title>
    <meta name="description" content="<?php echo $meta_description ?? "Solicite orçamentos grátis de profissionais qualificados em todo o Brasil. Encontre eletricistas, pintores, encanadores e muito mais em sua cidade."; ?>">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    
    <?php if (isset($canonical_url)): ?>
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    <?php endif; ?>

    <?php if (isset($schema_json)): ?>
    <script type="application/ld+json">
    <?php echo json_encode($schema_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>
    <?php endif; ?>

    <?php if (isset($faq_schema)): ?>
    <script type="application/ld+json">
    <?php echo json_encode($faq_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>
    <?php endif; ?>
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="logo">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                Gerador de Orçamento
            </a>
        </div>
    </header>
    <div class="container">
        <?php if (isset($breadcrumbs)): ?>
        <nav class="breadcrumbs" aria-label="Breadcrumb" style="margin-top: 1rem; color: var(--text-muted); font-size: 0.875rem;">
            <ol style="list-style: none; display: flex; gap: 0.5rem; padding: 0;">
                <?php foreach ($breadcrumbs as $index => $crumb): ?>
                    <li>
                        <?php if ($index > 0): ?> <span style="margin-right: 0.5rem;">/</span> <?php endif; ?>
                        <?php if ($crumb['url']): ?>
                            <a href="<?php echo $crumb['url']; ?>" style="color: inherit; text-decoration: none;"><?php echo $crumb['name']; ?></a>
                        <?php else: ?>
                            <span><?php echo $crumb['name']; ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
        <?php endif; ?>
    </div>
