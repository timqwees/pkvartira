<?php

declare(strict_types=1);

namespace Setting\Route\Functions;

/**
 * Builds trusted canonical base URLs without trusting arbitrary Host headers.
 */
final class SiteUrl
{
    private const CANONICAL_HOSTS = ['pkvartira.ru', 'www.pkvartira.ru'];
    private const KNOWN_SUBDOMAINS = ['upgrade.pkvartira.ru'];
    private const LOCAL_HOSTS = ['localhost', '127.0.0.1', '::1'];

    /**
     * Публичный доступ к whitelist канонических хостов.
     * Нужен robots.php: раньше он обращался к приватной константе и падал с 500.
     */
    public static function canonicalHosts(): array
    {
        return self::CANONICAL_HOSTS;
    }

    public static function baseUrl(?array $server = null): string
    {
        $server ??= $_SERVER;
        $authority = strtolower(trim((string)($server['HTTP_HOST'] ?? '')));

        if (!preg_match('/^(?:\[([0-9a-f:]+)\]|([a-z0-9.-]+))(?::([0-9]{1,5}))?$/i', $authority, $matches)) {
            return 'https://pkvartira.ru';
        }

        $host = strtolower($matches[1] !== '' ? $matches[1] : $matches[2]);
        $port = isset($matches[3]) && $matches[3] !== '' ? (int)$matches[3] : null;

        if (in_array($host, self::CANONICAL_HOSTS, true)) {
            return 'https://pkvartira.ru';
        }

        if (in_array($host, self::KNOWN_SUBDOMAINS, true)) {
            return 'https://' . $host;
        }

        $isLocal = in_array($host, self::LOCAL_HOSTS, true)
            || str_ends_with($host, '.localhost')
            || str_ends_with($host, '.test')
            || str_ends_with($host, '.local');

        if (!$isLocal) {
            return 'https://pkvartira.ru';
        }

        $forwardedProto = strtolower(trim((string)($server['HTTP_X_FORWARDED_PROTO'] ?? '')));
        $isHttps = (!empty($server['HTTPS']) && strtolower((string)$server['HTTPS']) !== 'off')
            || $forwardedProto === 'https';
        $scheme = $isHttps ? 'https' : 'http';

        $defaultPort = $isHttps ? 443 : 80;
        $authorityHost = str_contains($host, ':') ? '[' . $host . ']' : $host;
        $portSuffix = $port !== null && $port !== $defaultPort ? ':' . $port : '';

        return $scheme . '://' . $authorityHost . $portSuffix;
    }
}
