<?php
$title = 'Добавить товар';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

<div class="container mt-3">
    <h1 class="text-primary mb-3"><?= $title ?></h1>

    <div class="row">
        <div class="col-4">
            <form action="/products/actions/store.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Название <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена <span class="text-danger">*</span></label>
                    <input type="number" name="price" class="form-control" id="price" required>
                </div>

                <div class="mb-3">
                    <label for="article" class="form-label">Артикул</label>
                    <input type="text" name="article" class="form-control" id="article">
                </div>

                <input type="submit" class="btn btn-success" id="add" value="Добавить">
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
