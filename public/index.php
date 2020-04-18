<?php
session_start();

include dirname(__DIR__) . '/engine/lib.php';

$msg = getMsg();
$content = getContent();
$count = countCart();

if(isAjax()){
    echo $content;
    return;
}

echo renderView('views/layout.php', [
    'msg' => $msg,
    'content' => $content,
    'count' => $count
]);
