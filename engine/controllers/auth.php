<?php

function indexAction()
{
    if (isset($_SESSION['auth'])) {
       unset($_SESSION['auth']);
    }

    return renderView('views/auth/index.php');
}

function logoutAction()
{
    unset($_SESSION['auth']);
    redirect('?c=auth');
}

function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?c=auth', 'Что-то пошло не так');
        return;
    }

    if (empty($_POST['login']) || empty($_POST['password'])) {
        redirect('?c=auth', 'Не все данные переданы');
        return;
    }

    $login = clearStr($_POST['login']);
    $password = trim($_POST['password']);

    $sql = "select id, login, fio, password, is_admin from users where login = '{$login}'";
    $result = mysqli_query(getConnect(), $sql);
    $row = mysqli_fetch_assoc($result);

    if (empty($row)) {
        redirect('?c=auth', 'Неверный логин или пароль.');
        return;
    }


    if (!password_verify($password, $row['password'])) {
        redirect('?c=auth', 'Неверный логин или пароль.');
        return;
    }

    $_SESSION['auth'] = [
        'id' => $row['id'],
        'is_admin' => $row['is_admin'],
    ];

    redirect('/', "Добро пожаловать <strong>{$row['fio']}</strong>!");
}

