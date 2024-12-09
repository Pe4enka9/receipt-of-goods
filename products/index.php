<?php
$title = 'Товары';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$products = $pdo->query("SELECT * FROM products")->fetchAll();
?>

    <div class="container mt-3">
        <h1 class="text-primary mb-3"><?= $title ?></h1>
        <a href="/products/create.php" class="btn btn-primary mb-3">Добавить товар</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Артикул</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['article'] ?></td>
                    <td><a href="/products/edit.php?id=<?= $product['id'] ?>" class="btn btn-primary">Изменить</a></td>
                    <td><a href="/products/actions/delete.php?id=<?= $product['id'] ?>" class="btn btn-danger">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>