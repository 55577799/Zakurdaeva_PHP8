<h1>Корзина</h1>

<?php if(count($goods)): ?>

<p>Товаров: <strong><?= $totalCount; ?></strong>, на сумму <strong><?= $totalPrice; ?></strong> руб.</p>
    <?php if (isGuest()): ?>
        <p><a href="?c=auth">Войдите</a> в систему, чтобы оформить заказ!</p>
    <?php else: ?>
        <p><a href="?c=orders&a=save" class="btn btn-primary">Оформить заказ</a></p>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($goods as $id => $good): ?>
            <div class="col-sm-3 mb-3">
                <div class="card">

                    <a href="?c=goods&a=one&id=<?= $id ?>">
                        <img src="img/<?= $good['img'] ?>" class="card-img-top">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title"><?= $good['name'] ?></h5>
                        <a href="?c=cart&a=add&id=<?= $id ?>" class="btn btn-primary btn-sm mr-1">+</a>
                        <?= $good['count']; ?>шт.
                        <a href="?c=cart&a=del&id=<?= $id ?>" class="btn btn-primary btn-sm ml-1">-</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
<?php else: ?>
    <p>Ваша корзина пока пуста.</p>
<?php endif; ?>
