<h1>Товары</h1>

<?php if(isAdmin()): ?>
    <a href="?c=goods&a=create" class="btn btn-primary">Добавить новый</a>
    <br><br>
<?php endif; ?>

<?php if(count($goods)): ?>
    <div class="row">
        <?php foreach ($goods as $id => $good): ?>
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <a href="?c=goods&a=one&id=<?= $good['id'] ?>">
                        <img src="img/<?= $good['img'] ?>" class="card-img-top">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title"><?= $good['name'] ?></h5>
                        <p class="card-text"><?= $good['info'] ?></p>

                        <?php if($good['count'] > 0): ?>
                            <?php if(countCartItem($good['id'])): ?>
                                <span class="badge badge-success">Товар в корзине</span><br>
                            <?php else: ?>
                                <div>
                                    <button class="btn btn-primary btn-sm js-add-to-to-cart" data-id="<?= $good['id']; ?>">В корзину</button>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="badge badge-danger">Товар закончился</span>
                        <?php endif; ?>

                        <br>
                        <a href="?c=goods&a=one&id=<?= $good['id'] ?>">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Товаров пока нет.</p>
<?php endif; ?>
