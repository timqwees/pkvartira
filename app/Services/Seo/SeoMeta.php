<?php

namespace App\Services\Seo;

class SeoMeta
{
  public static function head(array $p = []): string
  {
    $siteUrl = $p['siteUrl'] ?? self::siteUrl();
    $title   = $p['title'] ?? 'MANDO MEMORI — химчистка обуви в Москве | Loro Piana, Hermès, Berluti';
    $desc    = $p['desc'] ?? 'Мастерская по химчистке и реставрации обуви в Москве. Loro Piana, Hermès, Berluti. Ручная работа от 1 490 ₽. ' . \Setting\Route\Function\Functions::deliveryNote() . '. Гарантия качества.';
    $kw      = $p['keywords'] ?? '';
    $canon   = $p['canonical'] ?? '/';
    $img     = $p['image'] ?? '/public/assets/images/services/чистка.png';
    // Ensure absolute URL for og:image
    if (strpos($img, 'http') !== 0) {
      $img = $siteUrl . $img;
    }
    // Ensure it's not SVG for og:image (social media doesn't support SVG well)
    if (str_ends_with($img, '.svg')) {
      $img = str_replace('.svg', '.webp', $img);
    }
    $type    = $p['type'] ?? 'website';
    $locale  = $p['locale'] ?? 'ru_RU';
    $robots  = $p['robots'] ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    $author  = $p['author'] ?? 'MANDO MEMORI';
    $hreflang = $p['hreflang'] ?? ($siteUrl . $canon);

    $h = '';

    $h .= '<title>' . htmlspecialchars($title) . "</title>\n";
    $h .= '<meta name="description" content="' . htmlspecialchars($desc) . "\">\n";
    if ($kw) $h .= '<meta name="keywords" content="' . htmlspecialchars($kw) . "\">\n";
    $h .= "<meta name=\"robots\" content=\"$robots\">\n";
    $h .= '<meta name="author" content="' . htmlspecialchars($author) . "\">\n";
    $h .= '<meta name="publisher" content="' . htmlspecialchars($author) . "\">\n";

    $h .= '<meta property="og:title" content="' . htmlspecialchars($title) . "\">\n";
    $h .= '<meta property="og:description" content="' . htmlspecialchars($desc) . "\">\n";
    $h .= '<meta property="og:image" content="' . $siteUrl . $img . "\">\n";
    $h .= "<meta property=\"og:type\" content=\"$type\">\n";
    $h .= '<meta property="og:url" content="' . $siteUrl . $canon . "\">\n";
    $h .= "<meta property=\"og:locale\" content=\"$locale\">\n";

    $h .= "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    $h .= '<meta name="twitter:title" content="' . htmlspecialchars($title) . "\">\n";
    $h .= '<meta name="twitter:description" content="' . htmlspecialchars($desc) . "\">\n";

    $h .= '<link rel="canonical" href="' . $siteUrl . $canon . "\">\n";

    $h .= '<link rel="alternate" href="' . $hreflang . '" hreflang="ru-RU">' . "\n";
    $h .= '<link rel="alternate" href="' . $hreflang . '" hreflang="x-default">' . "\n";

    $h .= '<link rel="author" href="' . $siteUrl . '/">' . "\n";
    $h .= '<link rel="publisher" href="' . $siteUrl . '/">' . "\n";

    $h .= '<link rel="dns-prefetch" href="https://t.me">' . "\n";
    $h .= '<link rel="dns-prefetch" href="https://wa.me">' . "\n";
    $h .= '<link rel="dns-prefetch" href="https://fonts.googleapis.com">' . "\n";
    $h .= '<link rel="dns-prefetch" href="https://fonts.gstatic.com">' . "\n";
    $h .= '<link rel="preconnect" href="https://t.me" crossorigin="anonymous">' . "\n";
    $h .= '<link rel="preconnect" href="https://wa.me" crossorigin="anonymous">' . "\n";
    $h .= '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">' . "\n";
    $h .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">' . "\n";

    $extraLd = $p['jsonLd'] ?? null;
    $h .= self::jsonLd($siteUrl, $extraLd);

    return $h;
  }

  public static function siteUrl(): string
  {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'mandomemori.ru';
    return "$scheme://$host";
  }

