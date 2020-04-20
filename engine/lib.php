<?php

function getContent()
{
    $controller = 'index';
    if (!empty($_GET['c'])) {
        $controller = $_GET['c'];
    }

    $fileName = getFileName($controller);

    if (!file_exists($fileName)) {
        $fileName = getFileName('index');
    }

    include $fileName;

    $action = 'index';
    if (!empty($_GET['a'])) {
        $action = $_GET['a'];
    }

    if (!function_exists($action . 'Action')) {
        $action = 'index';
    }

    $actionName = $action . 'Action';
    return $actionName();
}

function getFileName($file)
{
    return __DIR__ . "/controllers/" . $file . '.php';
}

function getConnect()
{
    static $link;

    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', '', 'gbphp');
        mysqli_query($link, 'set names utf8');
    }

    return $link;
}


function getId()
{
    if (!empty($_GET['id'])) {
        return (int) $_GET['id'];
    }

    return 0;
}

function redirect($path = '', $msg = '')
{
    if (!empty($msg)) {
        $_SESSION['msg'] = $msg;
    }

    if (empty($path)) {
        $path = $_SERVER['HTTP_REFERER'];
    }

    header('Location: ' . $path);
}

function getMsg()
{
    $msg = '';

    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    return $msg;
}

function countCart($id = null)
{
    if (empty($_SESSION['goods'])) {
        return 0;
    }

    return count($_SESSION['goods']);
}

function countCartItem($id){

    if(isset($_SESSION['goods']) && isset($_SESSION['goods'][$id])) {
       return $_SESSION['goods'][$id]['count'];
    }

    return 0;
}

function clearStr($str)
{
    return mysqli_real_escape_string(getConnect(), strip_tags((trim($str))));
}

function isGuest()
{
    return empty($_SESSION['auth']);
}

function isAdmin()
{
    return !isGuest() && $_SESSION['auth']['is_admin'];
}


function renderView($viewPath, $data = [])
{
    extract($data); //Получили все переменные из массива $data
    ob_start(); //Включаем буфер
    include $viewPath; //Содержимое файла-шаблона будет в буфере
    return ob_get_clean(); //Очищаем буфер и возвращаем содержимое
}

function isAjax(){
    return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' );
}

function dd($value) {
    var_dump($value);
    exit();
}
