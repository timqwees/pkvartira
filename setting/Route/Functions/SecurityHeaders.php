<?php declare(strict_types=1);

namespace Setting\Route\Functions;

/**
 * Централизованные HTTP-заголовки — ЕДИНСТВЕННОЕ место их установки.
 *
 * reg.ru на shared-хостинге жалуется на директивы Header в .htaccess,
 * поэтому .htaccess содержит только rewrite/сжатие/Expires для статики,
 * а ВСЕ заголовки (безопасность + кэш HTML) ставятся отсюда через header().
 *
 * Покрывает замечания enterno.io:
 * - HSTS 7/20 → max-age + includeSubDomains (+preload)
 * - Referrer-Policy 0/5 → strict-origin-when-cross-origin
 * - Permissions-Policy 0/5 → camera/microphone/geolocation off
 * - COOP/COEP/CORP 0/5 (bonus) → безопасные значения, не ломающие сторонние виджеты
 * - ETag 0/15 → ETag + 304 handling
 * - Дубль Cache-Control (no-cache vs max-age=7200) → один Cache-Control только отсюда
 */
final class SecurityHeaders
{
    public const HTML_CACHE_MAX_AGE = 3600;

    public static function sendSecurity(): void
    {
        if (headers_sent()) {
            return;
        }
        // HSTS имеет смысл только на HTTPS; за прокси (nginx/cloudflare) смотрим X-Forwarded-Proto
        if (self::isHttps()) {
            header('Strict-Transport-Security: max-age=63072000; includeSubDomains; preload', true);
        }
        header('X-Frame-Options: SAMEORIGIN', true);
        header('X-Content-Type-Options: nosniff', true);
        header('Referrer-Policy: strict-origin-when-cross-origin', true);
        header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=()', true);
        header('Cross-Origin-Opener-Policy: same-origin-allow-popups', true);
        header('Cross-Origin-Resource-Policy: same-origin', true);
        header('Cross-Origin-Embedder-Policy: unsafe-none', true);
        // Permissive CSP: сайт использует инлайн-скрипты/стили, строгий CSP всё сломает.
        // frame-ancestors усиливает X-Frame-Options.
        header("Content-Security-Policy: upgrade-insecure-requests; frame-ancestors 'self'", true);
    }

    /**
     * HTML-кэширование + условные запросы.
     * Один ЕДИНСТВЕННЫЙ Cache-Control (replace=true), ETag и Last-Modified.
     * При совпадении If-None-Match / If-Modified-Since отдаёт 304 и завершает запрос.
     */
    public static function sendHtmlCache(string $templatePath): void
    {
        if (headers_sent()) {
            return;
        }
        $mtime = is_file($templatePath) ? (int) filemtime($templatePath) : time();
        $etag = '"' . md5($templatePath . '|' . $mtime) . '"';

        // replace=true — затирает любые предыдущие Cache-Control от вызывающего кода
        header('Cache-Control: public, max-age=' . self::HTML_CACHE_MAX_AGE . ', must-revalidate', true);
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT', true);
        header('ETag: ' . $etag, true);

        $ifNoneMatch = $_SERVER['HTTP_IF_NONE_MATCH'] ?? '';
        $ifModifiedSince = $_SERVER['HTTP_IF_MODIFIED_SINCE'] ?? '';
        if ($ifNoneMatch !== '' && trim($ifNoneMatch) === $etag) {
            http_response_code(304);
            exit;
        }
        if ($ifNoneMatch === '' && $ifModifiedSince !== '') {
            $since = strtotime($ifModifiedSince);
            if ($since !== false && $since >= $mtime) {
                http_response_code(304);
                exit;
            }
        }
    }

    /** Совместимость с прокси: HTTPS напрямую или X-Forwarded-Proto=https */
    public static function isHttps(): bool
    {
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
            return true;
        }
        if (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') {
            return true;
        }
        if (($_SERVER['REQUEST_SCHEME'] ?? '') === 'https') {
            return true;
        }
        return false;
    }

    /** Полный набор для HTML-страницы: безопасность + кэш. Вызывать ДО вывода тела. */
    public static function sendForHtml(string $templatePath): void
    {
        self::sendSecurity();
        self::sendHtmlCache($templatePath);
    }

    /**
     * Кэш для статики, отдаваемой через PHP (Routes::file).
     * Напрямую Apache отдаёт статику с Expires из .htaccess,
     * а через этот метод — с явным immutable Cache-Control + ETag/304.
     */
    public static function sendStaticCache(string $filePath): void
    {
        if (headers_sent()) {
            return;
        }
        self::sendSecurity();
        $mtime = is_file($filePath) ? (int) filemtime($filePath) : time();
        $size = is_file($filePath) ? (int) filesize($filePath) : 0;
        $etag = '"' . md5($filePath . '|' . $mtime . '|' . $size) . '"';

        header('Cache-Control: public, max-age=31536000, immutable', true);
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT', true);
        header('ETag: ' . $etag, true);

        $ifNoneMatch = $_SERVER['HTTP_IF_NONE_MATCH'] ?? '';
        if ($ifNoneMatch !== '' && trim($ifNoneMatch) === $etag) {
            http_response_code(304);
            exit;
        }
    }
}