  private static function jsonLd(string $siteUrl, ?array $extra = null): string
  {
    $business = [
      '@type' => 'LocalBusiness',
      '@id' => $siteUrl . '/#localbusiness',
      'name' => 'MANDO MEMORI',
      'alternateName' => 'mmclean.ru',
      'description' => 'Мастерская по химчистке и реставрации обуви и сумок в Москве. Специализация: Loro Piana, Hermès, Berluti. Ручная работа, стоимость от 1 490 ₽.',
      'image' => [
        $siteUrl . '/public/assets/images/mandomemori/hero-poster.jpg',
        $siteUrl . '/public/assets/images/mandomemori/beforeafter1.png',
      ],
      'logo' => [
        '@type' => 'ImageObject',
        'url' => $siteUrl . '/public/assets/images/favicon_full_black.svg',
        'width' => 90,
        'height' => 52,
      ],
      'url' => $siteUrl,
      'telephone' => '+79161829272',
      'email' => 'info@mmclean.ru',
      'taxID' => '7703010010', // ИНН
      'identifier' => '1027700123456', // ОГРН
      'legalName' => 'ООО "МАНДО МЕМОРИ"',
      'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Петровка 15/13 стр.5',
        'addressLocality' => 'Москва',
        'addressRegion' => 'Москва',
        'postalCode' => '107031',
        'addressCountry' => 'RU',
      ],
      'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => 55.765833,
        'longitude' => 37.618889,
      ],
      'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => 4.9,
        'bestRating' => 5,
        'worstRating' => 1,
        'ratingCount' => 1500,
        'reviewCount' => 1500,
      ],
      'priceRange' => '1490 RUB - 49900 RUB',
      'currenciesAccepted' => 'RUB',
      'paymentAccepted' => 'Cash, Credit Card',
      'openingHoursSpecification' => [
        [
          '@type' => 'OpeningHoursSpecification',
          'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
          'opens' => '10:00',
          'closes' => '22:00',
        ],
        [
          '@type' => 'OpeningHoursSpecification',
          'dayOfWeek' => 'Sunday',
          'opens' => '11:00',
          'closes' => '22:00',
        ],
      ],
      'knowsAbout' => [
        'Химчистка обуви',
        'Реставрация обуви Loro Piana',
        'Замена подошвы Loro Piana',
        'Отбеливание подошвы',
        'Ремонт сумок Hermès',
        'Реставрация сумок',
        'Набойки на обувь',
      ],
      'areaServed' => [
        '@type' => 'City',
        'name' => 'Москва',
      ],
      'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Услуги мастерской MANDO MEMORI',
        'itemListElement' => [
          [
            '@type' => 'Offer',
            'price' => '5990',
            'priceCurrency' => 'RUB',
            'availability' => 'https://schema.org/InStock',
            'url' => $siteUrl . '/product/cleaning',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Химчистка премиальной обуви',
              'description' => 'Комплексная ручная чистка премиальной обуви от 5 990 ₽ за пару',
            ],
          ],
          [
            '@type' => 'Offer',
            'price' => '6490',
            'priceCurrency' => 'RUB',
            'availability' => 'https://schema.org/InStock',
            'url' => $siteUrl . '/product/restoration',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Реставрация обуви Loro Piana',
              'description' => 'Восстановление обуви Loro Piana от 6 490 ₽ за пару',
            ],
          ],
          [
            '@type' => 'Offer',
            'price' => '18990',
            'priceCurrency' => 'RUB',
            'availability' => 'https://schema.org/InStock',
            'url' => $siteUrl . '/product/replacement',
            'itemOffered' => [
              '@type' => 'Service',
              'name' => 'Замена подошвы Loro Piana',
              'description' => 'Замена подошвы Loro Piana от 18 990 ₽ за пару',
            ],
          ],
        ],
      ],
      'sameAs' => [
        'https://t.me/maksim1144',
        'https://wa.me/79161829272',
      ],
      'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+79161829272',
        'contactType' => 'customer service',
        'availableLanguage' => ['ru', 'en'],
        'areaServed' => 'RU',
      ],
    ];

    $graph = [$business];
    // WebSite
    $graph[] = [
      '@type' => 'WebSite',
      '@id' => $siteUrl . '/#website',
      'name' => 'MANDO MEMORI',
      'alternateName' => 'mmclean.ru',
      'url' => $siteUrl,
      'inLanguage' => 'ru-RU',
      'publisher' => ['@id' => $siteUrl . '/#localbusiness'],
      'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => [
          '@type' => 'EntryPoint',
          'urlTemplate' => $siteUrl . '/blog?search={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
      ],
    ];
    // Organization
    $graph[] = [
      '@type' => 'Organization',
      '@id' => $siteUrl . '/#organization',
      'name' => 'MANDO MEMORI',
      'url' => $siteUrl,
      'logo' => [
        '@type' => 'ImageObject',
        'url' => $siteUrl . '/public/assets/images/favicon_full_black.svg',
        'width' => 90,
        'height' => 52,
      ],
      'description' => 'Премиальная мастерская по химчистке и реставрации обуви в Москве с 2015 года.',
      'foundingDate' => '2015',
      'taxID' => '7703010010', // ИНН
      'vatID' => 'RU7703010010', // КПП/ВАТ
      'legalName' => 'ООО "МАНДО МЕМОРИ"', // Юридическое название
      'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Петровка 15/13 стр.5',
        'addressLocality' => 'Москва',
        'postalCode' => '107031',
        'addressCountry' => 'RU',
      ],
      'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+79161829272',
        'contactType' => 'customer service',
        'availableLanguage' => 'Russian',
      ],
      'sameAs' => ['https://t.me/maksim1144'],
    ];
    if ($extra) {
      if (isset($extra['@context'])) unset($extra['@context']);
      if (isset($extra['@type']) && $extra['@type'] === 'FAQPage') {
        $extra['@id'] = $siteUrl . $extra['@id'] ?? $siteUrl . '/#faq';
      }
      $graph[] = $extra;
    }

    $payload = [
      '@context' => 'https://schema.org',
      '@graph' => $graph,
    ];

    return '<script type="application/ld+json">' . json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . "</script>\n";
  }
}
