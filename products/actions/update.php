<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price, article = :article WHERE id = :id");
$stmt->execute([
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'article' => empty($_POST['article']) ? time() . mt_rand() : $_POST['article'],
    'id' => $_POST['id']
]);

header('Location: /');