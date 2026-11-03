<?php

use App\Models\Router\Routes;
use Setting\Route\Functions\TheFunction;

//==================================================================================================//MAIN
Routes::get('/', 'on_Main');
//==================================================================================================//STOCKS
Routes::get('/stocks', 'on_Stocks');
//==================================================================================================//CONTACT
Routes::get('/contact', 'on_Contact');
//==================================================================================================//ABOUT
Routes::get('/about', 'on_About');
//==================================================================================================//OTHER
Routes::get('/other', 'on_Other');
//==================================================================================================//REVIEWS
Routes::get('/reviews', 'on_Reviews');
Routes::get('/reviews/qr', function() { Routes::auto_element(dirname(__DIR__, 2) . "/public/pages/reviews/qr.php", get_defined_vars()); });
//==================================================================================================//REVIEWS
Routes::get('/portfolio', 'on_Portfolio');
//==================================================================================================//SERVICE INDEX
Routes::get('/services', function() { Routes::auto_element(dirname(__DIR__, 2) . "/public/pages/services/index.php", get_defined_vars()); });
//==================================================================================================//VACANCIES (раньше /services/{name}, иначе /services/vakansii уйдёт в несуществующую услугу)
Routes::get('/services/vakansii', function () {
    header('Location: /vakansii', true, 301);
    exit;
});
Routes::get('/services/vakansii/{slug}', function ($slug) {
    header('Location: /vakansii/' . rawurlencode((string) $slug), true, 301);
    exit;
});
//==================================================================================================//SERVICE
// Опечатка nowostroyka → правильное novostroyka (301, чтобы не плодить дубль)
Routes::get('/services/nowostroyka', function () {
    header('Location: /services/novostroyka', true, 301);
    exit;
});
// Транслит й→y: dizajn → dizayn (301, единая схема ЧПУ)
Routes::get('/services/dizajn-interierov', function () {
    header('Location: /services/dizayn-interierov', true, 301);
    exit;
});
Routes::get('/services/{name}', function($name) { Routes::auto_element(dirname(__DIR__, 2) . "/public/pages/services/{$name}/index.php", get_defined_vars()); });
//==================================================================================================//PRICES
Routes::get('/prices', 'on_Prices');
//==================================================================================================//BLOG
Routes::get('/blogs', 'on_Blog');
Routes::get('/blog', function() {
    // Дубль /blog → каноникал /blogs, делаем 301 чтобы не плодить дубликат
    header('Location: /blogs', true, 301);
    exit;
});
//==================================================================================================//BLOG ARTICLE (короткое ЧПУ: /blog/{slug})
Routes::get('/blog/{slug}', function ($slug) {
    Routes::auto_element(dirname(__DIR__, 2) . '/public/pages/blog/article/index.php', ['slug' => $slug]);
});
//==================================================================================================//BLOG ARTICLE (короткое ЧПУ: /blog/{slug}; старые /blog/article/* отдают 404 — редиректов нет)
//==================================================================================================//CALCULATOR
Routes::get('/calculator', 'on_Calculator');
//==================================================================================================//AREA CALCULATOR (SEO)
Routes::get('/kalkulyator-ploshchadi', 'on_AreaCalculator');
//==================================================================================================//SEARCH (поиск по сайту: закрывает SearchAction в schema и opensearch.xml — раньше был 404)
Routes::get('/search', function() { Routes::auto_element(dirname(__DIR__, 2) . "/public/pages/search/index.php", get_defined_vars()); });
//==================================================================================================//LEGAL / CONSENT
Routes::get('/soglashenie', 'on_Soglashenie');
Routes::get('/privacy-policy', 'on_Soglashenie');
//==================================================================================================//SMETA SAMPLE (SEO)
Routes::get('/smeta-obrazec', 'on_Smeta');
//==================================================================================================//DOGOVOR TEMPLATE (SEO)
Routes::get('/dogovor-obrazec', 'on_Dogovor');
//==================================================================================================//Отправка письма
Routes::post('/send/email', [TheFunction::class, 'sendMail']);
//==================================================================================================//SITEMAP INDEX + ПОД-КАРТЫ (SEO)
Routes::get('/sitemap.xml', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\Sitemap::outputIndex();
});
Routes::get('/sitemap-pages.xml', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\Sitemap::outputPages();
});
Routes::get('/sitemap-services.xml', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\Sitemap::outputServices();
});
Routes::get('/sitemap-blog.xml', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\Sitemap::outputBlog();
});
//==================================================================================================//YML FEED (Яндекс.Бизнес)
Routes::get('/yml.xml', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\YmlFeed::output();
});
//==================================================================================================//RSS FEED (SEO)
Routes::get('/rss.xml', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\RssFeed::output();
});
//==================================================================================================//TURBO FEED (Яндекс Турбо-страницы)
Routes::get('/turbo.xml', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\TurboFeed::output();
});
//==================================================================================================//PAGES LIST
Routes::get('/pages', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    Setting\Route\Functions\UrlList::output();
});
//==================================================================================================//INDEXNOW KEY
Routes::get('/769e1df8217a98f76286a4d39b571085.txt', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    header('Content-Type: text/plain; charset=utf-8');
    readfile(dirname(__DIR__, 2) . '/public/769e1df8217a98f76286a4d39b571085.txt');
});
//==================================================================================================//LLMS.TXT (AI)
Routes::get('/llms.txt', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    header('Content-Type: text/plain; charset=utf-8');
    readfile(dirname(__DIR__, 2) . '/public/llms.txt');
});
//==================================================================================================//LLMS-FULL.TXT (AI)
Routes::get('/llms-full.txt', function () {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    header('Content-Type: text/plain; charset=utf-8');
    readfile(dirname(__DIR__, 2) . '/public/llms-full.txt');
});

