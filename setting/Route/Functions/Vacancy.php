<?php declare(strict_types=1);

namespace Setting\Route\Functions;

class Vacancy
{
    public static function all(): array
    {
        static $data = null;
        if ($data !== null) return $data;
        $root = dirname(__DIR__, 3);
        // JSON — главный источник (лежит в папке вакансий), PHP — фолбэк
        $jsonPaths = [
            $root . '/public/pages/vakansii/vacancies.json',
            $root . '/public/data/vacancies.json',
        ];
        foreach ($jsonPaths as $jsonPath) {
            if (is_file($jsonPath)) {
                $decoded = json_decode((string)file_get_contents($jsonPath), true);
                if (is_array($decoded) && $decoded !== []) {
                    $data = $decoded;
                    return $data;
                }
            }
        }
        $phpPath = $root . '/public/data/vacancies.php';
        $data = is_file($phpPath) ? (require $phpPath) : [];
        return is_array($data) ? $data : [];
    }

    public static function get(string $slug): ?array
    {
        $all = self::all();
        return $all[$slug] ?? null;
    }

    public static function slugs(): array
    {
        return array_keys(self::all());
    }

    public static function exists(string $slug): bool
    {
        return isset(self::all()[$slug]);
    }

    /**
     * Общие бенефиты работодателя (для хаба и деталей)
     */
    public static function benefits(): array
    {
        return [
            ['icon' => 'fa-coins', 'title' => 'Выплаты каждую неделю', 'desc' => 'Без задержек, по факту этапа. Деньги — вовремя, всегда.'],
            ['icon' => 'fa-house-chimney', 'title' => 'Можно жить на объекте', 'desc' => 'Бытовка/комната на объекте — экономия на жилье для иногородних.'],
            ['icon' => 'fa-percent', 'title' => '+5 % при переходе', 'desc' => 'Сдал объект — перешёл на новый и получил 5 % от сметы старого.'],
            ['icon' => 'fa-screwdriver-wrench', 'title' => 'Крупный инструмент — наш', 'desc' => 'Станции, станки, леса, торцовки — выдаём. На питание — аванс сразу.'],
            ['icon' => 'fa-layer-group', 'title' => 'Стабильные объекты', 'desc' => 'Поток квартир 40–120 м² и домов. Без простоев круглый год.'],
        ];
    }

    public static function steps(): array
    {
        return [
            ['num' => '01', 'title' => 'Отклик за 30 секунд', 'desc' => 'Кнопка «Откликнуться» или звонок. Отвечаем за 10 минут.'],
            ['num' => '02', 'title' => 'Созвон с прорабом', 'desc' => 'Обсудим опыт, покажете фото, выберем ближайший объект.'],
            ['num' => '03', 'title' => 'Выход на объект', 'desc' => 'Аванс, инструмент, заселение (если нужно) — и в работу.'],
            ['num' => '04', 'title' => 'Еженедельные выплаты', 'desc' => 'Сдал этап — получил деньги. Без ожиданий и «завтраков».'],
        ];
    }
}
