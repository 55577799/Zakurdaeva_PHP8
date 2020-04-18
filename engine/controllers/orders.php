<?php
function indexAction()
{
    return allAction();
}

function allAction()
{

    if(isGuest()){
        return renderView('views/error.php', ['code' => 403, 'message' => 'Отказано в доступе.']);
    }

    $userId = $_SESSION['auth']['id'];
    $sql = "select orders.id, orders.price, orders.date, users.fio from orders, users where orders.user_id = users.id";

    if(!isAdmin()) {
        $sql .= " AND user_id = {$userId}";
    }

    $result = mysqli_query(getConnect(), $sql);
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return renderView('views/orders/all.php', ['orders' => $orders]);
}

function oneAction()
{
    if(isGuest()){
        return renderView('views/error.php', ['code' => 403, 'message' => 'Отказано в доступе.']);
    }

    $id = getId();
    $userId = $_SESSION['auth']['id'];

    // данные заказа
    $sql = "select orders.id, orders.price, orders.date from orders where orders.id = {$id}";

    // чужие заказы может смотреть только админ
    if(!isAdmin()) {
        $sql .= " and orders.user_id = {$userId}";
    }

    $result = mysqli_query(getConnect(), $sql);
    $order = mysqli_fetch_assoc($result);

    if(!$order) {
        return renderView('views/error.php', ['code' => 404, 'message' => 'Страница не найдена.']);
    }

    // теперь нам нужно получить состав заказа
    $sql = "select order_goods.count, goods.name from order_goods, goods where order_goods.good_id = goods.id and order_goods.order_id = {$id}";
    $result = mysqli_query(getConnect(), $sql);
    $orderGoods = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return renderView('views/orders/one.php', ['order' => $order, 'orderGoods' => $orderGoods]);
}

function saveAction()
{
    if(isGuest()){
        return renderView('views/error.php', ['code' => 403, 'message' => 'Отказано в доступе.']);
    }

    $userId = $_SESSION['auth']['id'];
    $goods = isset($_SESSION['goods']) ? $_SESSION['goods'] : [];

    // считаем стоимость товаров в заказе (с учетом их количества)
    $price = array_reduce($goods, function ($carry, $item) {
        return $carry += ($item['price'] * $item['count']);
    }, 0);

    $date = date('Y-m-d');

    // создаем запись в таблице orders
    $sql = "insert into orders (user_id, price, date) values ({$userId}, {$price}, '{$date}')";
    mysqli_query(getConnect(), $sql);
    $orderId = mysqli_insert_id(getConnect());

    // обходим все товары заказа (корзины)
    foreach ($goods as $goodId => $good) {

        // создаем запись в таблице order_goods
        $sql = "insert into order_goods (order_id, good_id, count) values ({$orderId}, {$goodId}, {$good['count']})";
        mysqli_query(getConnect(), $sql);

        // теперь нам нужно уменьшить количество товара в таблице orders
        $sql = "update goods set count = count - {$good['count']} where id = {$goodId} and count >= {$good['count']}";
        mysqli_query(getConnect(), $sql);
    }

    // теперь очищаем корзину
    unset($_SESSION['goods']);

    redirect('?c=orders', 'Заказ оформлен, спасибо!');
}

