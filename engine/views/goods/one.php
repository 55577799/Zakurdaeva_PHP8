<div>
    <h1><?= $good['name']; ?></h1>

    <img src="img/<?= $good['img']; ?>"><br><br>
    <p><?= $good['info']; ?></p>

    Цена: <strong><?= $good['price']; ?></strong> руб.<br><br>


    <?php if($good['count'] > 0): ?>
        <?php if(countCartItem($good['id']) > 0): ?>
            <span class="badge badge-success">Товар в корзине</span>
        <?php else: ?>
            <div>
                <button class="btn btn-primary btn-sm js-add-to-to-cart" data-id="<?= $good['id']; ?>">В корзину</button>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <span class="badge badge-danger">Товар закончился.</span>
    <?php endif; ?>

    <hr>
    <a href="<?= $_SERVER['HTTP_REFERER']; ?>">Назад</a>
</div>
