<?php
$title = 'Добавить поступление';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$products = $pdo->query("SELECT * FROM products")->fetchAll();
?>

<div class="container mt-3">
    <h1 class="text-primary mb-3"><?= $title ?></h1>

    <div class="row">
        <div class="col-4">
            <form action="/receipt-of-goods/actions/store.php" method="post">
                <div class="mb-3">
                    <label for="product_id" class="form-label">Товар</label>
                    <select name="product_id" id="product_id" class="form-select">
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Количество</label>
                    <input type="number" name="amount" id="amount" class="form-control">
                </div>

                <input type="submit" class="btn btn-success" value="Добавить">
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>