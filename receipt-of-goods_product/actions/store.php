<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("INSERT INTO receipt_of_goods (product_id, amount, date) VALUES (:product_id, :amount, :date)");
$stmt->execute([
    'product_id' => $_POST['product_id'],
    'amount' => $_POST['amount'],
    'date' => $_POST['date']
]);

header('Location: /products/details.php?article=' . $_POST['article']);