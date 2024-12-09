<?php
$title = 'Изменить товар';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$_GET['id'] ?? '']);
$product = $stmt->fetch();
?>

<div class="container mt-3">
    <h1 class="text-primary mb-3"><?= $title ?></h1>

    <div class="row">
        <div class="col-4">
            <form action="/products/actions/update.php" method="post">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Название <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= $product['name'] ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена <span class="text-danger">*</span></label>
                    <input type="number" name="price" class="form-control" id="price" value="<?= $product['price'] ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label for="article" class="form-label">Артикул</label>
                    <input type="text" name="article" class="form-control" id="article"
                           value="<?= $product['article'] ?>">
                </div>

                <input type="submit" class="btn btn-success" value="Изменить">
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
