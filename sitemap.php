<?php
require_once 'includes/functions.php';

$profissoes = load_data('data/profissoes.json');
$cidades = load_data('data/cidades.json');

$base_url = "https://geradordeorcamento.site";

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

// Home
echo '  <url>' . PHP_EOL;
echo '    <loc>' . $base_url . '/</loc>' . PHP_EOL;
echo '    <changefreq>daily</changefreq>' . PHP_EOL;
echo '    <priority>1.0</priority>' . PHP_EOL;
echo '  </url>' . PHP_EOL;

// All combinations
foreach ($profissoes as $prof) {
    foreach ($cidades as $city) {
        $url = $base_url . "/orcamento-" . $prof['id'] . "-" . $city['id'] . "-" . strtolower($city['uf']);
        echo '  <url>' . PHP_EOL;
        echo '    <loc>' . $url . '</loc>' . PHP_EOL;
        echo '    <changefreq>weekly</changefreq>' . PHP_EOL;
        echo '    <priority>0.8</priority>' . PHP_EOL;
        echo '  </url>' . PHP_EOL;
    }
}

echo '</urlset>';
?>
