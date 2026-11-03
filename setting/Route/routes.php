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
    // Дубль /blog → каноникал /blogs, делаем 301 чтобы не плодить дубль
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

// GET /indexnow — автоматическая проверка по mtime (JSON API)
Routes::get('/indexnow', function() use ($indexNowKey, $indexNowStateFile, $indexNowKeyLocation) {
    \Setting\Route\Functions\SecurityHeaders::sendSecurity();
    header('Content-Type: application/json; charset=utf-8');

    $allUrls = indexNowCollectUrls();
    if (!$allUrls) {
        echo json_encode(['ok' => true, 'message' => 'Нет URL для проверки', 'sent' => []], JSON_UNESCAPED_UNICODE);
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
        // Отправляем если: файл изменился ПОСЛЕ последнего успешного пуша
        if ($mtime > $lastSent) {
            $toSend[] = 'https://' . parse_url((new Setting\Route\Functions\TheFunction())->site()['baseUrl'], PHP_URL_HOST) . $route;
        }
    }

    if (!$toSend) {
        echo json_encode([
            'ok' => true,
            'message' => 'Нет новых изменений — все URL актуальны',
            'checked' => count($allUrls),
            'sent' => []
        ], JSON_UNESCAPED_UNICODE);
        return;
    }

    $results = indexNowSend($toSend, $indexNowKey, $indexNowKeyLocation);

    // Обновляем состояние только для успешно отправленных (2xx)
    foreach ($results as $i => $r) {
        if ($r['status'] >= 200 && $r['status'] < 300) {
            $route = parse_url($r['url'], PHP_URL_PATH);
            $state[$route] = $now;
        }
    }
    file_put_contents($indexNowStateFile, json_encode($state));

    $sentUrls = array_filter($results, fn($r) => $r['status'] >= 200 && $r['status'] < 300);
    echo json_encode([
        'ok' => true,
        'message' => 'Автоматический IndexNow пуш завершён',
        'checked' => count($allUrls),
        'sent_count' => count($sentUrls),
        'sent' => array_values(array_map(fn($r) => ['url' => $r['url'], 'status' => $r['status']], $sentUrls))
    ], JSON_UNESCAPED_UNICODE);
});

// POST /indexnow — ручной пуш
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