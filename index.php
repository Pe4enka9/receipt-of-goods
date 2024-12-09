<?php
$title = 'Поступление товара';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$receiptOfGoods = $pdo->query("SELECT
receipt_of_goods.*,
products.name AS product_name
FROM receipt_of_goods
JOIN products ON receipt_of_goods.product_id = products.id")->fetchAll();
?>

<div class="container mt-3">
    <h1 class="text-primary mb-3"><?= $title ?></h1>
    <a href="/receipt-of-goods/create.php" class="btn btn-primary mb-3">Добавить поступление</a>
    <a href="/products/" class="btn btn-outline-secondary mb-3">Товары</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Название товара</th>
            <th>Дата и время</th>
            <th>Количество</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($receiptOfGoods as $receiptOfGood): ?>
            <tr>
                <th><?= $receiptOfGood['id'] ?></th>
                <td><?= $receiptOfGood['product_name'] ?></td>
                <td><?= $receiptOfGood['date'] ?></td>
                <td><?= $receiptOfGood['amount'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
