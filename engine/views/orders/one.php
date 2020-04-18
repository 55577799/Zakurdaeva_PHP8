<h1>Заказ № <?= $order['id']; ?></h1>
<h3>Состав заказа</h3>
<table class="table table-hover">
    <tbody>
    <?php foreach ($orderGoods as $orderGood): ?>
        <tr>
            <td><?= $orderGood['name']; ?></td>
            <td><?= $orderGood['count']; ?> шт.</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<hr>
<p>Стоимость заказа: <strong><?= $order['price']?></strong> руб., дата заказа: <strong><?= $order['date']?></strong>.</p>


