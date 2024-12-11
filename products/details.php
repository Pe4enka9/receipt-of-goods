<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT * FROM products WHERE article = ?");
$stmt->execute([$_GET['article'] ?? '']);
$product = $stmt->fetch();

$stmt = $pdo->prepare("SELECT id, date, amount FROM receipt_of_goods WHERE product_id = ?");
$stmt->execute([$product['id']]);
$receiptOfGoods = $stmt->fetchAll();

$title = $product['name'];
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

<div class="container mt-3">
    <a href="/" class="btn btn-outline-secondary mb-3" id="back">Назад</a>
    <h1 class="text-primary mb-3"><?= $title ?></h1>

    <h2 class="text-secondary mb-3">Поступления товара</h2>
    <a href="/receipt-of-goods_product/create.php?article=<?= $product['article'] ?>" class="btn btn-primary mb-3"
       id="add_receipt">Добавить поступление</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Дата и время</th>
            <th>Количество</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($receiptOfGoods as $receiptOfGood): ?>
            <tr>
                <td><?= date('d.m.Y H:i:s', strtotime($receiptOfGood['date'])) ?></td>
                <td><?= $receiptOfGood['amount'] ?></td>
                <td>
                    <a href="/receipt-of-goods_product/edit.php?id=<?= $receiptOfGood['id'] ?>&article=<?= $product['article'] ?>"
                       class="btn btn-primary" id="edit_receipt">Изменить</a>
                </td>
                <td>
                    <a href="/receipt-of-goods_product/actions/delete.php?id=<?= $receiptOfGood['id'] ?>&article=<?= $product['article'] ?>"
                       class="btn btn-danger" id="delete_receipt">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
