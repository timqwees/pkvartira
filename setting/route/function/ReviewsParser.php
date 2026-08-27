<?php declare(strict_types=1);

namespace Setting\route\function;

/**
 * ReviewsParser — парсит отзывы.yml и отдаёт JSON/массив для foreach на странице
 * Файл: public/pages/reviews/отзывы.yml (баланс контента в нужной директории)
 */
class ReviewsParser
{
    private string $ymlPath;
    /** @var array<int,array<string,mixed>>|null */
    private ?array $cache = null;

    public function __construct(?string $ymlPath = null)
    {
        if ($ymlPath !== null) {
            $this->ymlPath = $ymlPath;
            return;
        }
        // Основной путь — public/pages/reviews/отзывы.yml, остальные fallback для совместимости
        $candidates = [
            dirname(__DIR__, 3) . '/public/pages/reviews/отзывы.yml',
            dirname(__DIR__, 3) . '/отзывы.yml',
            dirname(__DIR__, 3) . '/public/отзывы.yml',
            dirname(__DIR__, 2) . '/отзывы.yml',
            getcwd() . '/public/pages/reviews/отзывы.yml',
            getcwd() . '/отзывы.yml',
            getcwd() . '/public/отзывы.yml',
        ];
        foreach ($candidates as $p) {
            if (is_file($p)) {
                $this->ymlPath = $p;
                return;
            }
        }
        // fallback — основной путь
        $this->ymlPath = dirname(__DIR__, 3) . '/public/pages/reviews/отзывы.yml';
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public function getReviews(): array
    {
        if ($this->cache !== null) {
            return $this->cache;
        }
        if (!is_file($this->ymlPath)) {
            $this->cache = [];
            return $this->cache;
        }
        // Если есть расширение yaml — используем его
        if (function_exists('yaml_parse_file')) {
            $data = @yaml_parse_file($this->ymlPath);
            if (is_array($data) && isset($data['reviews']) && is_array($data['reviews'])) {
                $this->cache = array_values($data['reviews']);
                return $this->cache;
            }
        }
        $content = (string) file_get_contents($this->ymlPath);
        $this->cache = $this->parseYml($content);
        return $this->cache;
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public function getBySource(string $source): array
    {
        if ($source === '' || $source === 'all') {
            return $this->getReviews();
        }
        return array_values(array_filter($this->getReviews(), fn($r) => ($r['source'] ?? '') === $source));
    }

    /** @return string[] */
    public function getSources(): array
    {
        $sources = [];
        foreach ($this->getReviews() as $r) {
            $s = (string)($r['source'] ?? '');
            if ($s !== '' && !in_array($s, $sources, true)) {
                $sources[] = $s;
            }
        }
        return $sources;
    }

    /** @return array<string,int> */
    public function getSourceCounts(): array
    {
        $counts = [];
        foreach ($this->getReviews() as $r) {
            $s = (string)($r['source'] ?? 'Неизвестно');
            $counts[$s] = ($counts[$s] ?? 0) + 1;
        }
        return $counts;
    }

    public function toJson(int $flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES): string
    {
        return json_encode($this->getReviews(), $flags) ?: '[]';
    }

    /** @return array<int,array<string,mixed>> */
    public function toArray(): array
    {
        return $this->getReviews();
    }

    /**
     * Парсит наш конкретный отзывы.yml без внешних зависимостей
     * @return array<int,array<string,mixed>>
     */
    private function parseYml(string $content): array
    {
        $lines = explode("\n", $content);
        $reviews = [];
        $current = null;
        $inText = false;
        $textLines = [];
        $inPhotos = false;

        foreach ($lines as $raw) {
            $line = rtrim($raw, "\r");

            // начало нового отзыва: "  - id: 1"
            if (preg_match('/^\s*-\s+id:\s*(\d+)/', $line, $m)) {
                if ($current !== null) {
                    if ($inText) {
                        $current['text'] = trim(implode("\n", $textLines));
                        $inText = false;
                        $textLines = [];
                    }
                    $reviews[] = $current;
                }
                $current = [
                    'id' => (int)$m[1],
                    'name' => '',
                    'avatar' => '',
                    'source' => '',
                    'source_url' => '',
                    'rating' => 5,
                    'date' => '',
                    'text' => '',
                    'photos' => [],
                ];
                $inText = false;
                $inPhotos = false;
                $textLines = [];
                continue;
            }

            if ($current === null) {
                continue;
            }

            // внутри блока text: |
            if ($inText) {
                // конец текста — строка "    photos:"
                if (preg_match('/^\s{4}photos:/', $line)) {
                    $current['text'] = trim(implode("\n", $textLines));
                    $inText = false;
                    $textLines = [];
                    $inPhotos = true;
                    // photos: []  или photos:  (список)
                    if (preg_match('/photos:\s*\[\s*\]/', $line)) {
                        $current['photos'] = [];
                        $inPhotos = false;
                    } elseif (preg_match('/photos:\s*$/', $line)) {
                        $current['photos'] = [];
                        $inPhotos = true;
                    }
                    continue;
                }
                // строки текста с отступом 6 пробелов
                if (preg_match('/^\s{6}(.*)$/', $line, $mm)) {
                    $textLines[] = $mm[1];
                    continue;
                }
                // пустая строка внутри текста
                if (trim($line) === '') {
                    $textLines[] = '';
                    continue;
                }
                // иначе — считаем окончанием текста (неожиданно)
                if (preg_match('/^\s{4}\w+:/', $line)) {
                    $current['text'] = trim(implode("\n", $textLines));
                    $inText = false;
                    $textLines = [];
                    // fallthrough к обработке поля
                } else {
                    continue;
                }
            }

            // внутри списка photos
            if ($inPhotos) {
                if (preg_match('/^\s*-\s*"([^"]+)"/', $line, $mm) || preg_match("/^\s*-\s*'([^']+)'/", $line, $mm)) {
                    $current['photos'][] = $mm[1];
                    continue;
                }
                if (preg_match('/^\s*-\s*(\S+)/', $line, $mm)) {
                    $current['photos'][] = trim($mm[1], '"\'');
                    continue;
                }
                // пустая или следующая карточка — завершаем photos
                if (preg_match('/^\s*-\s+id:/', $line) || preg_match('/^\s{4}\w+:/', $line) || trim($line) === '') {
                    // но id уже обработан выше, здесь просто выходим из photos
                    if (trim($line) === '' || preg_match('/^\s*-\s+id:/', $line)) {
                        // будет обработано на следующей итерации как новый отзыв
                        if (preg_match('/^\s*-\s+id:/', $line)) {
                            // откатим, чтобы верхний if сработал
                            // но проще — уже пушим текущий и начинаем новый (дублирование)
                            // поэтому здесь не делаем ничего, пусть следующий цикл обработает
                        }
                        $inPhotos = false;
                        if (trim($line) === '') continue;
                    } else {
                        $inPhotos = false;
                    }
                } else {
                    continue;
                }
            }

            // обычные поля
            if (preg_match('/^\s{4}name:\s*"([^"]*)"/', $line, $mm)) {
                $current['name'] = $mm[1];
                continue;
            }
            if (preg_match("/^\s{4}name:\s*'([^']*)'/", $line, $mm)) {
                $current['name'] = $mm[1];
                continue;
            }
            if (preg_match('/^\s{4}avatar:\s*\'(.*)\'\s*$/', $line, $mm)) {
                $current['avatar'] = $mm[1];
                continue;
            }
            if (preg_match('/^\s{4}avatar:\s*"([^"]*)"/', $line, $mm)) {
                $current['avatar'] = $mm[1];
                continue;
            }
            if (preg_match('/^\s{4}avatar:\s*""\s*$/', $line)) {
                $current['avatar'] = '';
                continue;
            }
            if (preg_match('/^\s{4}source:\s*"([^"]*)"/', $line, $mm)) {
                $current['source'] = $mm[1];
                continue;
            }
            if (preg_match("/^\s{4}source:\s*'([^']*)'/", $line, $mm)) {
                $current['source'] = $mm[1];
                continue;
            }
            if (preg_match('/^\s{4}source_url:\s*"([^"]*)"/', $line, $mm)) {
                $current['source_url'] = $mm[1];
                continue;
            }
            if (preg_match('/^\s{4}rating:\s*(\d+)/', $line, $mm)) {
                $current['rating'] = (int)$mm[1];
                continue;
            }
            if (preg_match('/^\s{4}date:\s*"([^"]*)"/', $line, $mm)) {
                $current['date'] = $mm[1];
                continue;
            }
            if (preg_match('/^\s{4}text:\s*\|/', $line)) {
                $inText = true;
                $textLines = [];
                continue;
            }
            if (preg_match('/^\s{4}photos:\s*\[\s*\]/', $line)) {
                $current['photos'] = [];
                $inPhotos = false;
                continue;
            }
            if (preg_match('/^\s{4}photos:\s*$/', $line)) {
                $current['photos'] = [];
                $inPhotos = true;
                continue;
            }
        }

        // последний отзыв
        if ($current !== null) {
            if ($inText) {
                $current['text'] = trim(implode("\n", $textLines));
            }
            $reviews[] = $current;
        }

        return $reviews;
    }
}
