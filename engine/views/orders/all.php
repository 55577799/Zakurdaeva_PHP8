<h1>Заказы</h1>

<table class="table table-hover">
    <tbody>

    <?php if (count($orders)): ?>

        <?php foreach ($orders as $order): ?>
            <tr>
                <td>
                    <a href="?c=orders&a=one&id=<?= $order['id'] ?>">Заказ № <strong><?= $order['id']; ?></strong></a>
                </td>
                <?php if (isAdmin()): ?>
                    <td>ФИО: <strong><?= $order['fio'] ?></strong></td>
                <?php endif; ?>
                <td>Стоимость: <strong><?= $order['price']; ?></strong></td>
                <td>Дата: <strong><?= $order['date']; ?></strong></td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="3">У вас пока нет заказов.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
