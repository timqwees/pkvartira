<?php declare(strict_types=1);

namespace Setting\Route\Functions;

/**
 * Минимальный MCP-сервер (Model Context Protocol, Streamable HTTP).
 * Только чтение, без авторизации: поиск по сайту и цены.
 * POST /mcp с JSON-RPC 2.0: initialize / tools/list / tools/call.
 */
final class McpServer
{
    public static function handle(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            http_response_code(405);
            header('Allow: POST');
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['error' => 'Use POST with JSON-RPC 2.0'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $raw = (string) file_get_contents('php://input');
        $req = json_decode($raw, true);
        if (!is_array($req)) {
            self::error(null, -32700, 'Parse error');
            return;
        }
        $id = $req['id'] ?? null;
        $method = (string) ($req['method'] ?? '');
        $params = is_array($req['params'] ?? null) ? $req['params'] : [];

        // Уведомления (без id) — отвечаем 202 без тела
        if ($method === 'notifications/initialized') {
            http_response_code(202);
            return;
        }

        switch ($method) {
            case 'initialize':
                self::result($id, [
                    'protocolVersion' => '2024-11-05',
                    'capabilities' => ['tools' => new \stdClass()],
                    'serverInfo' => ['name' => 'pkvartira', 'version' => '1.0.0'],
                ]);
                return;
            case 'tools/list':
                self::result($id, ['tools' => self::tools()]);
                return;
            case 'tools/call':
                self::callTool($id, $params);
                return;
            default:
                self::error($id, -32601, 'Method not found: ' . $method);
                return;
        }
    }

    /** @return array<int, array<string, mixed>> */
    private static function tools(): array
    {
        return [
            [
                'name' => 'site-search',
                'description' => 'Поиск по сайту pkvartira.ru: услуги, статьи блога, цены, вакансии',
                'inputSchema' => [
                    'type' => 'object',
                    'properties' => ['q' => ['type' => 'string', 'description' => 'Поисковый запрос']],
                    'required' => ['q'],
                ],
            ],
            [
                'name' => 'price-lookup',
                'description' => 'Актуальные цены на ремонт квартир от Проект Квартира',
                'inputSchema' => ['type' => 'object', 'properties' => new \stdClass()],
            ],
        ];
    }

    /** @param array<string, mixed> $params */
    private static function callTool($id, array $params): void
    {
        $name = (string) ($params['name'] ?? '');
        $args = is_array($params['arguments'] ?? null) ? $params['arguments'] : [];

        if ($name === 'site-search') {
            $q = mb_substr(trim((string) ($args['q'] ?? '')), 0, 120);
            if ($q === '') {
                self::error($id, -32602, 'Invalid params: q is required');
                return;
            }
            $results = TheFunction::siteSearch($q, 10);
            if ($results === []) {
                $text = "По запросу «{$q}» ничего не найдено. Телефон: +7 495 473-17-37.";
            } else {
                $lines = ["Результаты поиска «{$q}» (pkvartira.ru):"];
                foreach ($results as $i => $r) {
                    $lines[] = ($i + 1) . '. ' . $r['title'] . ' — ' . $r['url']
                        . (!empty($r['snippet']) ? ' — ' . $r['snippet'] : '');
                }
                $text = implode("\n", $lines);
            }
            self::result($id, ['content' => [['type' => 'text', 'text' => $text]]]);
            return;
        }

        if ($name === 'price-lookup') {
            $text = "Цены Проект Квартира (ПКвартира), Москва, 2026:\n"
                . "- Косметический ремонт — от 8 000 ₽/м²\n"
                . "- Капитальный ремонт — от 13 000 ₽/м²\n"
                . "- Дизайнерский ремонт — от 18 000 ₽/м²\n"
                . "Замер и смета бесплатно, гарантия 3 года.\n"
                . "Прайс: https://pkvartira.ru/prices\n"
                . "Калькулятор: https://pkvartira.ru/calculator";
            self::result($id, ['content' => [['type' => 'text', 'text' => $text]]]);
            return;
        }

        self::error($id, -32602, 'Unknown tool: ' . $name);
    }

    /** @param mixed $id */
    private static function result($id, array $result): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(
            ['jsonrpc' => '2.0', 'id' => $id, 'result' => $result],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }

    /** @param mixed $id */
    private static function error($id, int $code, string $message): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(
            ['jsonrpc' => '2.0', 'id' => $id, 'error' => ['code' => $code, 'message' => $message]],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}
