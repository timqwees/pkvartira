<?php

declare(strict_types=1);

namespace Setting\Route\Functions;

/**
 * Slug — приведение слагов к ASCII (латиница, цифры, дефис).
 *
 * Зачем: два слага в articles.json содержали смешанную кириллицу
 * (vybor-sanтехники…, dogovor-na-remont-2026-obязательные-punkty). В таком виде
 * URL попадал в sitemap и canonical в процент-кодировке — Google получал
 * canonical на несуществующий адрес и выкидывал страницу из индекса.
 */
final class Slug
{
    private const MAP = [
        'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'zh',
        'з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o',
        'п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c',
        'ч'=>'ch','ш'=>'sh','щ'=>'sch','ъ'=>'','ы'=>'y','ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya',
    ];

    public static function toAscii(string $slug): string
    {
        $slug = mb_strtolower(trim($slug), 'UTF-8');
        $out = '';
        $len = mb_strlen($slug, 'UTF-8');
        for ($i = 0; $i < $len; $i++) {
            $ch = mb_substr($slug, $i, 1, 'UTF-8');
            $out .= self::MAP[$ch] ?? $ch;
        }

        $out = preg_replace('/[^a-z0-9]+/u', '-', $out) ?? '';

        return trim($out, '-');
    }

    public static function isAscii(string $slug): bool
    {
        return preg_match('/^[\x20-\x7E]*$/', $slug) === 1;
    }
}