Routes::get('/opensearch.xml', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: application/opensearchdescription+xml; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/opensearch.xml');
});
//==================================================================================================//AGENTS.JSON (AI-агенты)
Routes::get('/.well-known/agents.json', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: application/json; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/.well-known/agents.json');
});
//==================================================================================================//SECURITY.TXT (RFC 9116)
Routes::get('/.well-known/security.txt', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: text/plain; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/.well-known/security.txt');
});
//==================================================================================================//AI DISCOVERY (ai-check: ai-plugin, openapi, api-catalog, agent-skills)
Routes::get('/ai-plugin.json', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: application/json; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/ai-plugin.json');
});
Routes::get('/openapi.yaml', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: text/yaml; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/openapi.yaml');
});
Routes::get('/.well-known/api-catalog', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: application/linkset+json');
	readfile(dirname(__DIR__, 2) . '/public/.well-known/api-catalog');
});
Routes::get('/.well-known/agent-skills/index.json', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: application/json; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/.well-known/agent-skills/index.json');
});
Routes::get('/.well-known/agent-skills/site-search/SKILL.md', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: text/markdown; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/.well-known/agent-skills/site-search/SKILL.md');
});
Routes::get('/.well-known/agent-skills/price-lookup/SKILL.md', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: text/markdown; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/.well-known/agent-skills/price-lookup/SKILL.md');
});
//==================================================================================================//MCP (Model Context Protocol: server-card + JSON-RPC endpoint)
Routes::get('/.well-known/mcp/server-card.json', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: application/json; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/.well-known/mcp/server-card.json');
});
Routes::post('/mcp', [\Setting\Route\Functions\McpServer::class, 'handle']);
Routes::get('/mcp', function() {
	http_response_code(405);
	header('Allow: POST');
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode(['error' => 'Use POST with JSON-RPC 2.0'], JSON_UNESCAPED_UNICODE);
});

