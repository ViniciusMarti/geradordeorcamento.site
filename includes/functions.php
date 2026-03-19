<?php
function load_data($filename) {
    if (!file_exists($filename)) return [];
    return json_decode(file_get_contents($filename), true);
}

function slugify($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) return 'n-a';
    return $text;
}

function generate_unique_text($profession, $city, $state, $type) {
    $variants = [
        'intro' => [
            "Solicite hoje mesmo o seu orçamento de {$profession['nome']} em {$city['nome']}-{$state}. Trabalhamos com os melhores profissionais da região para garantir qualidade e preço justo.",
            "Encontrar um bom {$profession['nome']} em {$city['nome']} ({$state}) nem sempre é fácil. Por isso, conectamos você aos especialistas mais qualificados da sua cidade.",
            "Precisa de serviços de {$profession['nome']} em {$city['nome']}? Nossa plataforma ajuda você a obter propostas rápidas de profissionais avaliados no {$state}."
        ],
        'how_to_choose' => [
            "Para escolher um bom {$profession['nome']} em {$city['nome']}, verifique sempre as avaliações de outros clientes e peça referências de trabalhos anteriores.",
            "A segurança é fundamental. Ao contratar um {$profession['nome']} no {$state}, certifique-se de que o profissional possui as certificações necessárias para o serviço.",
            "Sempre compare orçamentos. Em {$city['nome']}, os preços de {$profession['nome']} podem variar dependendo da complexidade do projeto."
        ],
        'saving_tips' => [
            "Para economizar no serviço de {$profession['nome']} em {$city['nome']}, tente agendar com antecedência e compre os materiais por conta própria após a consultoria.",
            "Agrupar pequenos reparos em uma única visita do {$profession['nome']} pode reduzir drasticamente o custo do deslocamento em {$city['nome']}.",
            "Peça pelo menos três orçamentos diferentes para o seu projeto em {$state} para garantir que você está pagando um valor justo de mercado."
        ]
    ];

    if (!isset($variants[$type])) return "";
    
    // Simplistic randomization based on city/profession to keep it deterministic but varied
    $index = (strlen($city['nome']) + strlen($profession['nome'])) % count($variants[$type]);
    return $variants[$type][$index];
}

function get_dynamic_faq($profession, $city) {
    return [
        [
            "q" => "Quanto custa contratar um {$profession['nome']} em {$city['nome']}?",
            "a" => "O valor médio para serviços de {$profession['nome']} em {$city['nome']} varia entre {$profession['custo_medio']}, dependendo da complexidade do trabalho e do tempo necessário."
        ],
        [
            "q" => "Como contratar o melhor {$profession['nome']} da região?",
            "a" => "Recomendamos usar nosso formulário de solicitação para receber propostas de profissionais qualificados em {$city['nome']}. Avalie as referências e o portfólio antes de fechar o negócio."
        ],
        [
            "q" => "Qual o tempo médio de execução para um serviço de {$profession['nome']}?",
            "a" => "Em média, os serviços em {$city['nome']} levam cerca de {$profession['tempo_medio']}. Trabalhos maiores podem exigir um cronograma detalhado."
        ],
        [
            "q" => "O material está incluso no orçamento do {$profession['nome']}?",
            "a" => "Geralmente, o valor informado pelo {$profession['nome']} refere-se apenas à mão de obra. No entanto, você pode negociar a inclusão de materiais diretamente com o profissional em {$city['nome']}."
        ],
        [
            "q" => "Vale a pena contratar um profissional especializado em {$city['nome']}?",
            "a" => "Sim, contratar um {$profession['nome']} experiente garante que o serviço seja feito dentro das normas de segurança, evitando gastos extras com reparos futuros em sua residência ou empresa."
        ]
    ];
}
?>
