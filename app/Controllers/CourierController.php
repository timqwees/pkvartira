<?php

namespace App\Controllers;

use App\Config\Session;
use Dompdf\Dompdf;
use Setting\Route\Function\Functions;

class CourierController
{
    public function onRequest(): void
    {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);

        $name = trim($input['name'] ?? '');
        $phone = trim($input['phone'] ?? '');
        $address = trim($input['address'] ?? '');
        $email = trim($input['email'] ?? '');
        $orderNum = trim($input['order_num'] ?? '');

        $consent = !empty($input['consent']);

        if (!$name || !$phone || !$address || !$consent) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => !$consent ? 'Необходимо согласие на обработку данных' : 'Заполните все обязательные поля']);
            return;
        }

        $snapshot = $orderNum ? Session::init('sf_order_snapshot') : null;

        $pdfPath = null;
        if ($snapshot && !empty($snapshot['items'])) {
            $pdfPath = $this->generatePdf($snapshot);
        }

        $subject = 'Новая заявка на вызов курьера — MANDO MEMORI';
        $body = '<h2>Новая заявка на вызов курьера</h2>'
            . '<table style="border-collapse:collapse;width:100%;max-width:600px;font-family:sans-serif">'
            . '<tr><td style="padding:8px 12px;background:#f5f5f5;font-weight:600;border:1px solid #ddd">Имя</td><td style="padding:8px 12px;border:1px solid #ddd">' . htmlspecialchars($name) . '</td></tr>'
            . '<tr><td style="padding:8px 12px;background:#f5f5f5;font-weight:600;border:1px solid #ddd">Телефон</td><td style="padding:8px 12px;border:1px solid #ddd">' . htmlspecialchars($phone) . '</td></tr>'
            . '<tr><td style="padding:8px 12px;background:#f5f5f5;font-weight:600;border:1px solid #ddd">Адрес</td><td style="padding:8px 12px;border:1px solid #ddd">' . htmlspecialchars($address) . '</td></tr>';

        if ($orderNum) {
            $body .= '<tr><td style="padding:8px 12px;background:#f5f5f5;font-weight:600;border:1px solid #ddd">Номер заказа</td><td style="padding:8px 12px;border:1px solid #ddd">' . htmlspecialchars($orderNum) . '</td></tr>';
        }
        $body .= '</table>';

        try {
            $mailer = new MailController();
            $sent = $mailer->onMail('info@mmclean.ru', $subject, $body, $pdfPath);
        } catch (\Exception $e) {
            $sent = false;
        }

        if ($email && $orderNum) {
            $clientSubject = 'Ваш заказ ' . $orderNum . ' — MANDO MEMORI';
            $clientBody = $pdfPath ? 'Здравствуйте! Ваш чек во вложении. Спасибо за заказ!' : 'Здравствуйте! Ваш заказ принят, курьер уже получил уведомление.';
            try {
                $mailer = new MailController();
                $mailer->onMail($email, $clientSubject, $clientBody, $pdfPath);
            } catch (\Exception $e) {
            }
        }

        if ($pdfPath) {
            unlink($pdfPath);
        }

        Session::init('sf_order_snapshot', null);
        Session::init('sf_order_num', null);

        if ($sent) {
            echo json_encode(['success' => true, 'message' => 'Заявка отправлена']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Ошибка отправки. Попробуйте позже.']);
        }
    }

    private function generatePdf(array $snapshot): ?string
    {
        $all = Functions::getServices();
        $resolvedItems = [];
        $totalSum = 0;
        foreach ($snapshot['items'] as $item) {
            $pid = (int)($item['product_id'] ?? 0);
            $qty = (int)($item['qty'] ?? 0);
            if ($pid < 1 || $qty < 1 || !isset($all[$pid])) continue;
            $p = $all[$pid];
            $title = $p['title'];
            $price = $p['price'];
            $resolvedItems[] = [
                'title' => $title,
                'price' => $price,
                'qty' => $qty,
                'total' => $price * $qty,
            ];
            $totalSum += $price * $qty;
        }
        if (empty($resolvedItems)) return null;

        $orderNum = $snapshot['order_num'] ?? '—';
        $dateRu = $snapshot['date'] ?? date('d.m.Y H:i');
        $phone = $snapshot['phone'] ?? '';
        $comment = $snapshot['comment'] ?? '';

        $rowsHtml = '';
        foreach ($resolvedItems as $ri) {
            $rowsHtml .= '<tr>
                <td>' . htmlspecialchars($ri['title']) . '</td>
                <td style="text-align:center">' . $ri['qty'] . '</td>
                <td style="text-align:right">' . number_format($ri['price'], 0, '', ' ') . ' ₽</td>
                <td style="text-align:right">' . number_format($ri['total'], 0, '', ' ') . ' ₽</td>
            </tr>';
        }

        $html = '<!DOCTYPE html>
<html lang="ru">
<head><meta charset="UTF-8">
<style>
  @page { margin: 20mm; }
  body { font-family: DejaVu Sans, sans-serif; font-size: 12pt; color: #222; }
  .header { text-align: center; margin-bottom: 24px; }
  .header h1 { font-size: 18pt; margin: 0 0 4px; text-transform: uppercase; letter-spacing: 2px; }
  .header p { margin: 0; color: #666; font-size: 10pt; }
  .order-meta { margin-bottom: 20px; }
  .order-meta td { padding: 2px 0; font-size: 10pt; }
  table.items { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
  table.items th { background: #1C1512; color: #fff; padding: 8px 10px; font-size: 10pt; text-align:left; }
  table.items td { padding: 8px 10px; border-bottom: 1px solid #ddd; font-size: 10pt; }
  .total-row td { font-weight: bold; font-size: 12pt; border-top: 2px solid #1C1512; }
  .footer { text-align: center; font-size: 9pt; color: #999; margin-top: 30px; }
</style>
</head>
<body>
<div class="header">
  <h1>MANDO MEMORI</h1>
  <p>Чистка обуви в Москве</p>
</div>
<table class="order-meta">
  <tr><td><strong>Заказ:</strong> ' . $orderNum . '</td></tr>
  <tr><td><strong>Дата:</strong> ' . $dateRu . '</td></tr>
  ' . ($phone ? '<tr><td><strong>Телефон:</strong> ' . htmlspecialchars($phone) . '</td></tr>' : '') . '
</table>
<table class="items">
  <thead>
    <tr>
      <th>Услуга</th>
      <th style="text-align:center">Кол-во</th>
      <th style="text-align:right">Цена</th>
      <th style="text-align:right">Сумма</th>
    </tr>
  </thead>
  <tbody>
    ' . $rowsHtml . '
    <tr class="total-row">
      <td colspan="3" style="text-align:right">Итого:</td>
      <td style="text-align:right">' . number_format($totalSum, 0, '', ' ') . ' ₽</td>
    </tr>
  </tbody>
</table>
<p style="font-size:10pt;color:#666">Спасибо, что выбираете MANDO MEMORI!<br>По всем вопросам: maksim1144 (Telegram) или +7 (915) 252-75-75</p>
' . ($comment ? '<p style="font-size:10pt;color:#333;border-top:1px solid #ddd;padding-top:12px"><strong>Комментарий к заказу:</strong></p><div style="font-size:10pt;color:#333;line-height:1.5">' . strip_tags($comment, '<strong><em><b><i><u><s><ol><ul><li><br><p><span>') . '</div>' : '') . '
<div class="footer">Данный чек является подтверждением заказа.</div>
</body>
</html>';

        try {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $tmpPath = sys_get_temp_dir() . '/check-' . preg_replace('/[^A-Za-z0-9_\-]/', '', $orderNum) . '.pdf';
            file_put_contents($tmpPath, $dompdf->output());
            return $tmpPath;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function onUploadFiles(): void
    {
        header('Content-Type: application/json');

        $uploadDir = sys_get_temp_dir() . '/courier_uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'application/pdf'];
        $maxFileSize = 10 * 1024 * 1024; // 10 MB
        $maxFiles = 5;

        $files = $_FILES['files'] ?? [];
        $uploaded = [];

        if (empty($files['name'][0])) {
            echo json_encode(['success' => false, 'error' => 'Файлы не выбраны']);
            return;
        }

        $fileCount = count(array_filter($files['name']));
        if ($fileCount > $maxFiles) {
            echo json_encode(['success' => false, 'error' => "Максимум $maxFiles файлов"]);
            return;
        }

        for ($i = 0; $i < $fileCount; $i++) {
            $name = $files['name'][$i];
            $tmpName = $files['tmp_name'][$i];
            $size = $files['size'][$i];
            $type = $files['type'][$i];
            $error = $files['error'][$i];

            if ($error !== UPLOAD_ERR_OK) {
                continue;
            }

            if ($size > $maxFileSize) {
                echo json_encode(['success' => false, 'error' => "Файл $name слишком большой (макс. 10 МБ)"]);
                return;
            }

            if (!in_array($type, $allowedTypes)) {
                echo json_encode(['success' => false, 'error' => "Неподдерживаемый тип файла: $name"]);
                return;
            }

            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '', pathinfo($name, PATHINFO_FILENAME));
            $newName = $safeName . '_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
            $destPath = $uploadDir . $newName;

            if (move_uploaded_file($tmpName, $destPath)) {
                $uploaded[] = [
                    'original_name' => $name,
                    'stored_name' => $newName,
                    'url' => '/tmp/courier_uploads/' . $newName,
                    'size' => $size,
                    'type' => $type,
                ];
            }
        }

        echo json_encode(['success' => true, 'files' => $uploaded]);
    }

    public function onServeUpload(...$args): void
    {
        $filename = $args['filename'] ?? ($args[1] ?? '');
        if (!$filename || preg_match('/[^a-zA-Z0-9._-]/', $filename)) {
            http_response_code(404);
            echo 'Not found';
            return;
        }

        $filePath = sys_get_temp_dir() . '/courier_uploads/' . $filename;
        if (!file_exists($filePath)) {
            http_response_code(404);
            echo 'Not found';
            return;
        }

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'webp' => 'image/webp',
            'gif' => 'image/gif',
            'pdf' => 'application/pdf',
        ];
        $mime = $mimeTypes[$ext] ?? 'application/octet-stream';

        header('Content-Type: ' . $mime);
        header('Content-Length: ' . filesize($filePath));
        header('Cache-Control: public, max-age=3600');
        readfile($filePath);
    }
}