Routes::get('/robots.txt', function() {
	\Setting\Route\Functions\SecurityHeaders::sendSecurity();
	header('Content-Type: text/plain; charset=utf-8');
	include_once 'public/robots.php';
});
// IndexNow авто-пуш: ручной POST /indexnow + автоматический GET /indexnow (по mtime)
$indexNowKey = '769e1df8217a98f76286a4d39b571085';
$indexNowStateFile = sys_get_temp_dir() . '/pkvartira-indexnow-state.json';
$indexNowHost = parse_url((new Setting\Route\Functions\TheFunction())->site()['baseUrl'], PHP_URL_HOST);
$indexNowKeyLocation = "https://{$indexNowHost}/{$indexNowKey}.txt";

// Функция: собрать все публичные URL проекта с их mtime
function indexNowCollectUrls(): array {
    $root = dirname(__DIR__, 2);
    $urls = [];

    // 1. Статические страницы (routes.php + шаблоны)
    $staticPages = [
        '/' => 'public/index.php',
        '/about' => 'public/pages/about/index.php',
        '/contact' => 'public/pages/contact/index.php',
        '/stocks' => 'public/pages/stocks/index.php',
        '/portfolio' => 'public/pages/portfolio/index.php',
        '/reviews' => 'public/pages/reviews/index.php',
        '/prices' => 'public/pages/prices/index.php',
        '/calculator' => 'public/pages/calculator/index.php',
        '/kalkulyator-ploshchadi' => 'public/pages/kalkulyator-ploshchadi/index.php',
        '/services' => 'public/pages/services/index.php',
        '/blogs' => 'public/pages/blog/index.php',
        '/blogs/pilar-remont-kvartir' => 'public/pages/blog/pilar-remont-kvartir/index.php',
        '/author' => 'public/pages/author/index.php',
        '/search' => 'public/pages/search/index.php',
        '/soglashenie' => 'public/pages/soglashenie/index.php',
        '/smeta-obrazec' => 'public/pages/smeta-obrazec/index.php',
        '/dogovor-obrazec' => 'public/pages/dogovor-obrazec/index.php',
    ];
    foreach ($staticPages as $route => $file) {
        $full = $root . '/' . $file;
        if (is_file($full)) {
            $urls[$route] = filemtime($full);
        }
    }

    // 2. Сервисные страницы (сканируем директории)
    $servicesDir = $root . '/public/pages/services';
    if (is_dir($servicesDir)) {
        foreach (scandir($servicesDir) as $item) {
            if ($item === '.' || $item === '..' || $item === 'index.php') continue;
            $indexFile = $servicesDir . '/' . $item . '/index.php';
            if (is_file($indexFile)) {
                $urls['/services/' . $item] = filemtime($indexFile);
            }
        }
    }

    // 3. Статьи блога (articles.json + content/{id}.php)
    $articlesFile = $root . '/public/pages/blog/data/articles.json';
    if (is_file($articlesFile)) {
        $articles = json_decode(file_get_contents($articlesFile), true);
        if (is_array($articles)) {
            foreach ($articles as $art) {
                $slug = $art['slug'] ?? $art['id'] ?? '';
                if ($slug) {
                    $route = '/blog/' . $slug;
                    // mtime = max(articles.json, content/{id}.php)
                    $mtime = filemtime($articlesFile);
                    $contentFile = $root . '/public/pages/blog/article/content/' . ((int)($art['id'] ?? 0)) . '.php';
                    if (is_file($contentFile)) {
                        $mtime = max($mtime, filemtime($contentFile));
                    }
                    $urls[$route] = $mtime;
                }
            }
        }
    }

    // 4. Вакансии
    $vacanciesFile = $root . '/public/pages/vakansii/vacancies.json';
    if (is_file($vacanciesFile)) {
        $vacancies = json_decode(file_get_contents($vacanciesFile), true);
        if (is_array($vacancies)) {
            foreach ($vacancies as $vac) {
                $slug = $vac['slug'] ?? '';
                if ($slug) {
                    $urls['/vakansii/' . $slug] = filemtime($vacanciesFile);
                }
            }
        }
    }

    // 5. Портфолио проекты
    $portfolioFile = $root . '/public/data/portfolio.php';
    if (is_file($portfolioFile)) {
        $portfolio = require $portfolioFile;
        if (is_array($portfolio)) {
            foreach ($portfolio as $proj) {
                $slug = $proj['slug'] ?? '';
                if ($slug) {
                    $urls['/portfolio?project=' . urlencode($slug)] = filemtime($portfolioFile);
                }
            }
        }
    }

    return $urls;
}

