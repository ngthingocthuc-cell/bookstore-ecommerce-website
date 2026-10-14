<?php
session_start();

header('Content-Type: application/json; charset=utf-8');

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Normalize items: ensure keys exist
$items = array_values(array_map(function ($item) {
    return [
        'name' => isset($item['name']) ? $item['name'] : '',
        'price' => isset($item['price']) ? $item['price'] : 0,
        'image' => isset($item['image']) ? $item['image'] : '',
        'qty' => isset($item['qty']) ? $item['qty'] : 1,
    ];
}, $cart));

$response = [
    'count' => count($items),
    'items' => $items,
];

echo json_encode($response);
