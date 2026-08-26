<?php

use App\Models\Router\Routes;
use Setting\Route\Function\Functions;

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
//==================================================================================================//REVIEWS
Routes::get('/portfolio', 'on_Portfolio');
//==================================================================================================//SERVICE INDEX
Routes::get('/services', function() { Routes::auto_element(dirname(__DIR__, 2) . "/public/pages/services/index.php", get_defined_vars()); });
//==================================================================================================//SERVICE
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
//==================================================================================================//BLOG ARTICLE (SEO URL)
Routes::get('/blog/article', function () {//для ненайденных
    Routes::auto_element(dirname(__DIR__, 2) . '/public/pages/blog/article/index.php', get_defined_vars());
});
Routes::get('/blog/article/{id}', function ($id = null) {
    Routes::auto_element(dirname(__DIR__, 2) . '/public/pages/blog/article/index.php', get_defined_vars());
});
//==================================================================================================//CALCULATOR
Routes::get('/calculator', 'on_Calculator');
//==================================================================================================//AREA CALCULATOR (SEO)
Routes::get('/kalkulyator-ploshchadi', 'on_AreaCalculator');
//==================================================================================================//LEGAL / CONSENT
Routes::get('/soglashenie', 'on_Soglashenie');
//==================================================================================================//SMETA SAMPLE (SEO)
Routes::get('/smeta-obrazec', 'on_Smeta');
//==================================================================================================//DOGOVOR TEMPLATE (SEO)
Routes::get('/dogovor-obrazec', 'on_Dogovor');
//==================================================================================================//Отправка письма
Routes::post('/send/email', [Functions::class, 'sendMail']);
//==================================================================================================//SITEMAP INDEX + ПОД-КАРТЫ (SEO)
Routes::get('/sitemap.xml', function () {
    Setting\route\function\Sitemap::outputIndex();
});
Routes::get('/sitemap-pages.xml', function () {
    Setting\route\function\Sitemap::outputPages();
});
Routes::get('/sitemap-services.xml', function () {
    Setting\route\function\Sitemap::outputServices();
});
Routes::get('/sitemap-blog.xml', function () {
    Setting\route\function\Sitemap::outputBlog();
});
//==================================================================================================//YML FEED (Яндекс.Бизнес)
Routes::get('/yml.xml', function () {
    Setting\route\function\YmlFeed::output();
});
//==================================================================================================//RSS FEED (SEO)
Routes::get('/rss.xml', function () {
    Setting\route\function\RssFeed::output();
});
//==================================================================================================//PAGES LIST
Routes::get('/pages', function () {
    Setting\route\function\UrlList::output();
});
//==================================================================================================//LLMS.TXT (AI)
Routes::get('/llms.txt', function () {
    header('Content-Type: text/plain; charset=utf-8');
    readfile(dirname(__DIR__, 2) . '/public/llms.txt');
});
//==================================================================================================//LLMS-FULL.TXT (AI)
Routes::get('/llms-full.txt', function () {
    header('Content-Type: text/plain; charset=utf-8');
    readfile(dirname(__DIR__, 2) . '/public/llms-full.txt');
});

Routes::get('/opensearch.xml', function() {
	header('Content-Type: application/opensearchdescription+xml; charset=utf-8');
	readfile(dirname(__DIR__, 2) . '/public/opensearch.xml');
});

Routes::get('/robots.txt', function() {
	header('Content-Type: text/plain; charset=utf-8');
	include_once 'public/robots.php';
});