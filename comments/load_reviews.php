<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$filename = 'reviews.txt';

if (file_exists($filename)) {
    $reviewsData = file_get_contents($filename);
    $reviews = json_decode($reviewsData, true);
    
    if (json_last_error() === JSON_ERROR_NONE) {
        echo json_encode(['success' => true, 'reviews' => $reviews]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Ошибка чтения файла отзывов']);
    }
} else {
    echo json_encode(['success' => true, 'reviews' => []]);
}
?>