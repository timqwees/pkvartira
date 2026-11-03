<?php
/**
 * AI Backgrounds helper — возвращает путь к AI-сгенерированному фону
 * Использование: $aiBg = getAiBackground(1); // 1-4
 * В hero-section: $bg_url = getAiBackground(2);
 */
function getAiBackground(int $index = 1): string
{
    $images = [
        1 => '/public/assets/images/ai_background/11.png',
        2 => '/public/assets/images/ai_background/21.png',
        3 => '/public/assets/images/ai_background/31.png',
        4 => '/public/assets/images/ai_background/41.png',
    ];
    $index = max(1, min(4, $index));
    return $images[$index];
}

/**
 * Получить случайный AI фон
 */
function getRandomAiBackground(): string
{
    return getAiBackground(random_int(1, 4));
}

/**
 * Получить массив всех AI фонов для выбора в админке/шаблоне
 */
function getAllAiBackgrounds(): array
{
    $site = (new Setting\Route\Functions\TheFunction())->site();
    return [
        ['id' => 1, 'url' => $site['baseUrl'] . '/public/assets/images/ai_background/11.png', 'name' => 'AI Background 1'],
        ['id' => 2, 'url' => $site['baseUrl'] . '/public/assets/images/ai_background/21.png', 'name' => 'AI Background 2'],
        ['id' => 3, 'url' => $site['baseUrl'] . '/public/assets/images/ai_background/31.png', 'name' => 'AI Background 3'],
        ['id' => 4, 'url' => $site['baseUrl'] . '/public/assets/images/ai_background/41.png', 'name' => 'AI Background 4'],
    ];
}
