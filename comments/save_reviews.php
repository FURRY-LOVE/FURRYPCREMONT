<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['reviews'])) {
    $reviews = $input['reviews'];
    $filename = 'reviews.txt';
    
    // Сохраняем отзывы в файл
    if (file_put_contents($filename, json_encode($reviews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT))) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Не удалось сохранить отзывы']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Нет данных для сохранения']);
}
?>