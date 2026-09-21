<?php
/**
 * Генератор статического rss.xml для cron.
 * Запуск: php public/assets/files/generate-rss.php
 * Cron (раз в 30 минут) — строка для crontab:
 * 30-минутный интервал, путь: /usr/bin/php /path/to/site/public/assets/files/generate-rss.php
 */
require_once __DIR__ . '/../../../vendor/autoload.php';

$xml = \Setting\Route\Functions\RssFeed::saveToFile();
$items = substr_count($xml, '<item>') + substr_count($xml, '<item ');
echo 'RSS generated: ' . dirname(__DIR__, 3) . "/rss.xml\n";
echo 'Items: ' . $items . ', bytes: ' . strlen($xml) . "\n";
