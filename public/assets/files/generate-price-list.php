<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font' => 'dejavusans',
    'margin_left' => 15,
    'margin_right' => 15,
    'margin_top' => 15,
    'margin_bottom' => 15,
]);

$orange = '#c2410c';
$dark = '#333333';
$gray = '#666666';
$light = '#f5f5f5';
$headerBg = '#c2410c';
$altRow = '#fef3e7';

// --- Page 1: Cover ---
$html = '
<style>
    body { font-family: dejavusans; color: ' . $dark . '; }
    h1 { color: ' . $orange . '; font-size: 28px; text-align: center; margin-bottom: 5px; }
    h2 { color: ' . $dark . '; font-size: 18px; text-align: center; margin-top: 0; }
    .subtitle { color: ' . $gray . '; font-size: 12px; text-align: center; }
    table { width: 100%; border-collapse: collapse; margin: 15px 0; font-size: 10px; }
    th { background: ' . $headerBg . '; color: white; padding: 8px; text-align: center; font-weight: bold; }
    td { padding: 7px; border: 1px solid #ddd; text-align: center; }
    td:first-child { text-align: left; font-weight: bold; }
    .alt td { background: ' . $altRow . '; }
    .note { color: #999; font-size: 8px; text-align: center; }
    .footer { text-align: center; font-size: 10px; color: ' . $gray . '; }
    .brand { color: ' . $orange . '; font-weight: bold; }
    .section-title { color: ' . $orange . '; font-size: 16px; margin: 20px 0 10px 0; }
</style>

<h1>PKvartira</h1>
<h2>Прайс-лист на ремонт квартир</h2>
<p class="subtitle">Москва, 2026</p>

<h3 class="section-title">Цены за м² по типам ремонта</h3>
<table>
<tr><th>Тип ремонта</th><th>Цена за м²</th><th>Итого (45 м²)*</th></tr>
<tr><td>Косметический ремонт</td><td>от 8 000 руб</td><td>от 360 000 руб</td></tr>
<tr class="alt"><td>Капитальный ремонт</td><td>от 13 000 руб</td><td>от 585 000 руб</td></tr>
<tr><td>Дизайнерский ремонт</td><td>от 18 000 руб</td><td>от 810 000 руб</td></tr>
<tr class="alt"><td>Премиальный ремонт</td><td>от 25 000 руб</td><td>от 1 125 000 руб</td></tr>
</table>
<p class="note">* Стоимость зависит от площади, состояния помещения и материалов. Точная цена — после замера.</p>
<p class="note">Акция: скидка 10% на ремонт до конца месяца!</p>
';

// --- Page 2: Prices by apt type + by sqm ---
$html2 = '
<style>
    body { font-family: dejavusans; color: ' . $dark . '; }
    h2 { color: ' . $orange . '; font-size: 16px; margin-bottom: 10px; }
    table { width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 10px; }
    th { background: ' . $headerBg . '; color: white; padding: 8px; text-align: center; font-weight: bold; }
    td { padding: 7px; border: 1px solid #ddd; text-align: center; }
    td:first-child { text-align: left; font-weight: bold; }
    .alt td { background: ' . $altRow . '; }
    .section-title { color: ' . $orange . '; font-size: 16px; margin: 20px 0 10px 0; }
</style>

<h2>Цены по типам квартир</h2>
<table>
<tr><th>Тип квартиры</th><th>Цена</th></tr>
<tr><td>Студия (от 25 м²)</td><td>от 200 000 руб</td></tr>
<tr class="alt"><td>1-комнатная (от 37 м²)</td><td>от 296 000 руб</td></tr>
<tr><td>2-комнатная (от 50 м²)</td><td>от 400 000 руб</td></tr>
<tr class="alt"><td>3-комнатная (от 70 м²)</td><td>от 560 000 руб</td></tr>
<tr><td>4-комнатная (от 90 м²)</td><td>от 720 000 руб</td></tr>
</table>

<h2>Стоимость по метражу</h2>
<table>
<tr><th>Площадь</th><th>Косметический</th><th>Капитальный</th><th>Дизайнерский</th></tr>
<tr><td>30 м²</td><td>240 000 руб</td><td>390 000 руб</td><td>540 000 руб</td></tr>
<tr class="alt"><td>45 м²</td><td>360 000 руб</td><td>585 000 руб</td><td>810 000 руб</td></tr>
<tr><td>60 м²</td><td>480 000 руб</td><td>780 000 руб</td><td>1 080 000 руб</td></tr>
<tr class="alt"><td>80 м²</td><td>640 000 руб</td><td>1 040 000 руб</td><td>1 440 000 руб</td></tr>
<tr><td>100 м²</td><td>800 000 руб</td><td>1 300 000 руб</td><td>1 800 000 руб</td></tr>
<tr class="alt"><td>120 м²</td><td>960 000 руб</td><td>1 560 000 руб</td><td>2 160 000 руб</td></tr>
<tr><td>150 м²</td><td>1 200 000 руб</td><td>1 950 000 руб</td><td>2 700 000 руб</td></tr>
</table>
';

// --- Page 3: Services included ---
$html3 = '
<style>
    body { font-family: dejavusans; color: ' . $dark . '; }
    h2 { color: ' . $orange . '; font-size: 16px; margin-bottom: 10px; }
    table { width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 10px; }
    th { background: ' . $headerBg . '; color: white; padding: 8px; text-align: center; font-weight: bold; }
    td { padding: 7px; border: 1px solid #ddd; }
    td:first-child { font-weight: bold; width: 40%; }
    .alt td { background: ' . $altRow . '; }
    .section-title { color: ' . $orange . '; font-size: 16px; margin: 20px 0 10px 0; }
    .footer { text-align: center; font-size: 10px; color: ' . $gray . '; margin-top: 30px; }
    .brand { color: ' . $orange . '; font-weight: bold; }
</style>

<h2>Что входит в стоимость</h2>
<table>
<tr><th>Этап работ</th><th>Описание</th></tr>
<tr><td>Демонтажные работы</td><td>Демонтаж перегородок, снятие покрытий, вывоз мусора</td></tr>
<tr class="alt"><td>Электромонтаж</td><td>Прокладка кабеля, установка щитка, розетки, выключатели</td></tr>
<tr><td>Сантехника</td><td>Разводка труб, установка унитаза, раковины, смесителя</td></tr>
<tr class="alt"><td>Черновая отделка</td><td>Стяжка пола, штукатурка стен, шпаклёвка потолка</td></tr>
<tr><td>Чистовая отделка</td><td>Обои, покраска, плитка, ламинат, паркет</td></tr>
<tr class="alt"><td>Установка дверей</td><td>Межкомнатные и входная дверь с фурнитурой</td></tr>
<tr><td>Освещение</td><td>Монтаж светильников и люстр</td></tr>
<tr class="alt"><td>Сборка мебели</td><td>Сборка и установка корпусной мебели</td></tr>
<tr><td>Уборка</td><td>Финальная уборка после ремонта</td></tr>
</table>

<h2>Дополнительные услуги</h2>
<table>
<tr><th>Услуга</th><th>Цена</th></tr>
<tr><td>Дизайн-проект</td><td>от 1 500 руб/м²</td></tr>
<tr class="alt"><td>Черновой материал</td><td>от 3 500 руб/м²</td></tr>
<tr><td>Чистовой материал</td><td>от 8 000 руб/м²</td></tr>
<tr class="alt"><td>Приёмка квартиры в новостройке</td><td>от 15 000 руб</td></tr>
<tr><td>Координатор проекта</td><td>от 5 000 руб/мес</td></tr>
</table>

<p class="footer">Актуальные цены уточняйте у менеджера.<br>Бесплатный замер и смета в день обращения.</p>
<p class="footer"><span class="brand">PKvartira</span> — Ремонт квартир под ключ в Москве<br>Тел.: 8 (495) 369-09-39</p>
';

$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->WriteHTML($html3);

$mpdf->Output(__DIR__ . '/price-list.pdf', 'F');
echo "PDF generated: " . __DIR__ . "/price-list.pdf\n";
