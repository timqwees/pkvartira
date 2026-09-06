<?php declare(strict_types=1);

namespace Setting\Route\Functions;

use Setting\Route\Functions\Sitemap;

class UrlList
{
    public static function output(): void
    {
        $xml = Sitemap::generate();
        $simpleXml = simplexml_load_string($xml);

        if ($simpleXml === false) {
            return;
        }

        header('Content-Type: text/plain; charset=utf-8');

        foreach ($simpleXml->url as $url) {
            echo (string) $url->loc . PHP_EOL;
        }
    }
}
