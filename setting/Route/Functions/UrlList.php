<?php declare(strict_types=1);

namespace Setting\Route\Functions;

/**
 * Плоский текстовый список всех URL сайта (/pages).
 * Источник — те же генераторы, что и у sitemap (Sitemap::allUrls()).
 */
class UrlList
{
    public static function output(): void
    {
        header('Content-Type: text/plain; charset=utf-8');

        foreach (Sitemap::allUrls() as $url) {
            echo $url . PHP_EOL;
        }
    }
}