// Функция: отправить URLs в IndexNow
function indexNowSend(array $urls, string $key, string $keyLocation): array {
    $results = [];
    $ch = curl_init();
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 10]);
    foreach ($urls as $url) {
        $fullUrl = "https://api.indexnow.org/indexnow?url=" . urlencode($url) . "&key=" . $key . "&keyLocation=" . urlencode($keyLocation);
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        $resp = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $results[] = ['url' => $url, 'status' => $code];
        // throttle чтобы не получить 429
        usleep(100000);
    }
    curl_close($ch);
    return $results;
}

// GET /indexnow — автоматическая проверка по mtime (с визуальным интерфейсом)
Routes::get('/indexnow', function() use ($indexNowKey, $indexNowStateFile, $indexNowKeyLocation) {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    
    // Определяем формат ответа: HTML для браузеров, JSON для API
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    $wantsHtml = strpos($accept, 'text/html') !== false || (isset($_GET['format']) && $_GET['format'] === 'html');
    
    $allUrls = indexNowCollectUrls();
    
    if (!$allUrls) {
        $response = ['ok' => true, 'message' => 'Нет URL для проверки', 'sent' => []];
        if ($wantsHtml) {
            echo indexNowHtmlResponse($response, 0, 0, []);
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        return;
    }

    // Загружаем состояние последнего успешного пуша
    $state = [];
    if (is_file($indexNowStateFile)) {
        $state = json_decode(file_get_contents($indexNowStateFile), true) ?: [];
    }

    $now = time();
    $toSend = [];
    foreach ($allUrls as $route => $mtime) {
        $lastSent = $state[$route] ?? 0;
        if ($mtime > $lastSent) {
            $toSend[] = [
                'route' => $route,
                'url' => 'https://' . parse_url((new Setting\Route\Functions\TheFunction())->site()['baseUrl'], PHP_URL_HOST) . $route,
                'modified' => $mtime,
                'lastSent' => $lastSent,
            ];
        }
    }

    if (!$toSend) {
        $response = [
            'ok' => true,
            'message' => 'Нет новых изменений — все URL актуальны',
            'checked' => count($allUrls),
            'sent' => []
        ];
        if ($wantsHtml) {
            echo indexNowHtmlResponse($response, count($allUrls), 0, $allUrls, $state);
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        return;
    }

    $results = indexNowSend(array_column($toSend, 'url'), $indexNowKey, $indexNowKeyLocation);

    // Обновляем состояние только для успешно отправленных (2xx)
    foreach ($results as $i => $r) {
        if ($r['status'] >= 200 && $r['status'] < 300) {
            $route = parse_url($r['url'], PHP_URL_PATH);
            $state[$route] = $now;
        }
        // Добавляем статус в toSend для отображения
        $toSend[$i]['status'] = $r['status'];
        $toSend[$i]['success'] = ($r['status'] >= 200 && $r['status'] < 300);
    }
    file_put_contents($indexNowStateFile, json_encode($state));

    $sentUrls = array_filter($results, fn($r) => $r['status'] >= 200 && $r['status'] < 300);
    $response = [
        'ok' => true,
        'message' => 'Автоматический IndexNow пуш завершён',
        'checked' => count($allUrls),
        'sent_count' => count($sentUrls),
        'sent' => array_values(array_map(fn($r) => ['url' => $r['url'], 'status' => $r['status']], $sentUrls))
    ];

    if ($wantsHtml) {
        echo indexNowHtmlResponse($response, count($allUrls), count($sentUrls), $toSend, $state);
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
});

// HTML визуальный интерфейс для IndexNow
function indexNowHtmlResponse(array $response, int $checked, int $sentCount, array $details = [], array $state = []): void
{
    $site = (new Setting\Route\Functions\TheFunction())->site();
    $baseUrl = $site['baseUrl'];
    $brand = $site['name'] ?? 'Проект Квартира';
    $shortBrand = $site['shortName'] ?? 'Проект Квартира';
    $now = date('d.m.Y H:i:s');
    $ok = $response['ok'] ?? true;
    $message = $response['message'] ?? '';
    $sent = $response['sent'] ?? [];
    $sentCount = $response['sent_count'] ?? $sentCount;
    $checked = $response['checked'] ?? $checked;
    
    // Статус для цветов
    $statusClass = $ok ? 'success' : 'error';
    $statusIcon = $ok ? '✅' : '❌';
    $statusText = $ok ? 'Успешно' : 'Ошибка';
    
    // CSS
    $css = <<<CSS
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; 
            background: #f8f9fa; 
            color: #1a1a2e; 
            line-height: 1.6; 
            min-height: 100vh; 
            padding: 20px; 
        }
        .container { 
            max-width: 900px; 
            margin: 0 auto; 
            background: #fff; 
            border-radius: 12px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.08); 
            overflow: hidden; 
        }
        .header { 
            background: linear-gradient(135deg, #eab308 0%, #f59e0b 100%); 
            color: #1a1a2e; 
            padding: 32px; 
            text-align: center; 
        }
        .header h1 { font-size: 28px; font-weight: 700; margin-bottom: 8px; }
        .header .subtitle { font-size: 14px; opacity: 0.8; }
        .status-badge { 
            display: inline-flex; 
            align-items: center; 
            gap: 8px; 
            padding: 8px 16px; 
            border-radius: 50px; 
            font-weight: 600; 
            font-size: 14px; 
            margin-top: 16px; 
        }
        .status-badge.success { background: #dcfce7; color: #166534; }
        .status-badge.error { background: #fee2e2; color: #991b1b; }
        .content { padding: 32px; }
        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); 
            gap: 16px; 
            margin-bottom: 32px; 
        }
        .stat-card { 
            background: #f8f9fa; 
            border: 1px solid #e9ecef; 
            border-radius: 10px; 
            padding: 20px; 
            text-align: center; 
            transition: transform 0.2s, box-shadow 0.2s; 
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .stat-value { font-size: 36px; font-weight: 700; color: #1a1a2e; line-height: 1; margin-bottom: 4px; }
        .stat-label { font-size: 13px; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-card.sent .stat-value { color: #16a34a; }
        .stat-card.checked .stat-value { color: #2563eb; }
        .stat-card.failed .stat-value { color: #dc2626; }
        .message-box { 
            padding: 16px 20px; 
            border-radius: 8px; 
            margin-bottom: 24px; 
            font-size: 15px; 
            display: flex; 
            align-items: center; 
            gap: 12px; 
        }
        .message-box.success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
        .message-box.error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .message-box.info { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; }
        .section-title { 
            font-size: 18px; 
            font-weight: 600; 
            margin-bottom: 16px; 
            padding-bottom: 8px; 
            border-bottom: 2px solid #eab308; 
            display: flex; 
            align-items: center; 
            gap: 8px; 
        }
        .table-container { overflow-x: auto; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { padding: 12px 14px; text-align: left; border-bottom: 1px solid #e9ecef; }
        th { background: #f8f9fa; font-weight: 600; color: #495057; white-space: nowrap; }
        tr:hover td { background: #fafbfc; }
        .url-cell { max-width: 350px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-family: monospace; font-size: 12px; }
        .badge { 
            display: inline-flex; 
            align-items: center; 
            gap: 4px; 
            padding: 4px 10px; 
            border-radius: 4px; 
            font-size: 11px; 
            font-weight: 600; 
            text-transform: uppercase; 
        }
        .badge.success { background: #dcfce7; color: #166534; }
        .badge.error { background: #fee2e2; color: #991b1b; }
        .badge.pending { background: #fef3c7; color: #92400e; }
        .badge.skipped { background: #f3f4f6; color: #6b7280; }
        .footer { 
            text-align: center; 
            padding: 20px 32px; 
            background: #f8f9fa; 
            border-top: 1px solid #e9ecef; 
            color: #6c757d; 
            font-size: 13px; 
        }
        .footer a { color: #eab308; text-decoration: none; font-weight: 500; }
        .footer a:hover { text-decoration: underline; }
        .empty-state { text-align: center; padding: 40px 20px; color: #6c757d; }
        .empty-state svg { width: 64px; height: 64px; margin-bottom: 16px; opacity: 0.5; }
        .toggle-json { 
            display: block; 
            text-align: center; 
            margin-top: 24px; 
            padding: 12px; 
            background: #f8f9fa; 
            border: 1px dashed #dee2e6; 
            border-radius: 8px; 
            color: #6c757d; 
            font-size: 13px; 
            text-decoration: none; 
        }
        .toggle-json:hover { background: #e9ecef; color: #495057; }
        @media (max-width: 640px) {
            .container { margin: 0; border-radius: 0; min-height: 100vh; }
            .header h1 { font-size: 22px; }
            .stat-value { font-size: 28px; }
            th, td { padding: 10px 8px; font-size: 12px; }
        }
    </style>
CSS;

    // Начало HTML
    echo '<!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>IndexNow — ' . htmlspecialchars($brand) . '</title>' . $css . '</head><body>';
    echo '<div class="container">';
    
    // Header
    echo '<header class="header">';
    echo '<h1>📡 IndexNow</h1>';
    echo '<div class="subtitle">Автоматическая отправка изменений в поисковые системы</div>';
    echo '<div class="status-badge ' . $statusClass . '">' . $statusIcon . ' ' . $statusText . '</div>';
    echo '</header>';
    
    // Content
    echo '<div class="content">';
    
    // Message
    $msgClass = $ok ? ($sentCount > 0 ? 'success' : 'info') : 'error';
    $msgIcon = $ok ? ($sentCount > 0 ? '✅' : 'ℹ️') : '❌';
    echo '<div class="message-box ' . $msgClass . '">' . $msgIcon . ' ' . htmlspecialchars($message) . '</div>';
    
    // Stats
    $failed = $checked - $sentCount;
    echo '<div class="stats-grid">';
    echo '<div class="stat-card checked"><div class="stat-value">' . number_format($checked) . '</div><div class="stat-label">Проверено URL</div></div>';
    echo '<div class="stat-card sent"><div class="stat-value">' . number_format($sentCount) . '</div><div class="stat-label">Отправлено</div></div>';
    echo '<div class="stat-card' . ($failed > 0 ? ' failed' : '') . '"><div class="stat-value">' . number_format($failed) . '</div><div class="stat-label">Без изменений / Ошибки</div></div>';
    echo '<div class="stat-card"><div class="stat-value">' . date('H:i:s') . '</div><div class="stat-label">Время выполнения</div></div>';
    echo '</div>';
    
    // Details table
    if (!empty($details)) {
        echo '<h2 class="section-title">📋 Детали отправки</h2>';
        echo '<div class="table-container"><table>';
        echo '<thead><tr><th>URL</th><th>Статус</th><th>Код</th><th>Изменён</th><th>Последний пуш</th></tr></thead><tbody>';
        foreach ($details as $item) {
            $url = $item['url'] ?? ($item['route'] ?? '');
            $status = $item['success'] ?? ($item['status'] >= 200 && $item['status'] < 300 ? true : false);
            $code = $item['status'] ?? ($item['lastSent'] ?? 0);
            $modified = $item['modified'] ?? 0;
            $lastSent = $item['lastSent'] ?? 0;
            
            $badgeClass = $status ? 'success' : 'error';
            $badgeText = $status ? 'Отправлено' : 'Ошибка';
            if ($lastSent > 0 && $modified <= $lastSent) {
                $badgeClass = 'skipped';
                $badgeText = 'Без изменений';
            } elseif ($lastSent === 0 && $modified > 0) {
                $badgeClass = 'pending';
                $badgeText = 'Новый';
            }
            
            echo '<tr>';
            echo '<td class="url-cell">' . htmlspecialchars($url) . '</td>';
            echo '<td><span class="badge ' . $badgeClass . '">' . $badgeText . '</span></td>';
            echo '<td>' . ($code ? '<span style="font-family:monospace;font-size:12px;">' . $code . '</span>' : '—') . '</td>';
            echo '<td>' . ($modified ? date('d.m.Y H:i', $modified) : '—') . '</td>';
            echo '<td>' . ($lastSent ? date('d.m.Y H:i', $lastSent) : '—') . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }
    
    // Footer
    echo '<footer class="footer">';
    echo '<p>IndexNow автоматизирован для <strong>' . htmlspecialchars($brand) . '</strong> — ' . htmlspecialchars($baseUrl) . '</p>';
    echo '<p>Ключ: <code style="background:#f1f3f4;padding:2px 6px;border-radius:4px;font-size:12px;">' . htmlspecialchars(substr($indexNowKey ?? '', 0, 8)) . '***</code> | ';
    echo '<a href="' . htmlspecialchars($baseUrl) . '/indexnow?format=json" target="_blank">JSON API</a> | ';
    echo '<a href="' . htmlspecialchars($baseUrl) . '" target="_blank">На сайт</a></p>';
    echo '<p>Последняя проверка: ' . $now . ' | Кэш: ' . (is_file(sys_get_temp_dir() . '/pkvartira-indexnow-state.json') ? 'активен' : 'пуст') . '</p>';
    echo '</footer>';
    
    echo '</div></body></html>';
}

// POST /indexnow — ручной пуш (как было)
Routes::post('/indexnow', function() use ($indexNowKey, $indexNowKeyLocation) {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    header('Content-Type: application/json; charset=utf-8');
    $input = json_decode(file_get_contents('php://input'), true);
    $urls = $input['urls'] ?? [];
    $host = parse_url((new Setting\Route\Functions\TheFunction())->site()['baseUrl'], PHP_URL_HOST);
    $results = [];
    foreach ($urls as $url) {
        if (strpos($url, $host) !== false) {
            $ch = curl_init("https://api.indexnow.org/indexnow?url=" . urlencode($url) . "&key=" . $indexNowKey . "&keyLocation=https://{$host}/{$indexNowKey}.txt");
            curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 10]);
            $resp = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $results[] = ['url' => $url, 'status' => $code];
        } else {
            $results[] = ['url' => $url, 'status' => 400, 'error' => 'Wrong host'];
        }
    }
    echo json_encode(['results' => $results], JSON_UNESCAPED_UNICODE);
});
//==================================================================================================//VACANCIES (JSON-шаблон: список + поиск + деталка по slug)
Routes::get('/vakansii', function() { Routes::auto_element(dirname(__DIR__, 2) . "/public/pages/vakansii/index.php", get_defined_vars()); });
Routes::get('/vakansii/{slug}', function($slug) { $vacancySlug = $slug; Routes::auto_element(dirname(__DIR__, 2) . "/public/pages/vakansii/detail.php", get_defined_vars()); });