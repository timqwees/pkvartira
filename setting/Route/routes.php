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
        // Подготовить детали для HTML: все URL с их статусами
        $htmlDetails = [];
        foreach ($allUrls as $route => $mtime) {
            $lastSent = $state[$route] ?? 0;
            $htmlDetails[] = [
                'route' => $route,
                'url' => 'https://' . parse_url((new Setting\Route\Functions\TheFunction())->site()['baseUrl'], PHP_URL_HOST) . $route,
                'modified' => $mtime,
                'lastSent' => $lastSent,
                'status' => 0,
                'success' => false,
                'skipped' => true,
            ];
        }
        
        $response = [
            'ok' => true,
            'message' => 'Нет новых изменений — все URL актуальны',
            'checked' => count($allUrls),
            'sent' => []
        ];
        if ($wantsHtml) {
            echo indexNowHtmlResponse($response, count($allUrls), 0, $htmlDetails, $state, $indexNowKey);
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
        echo indexNowHtmlResponse($response, count($allUrls), count($sentUrls), $toSend, $state, $indexNowKey);
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
});

// HTML визуальный интерфейс для IndexNow
function indexNowHtmlResponse(array $response, int $checked, int $sentCount, array $details = [], array $state = [], string $indexNowKey = ''): void
{
    $site = (new Setting\Route\Functions\TheFunction())->site();
    $baseUrl = $site['baseUrl'];
    $brand = $site['name'] ?? 'Проект Квартира';
    $now = date('d.m.Y H:i:s');
    $ok = $response['ok'] ?? true;
    $message = $response['message'] ?? '';
    $sentCount = $response['sent_count'] ?? $sentCount;
    $checked = $response['checked'] ?? $checked;
    
    $statusClass = $ok ? 'success' : 'error';
    $statusIcon = $ok ? '✅' : '❌';
    $statusText = $ok ? 'Успешно' : 'Ошибка';
    
    // CSS - простой чистый стиль
    $css = <<<CSS
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: #f5f5f5; color: #333; line-height: 1.5; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: #fff; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
        .header { background: #2c3e50; color: #fff; padding: 24px; text-align: center; }
        .header h1 { font-size: 24px; font-weight: 600; margin-bottom: 4px; }
        .header .subtitle { font-size: 13px; opacity: 0.8; }
        .status-badge { display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 12px; margin-top: 12px; }
        .status-badge.success { background: #e8f5e9; color: #2e7d32; }
        .status-badge.error { background: #fdeaea; color: #c62828; }
        .content { padding: 24px; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 12px; margin-bottom: 24px; }
        .stat-card { background: #fafafa; border: 1px solid #eee; border-radius: 6px; padding: 16px; text-align: center; }
        .stat-value { font-size: 28px; font-weight: 700; color: #333; line-height: 1; margin-bottom: 4px; }
        .stat-label { font-size: 11px; color: #888; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-card.sent .stat-value { color: #2e7d32; }
        .stat-card.checked .stat-value { color: #1976d2; }
        .message-box { padding: 12px 16px; border-radius: 4px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 8px; }
        .message-box.success { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
        .message-box.error { background: #fdeaea; color: #c62828; border: 1px solid #f5c6cb; }
        .message-box.info { background: #e3f2fd; color: #1565c0; border: 1px solid #bbdefb; }
        .section-title { font-size: 16px; font-weight: 600; margin: 24px 0 12px; padding-bottom: 8px; border-bottom: 1px solid #eee; }
        .table-container { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #fafafa; font-weight: 600; color: #666; white-space: nowrap; }
        tr:hover td { background: #fafafa; }
        .url-cell { max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-family: monospace; font-size: 12px; color: #333; }
        .badge { display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 3px; font-size: 11px; font-weight: 600; }
        .badge.success { background: #e8f5e9; color: #2e7d32; }
        .badge.error { background: #fdeaea; color: #c62828; }
        .badge.pending { background: #fff8e1; color: #f57f17; }
        .badge.skipped { background: #f5f5f5; color: #999; }
        .footer { text-align: center; padding: 16px 24px; background: #fafafa; border-top: 1px solid #eee; color: #888; font-size: 12px; }
        .footer a { color: #1976d2; text-decoration: none; }
        .footer a:hover { text-decoration: underline; }
        .footer code { background: #f5f5f5; padding: 2px 6px; border-radius: 3px; font-size: 11px; }
        @media (max-width: 640px) {
            .container { margin: 0; border-radius: 0; min-height: 100vh; }
            .header h1 { font-size: 20px; }
            .stat-value { font-size: 22px; }
            th, td { padding: 8px; font-size: 12px; }
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
    echo '<div class="status-badge ' . $statusClass . '">' . ($ok ? '✅' : '❌') . ' ' . ($ok ? 'Успешно' : 'Ошибка') . '</div>';
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
    echo '<div class="stat-card"><div class="stat-value">' . number_format($checked - $sentCount) . '</div><div class="stat-label">Без изменений</div></div>';
    echo '<div class="stat-card"><div class="stat-value">' . date('H:i:s') . '</div><div class="stat-label">Время</div></div>';
    echo '</div>';
    
    // Details table
    if (!empty($details)) {
        echo '<h2 class="section-title">📋 Детали</h2>';
        echo '<div class="table-container"><table>';
        echo '<thead><tr><th>URL</th><th>Статус</th><th>Код</th><th>Изменён</th><th>Последний пуш</th></tr></thead><tbody>';
        foreach ($details as $item) {
            $url = $item['url'] ?? ($item['route'] ?? '');
            $modified = $item['modified'] ?? 0;
            $lastSent = $item['lastSent'] ?? 0;
            $status = $item['success'] ?? false;
            $code = $item['status'] ?? 0;
            
            // Определяем статус для бейджа
            $badgeClass = 'skipped';
            $badgeText = 'Без изменений';
            if ($code >= 200 && $code < 300) {
                $badgeClass = 'success';
                $badgeText = 'Отправлено';
            } elseif ($code > 0 && ($code < 200 || $code >= 300)) {
                $badgeClass = 'error';
                $badgeText = 'Ошибка ' . $code;
            } elseif ($lastSent === 0 && $modified > 0) {
                $badgeClass = 'pending';
                $badgeText = 'Новый';
            }
            
            echo '<tr>';
            echo '<td class="url-cell">' . htmlspecialchars($url) . '</td>';
            echo '<td><span class="badge ' . $badgeClass . '">' . htmlspecialchars($badgeText) . '</span></td>';
            echo '<td>' . ($code ? '<span style="font-family:monospace;font-size:11px;">' . $code . '</span>' : '—') . '</td>';
            echo '<td>' . ($modified ? date('d.m.Y H:i', $modified) : '—') . '</td>';
            echo '<td>' . ($lastSent ? date('d.m.Y H:i', $lastSent) : '—') . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }
    
    // Footer
    echo '<footer class="footer">';
    echo '<p>IndexNow для <strong>' . htmlspecialchars($brand) . '</strong> — ' . htmlspecialchars($baseUrl) . '</p>';
    echo '<p>Ключ: <code>' . htmlspecialchars(substr($indexNowKey, 0, 8)) . '***</code> | ';
    echo '<a href="' . htmlspecialchars($baseUrl) . '/indexnow?format=json" target="_blank">JSON API</a> | ';
    echo '<a href="' . htmlspecialchars($baseUrl) . '" target="_blank">На сайт</a></p>';
    echo '<p>Проверка: ' . date('d.m.Y H:i:s') . ' | Кэш: ' . (is_file(sys_get_temp_dir() . '/pkvartira-indexnow-state.json') ? 'активен' : 'пуст') . '</p>';
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