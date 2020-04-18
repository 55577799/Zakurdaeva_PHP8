<?php

function indexAction()
{
    return allAction();
}

function allAction()
{
    $sql = "select * from goods order by id desc";
    $result = mysqli_query(getConnect(), $sql);
    $goods = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return renderView('views/goods/all.php', ['goods' => $goods]);
}

function oneAction()
{
    $id = getId();
    $sql = "select * from goods where id = {$id}";
    $result = mysqli_query(getConnect(), $sql);
    $good = mysqli_fetch_assoc($result);

    return renderView('views/goods/one.php', ['good' => $good]);
}

function createAction()
{
    if(!isAdmin()){
        return renderView('views/error.php', ['code' => 403, 'message' => 'Отказано в доступе.']);
    }

    return renderView('views/goods/create.php');
}

function storeAction()
{
    if(!isAdmin()){
        return renderView('views/error.php', ['code' => 403, 'message' => 'Отказано в доступе.']);
    }

    $name = isset($_POST['name']) ? clearStr($_POST['name']) : '';
    $info = isset($_POST['info']) ? clearStr($_POST['info']) : '';
    $price = isset($_POST['price']) ? clearStr($_POST['price']) : '';
    $count = isset($_POST['count']) ? clearStr($_POST['count']) : '';
    $imgName = isset($_FILES['img']) ? basename($_FILES['img']['tmp_name']) : '';

    if (!($name && $info && $price && $count && $imgName)) {
        redirect('?c=goods&a=create', 'Не все данные переданы.');
        return;
    }

    // проверяем расширение файла
    $imgExt = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    if(!in_array(strtolower($imgExt), ['png', 'jpg', 'jpeg']) || ($_FILES['img']['size'] > 500000)) {
        redirect('?c=goods&a=create', 'Недопустимый тип или размер файла.');
        return;
    }

    // сохряняем файл
    $img =  $imgName . '.' . $imgExt;
    move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $img);

    // создаем запись в таблице goods
    $sql = "insert into goods (name, info, img,  price, count) values ('{$name}', '{$info}', '{$img}', {$price}, {$count})";
   mysqli_query(getConnect(), $sql);


    redirect('?c=goods', 'Новый товар был создан.');
}
