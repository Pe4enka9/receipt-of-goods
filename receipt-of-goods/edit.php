<?php
$title = 'Изменить поступление';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$products = $pdo->query("SELECT * FROM products")->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM receipt_of_goods WHERE id = ?");
$stmt->execute([$_GET['id'] ?? '']);
$receiptOfGood = $stmt->fetch();
?>

<div class="container mt-3">
    <h1 class="text-primary mb-3"><?= $title ?></h1>

    <div class="row">
        <div class="col-4">
            <form action="/receipt-of-goods/actions/update.php" method="post">
                <input type="hidden" name="id" value="<?= $receiptOfGood['id'] ?>">

                <div class="mb-3">
                    <label for="product_id" class="form-label">Товар <span class="text-danger">*</span></label>
                    <select name="product_id" id="product_id" class="form-select">
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id'] ?>"
                                <?= $product['id'] == $receiptOfGood['product_id'] ? 'selected' : '' ?>>
                                <?= $product['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Количество <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="amount" class="form-control"
                           value="<?= $receiptOfGood['amount'] ?>" required>
                </div>

                <input type="submit" class="btn btn-success" id="edit" value="Изменить">
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
