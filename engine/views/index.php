<div class="jumbotron">
    <h1 class="display-4">Маруся shop!</h1>
    <p class="lead">Известные бренды по низким ценам!</p>
</div>
<?php if($randomGood): ?>
    <h3>Товар дня <?= $randomGood['name']; ?></h3>
    <img src="img/<?= $randomGood['img']; ?>"><br><br>
    <p><?= $randomGood['info']; ?></p>
    Цена: <strong><?= $randomGood['price']; ?></strong> руб.<br><br>
    <?php if(countCartItem($randomGood['id']) > 0): ?>
        <span class="badge badge-success">Товар в корзине</span>
    <?php else: ?>
        <div>
            <button class="btn btn-primary btn-sm js-add-to-to-cart" data-id="<?= $randomGood['id']; ?>">В корзину</button>
        </div>
    <?php endif; ?>
<?php endif; ?>

