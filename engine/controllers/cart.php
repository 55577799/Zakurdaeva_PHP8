<?php
function indexAction()
{
    $goods = isset($_SESSION['goods']) ? $_SESSION['goods'] : [];

    $totalCount = array_reduce($goods, function ($carry, $item) {
        return $carry += $item['count'];
    }, 0);

    $totalPrice = array_reduce($goods, function ($carry, $item) {
        return $carry += ($item['price'] * $item['count']);
    }, 0);

    return renderView('views/cart/index.php', [
        'goods' => $goods,
        'totalCount' => $totalCount,
        'totalPrice' => $totalPrice,
    ]);
}

function addAction()
{
    $id = getId();
    $hasGood = hasGoodsForAddInCart($id);

    if ($hasGood) {
        redirect("", 'Товар добавлен в корзину');
        return;
    }

    redirect('?c=goods', 'Что-то пошло не так');
    return;
}

function ajaxAddAction()
{
    header('Content-Type: application/json');
    $id = getId();
    $response = [
        'success' => hasGoodsForAddInCart($id),
        'count' => countCart()
    ];
    echo json_encode($response);
}

function delAction()
{
    $id = getId();
    $hasGood = hasGoodsForDelFromCart($id);

    if ($hasGood) {
        redirect("", 'Товар был удален из корзины');
        return;
    }

    redirect('?c=goods', 'Что-то пошло не так');
    return;
}

function hasGoodsForAddInCart($id)
{
    if (empty($id)) {
        return false;
    }

    if (!empty($_SESSION['goods'][$id])) {
        $_SESSION['goods'][$id]['count']++;
        return true;
    }

    $sql = "select * from goods where id = {$id}";
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);

    if (empty($row)) {
        return false;
    }

    $_SESSION['goods'][$id] = [
        'name' => $row['name'],
        'info' => $row['info'],
        'img' => $row['img'],
        'price' => $row['price'],
        'count' => 1,
    ];

    return true;
}

function hasGoodsForDelFromCart($id)
{
    if (empty($id)) {
        return false;
    }

    if (!empty($_SESSION['goods'][$id])) {

        $_SESSION['goods'][$id]['count']--;

        if($_SESSION['goods'][$id]['count'] < 1) {
            unset($_SESSION['goods'][$id]);
        }
    }

    return true;
}

