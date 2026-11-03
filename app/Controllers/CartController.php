<?php

namespace App\Controllers;

use App\Config\Session;
use Setting\Route\Function\Functions;

class CartController
{
  private static function products(): array
  {
    $all = Functions::getServices();
    $result = [];
    foreach ($all as $id => $p) {
      $result[$id] = [
        'title' => $p['title'],
        'price' => $p['price'],
        'image_url' => '/public/assets/images/' . $p['img'],
        'bg_color' => $p['bg'],
      ];
    }
    return $result;
  }

  private function readCart(): array
  {
    $data = Session::init();
    return $data['sf_cart'] ?? [];
  }

  private function writeCart(array $items): void
  {
    Session::init('sf_cart', $items);
  }

  private function json(array $data, int $code = 200): string
  {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $json;
    return $json;
  }

  public function onAdd(): void
  {
    $input = json_decode(file_get_contents('php://input'), true);
    $productId = (int)($input['product_id'] ?? 0);
    $qty = max(1, (int)($input['qty'] ?? 1));
    if ($productId < 1 || !isset(self::products()[$productId])) {
      $this->json(['ok' => false, 'error' => 'Товар не найден'], 400);
      return;
    }
    $items = $this->readCart();
    $found = false;
    foreach ($items as &$item) {
      if ((int)$item['product_id'] === $productId) {
        $item['qty'] += $qty;
        $found = true;
        break;
      }
    }
    if (!$found) {
      $items[] = ['product_id' => $productId, 'qty' => $qty];
    }
    $this->writeCart($items);
    $totalQty = array_sum(array_column($items, 'qty'));
    $product = self::products()[$productId];
    $this->json([
      'ok' => true,
      'count' => $totalQty,
      'added' => $product,
    ]);
  }

  public function onUpdate(): void
  {
    $input = json_decode(file_get_contents('php://input'), true);
    $productId = (int)($input['product_id'] ?? 0);
    $qty = max(0, (int)($input['qty'] ?? 0));
    if ($productId < 1) {
      $this->json(['ok' => false, 'error' => 'Неверный ID товара'], 400);
      return;
    }
    $items = $this->readCart();
    foreach ($items as $k => $item) {
      if ((int)$item['product_id'] === $productId) {
        if ($qty < 1) {
          unset($items[$k]);
        } else {
          $items[$k]['qty'] = $qty;
        }
        break;
      }
    }
    $items = array_values($items);
    $this->writeCart($items);
    $totalQty = array_sum(array_column($items, 'qty'));
    
    // Clear order session if cart is empty
    if ($totalQty === 0) {
      Session::init(['sf_order_num', 'sf_comment', 'sf_phone', 'sf_order_snapshot'], null);
    }
    
    $this->json(['ok' => true, 'count' => $totalQty]);
  }

  public function onRemove(): void
  {
    $input = json_decode(file_get_contents('php://input'), true);
    $productId = (int)($input['product_id'] ?? 0);
    if ($productId < 1) {
      $this->json(['ok' => false, 'error' => 'Неверный ID товара'], 400);
      return;
    }
    $items = $this->readCart();
    foreach ($items as $k => $item) {
      if ((int)$item['product_id'] === $productId) {
        unset($items[$k]);
        break;
      }
    }
    $items = array_values($items);
    $this->writeCart($items);
    $totalQty = array_sum(array_column($items, 'qty'));
    
    // Clear order session if cart is empty
    if ($totalQty === 0) {
      Session::init(['sf_order_num', 'sf_comment', 'sf_phone', 'sf_order_snapshot'], null);
    }
    
    $this->json(['ok' => true, 'count' => $totalQty]);
  }

  public function onGet(): void
  {
    $items = $this->readCart();
    $totalQty = array_sum(array_column($items, 'qty'));
    $formatted = [];
    foreach ($items as $item) {
      $pid = (int)$item['product_id'];
      $product = self::products()[$pid] ?? null;
      if (!$product) continue;
      $formatted[] = [
        'product_id' => $pid,
        'qty' => $item['qty'],
        'title' => $product['title'],
        'image_url' => $product['image_url'],
        'bg_color' => $product['bg_color'],
        'item_total' => $item['qty'],
        'price' => $product['price'],
      ];
    }
    $this->json([
      'ok' => true,
      'count' => $totalQty,
      'items' => $formatted,
      'subtotal_rub' => 0,
    ]);
  }

  public function onComment(): void
  {
    $input = json_decode(file_get_contents('php://input'), true);
    $comment = trim($input['comment'] ?? '');
    $phone = trim($input['phone'] ?? '');
    Session::init('sf_comment', $comment);
    Session::init('sf_phone', $phone);
    $this->json(['ok' => true]);
  }
}
