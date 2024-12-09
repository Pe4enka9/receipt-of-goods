<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("INSERT INTO products (name, price, article) VALUES (:name, :price, :article)");
$stmt->execute([
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'article' => $_POST['article']
]);

header('Location: /products/');