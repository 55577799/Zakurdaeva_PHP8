<?php
function indexAction()
{
    $sql = "select * from goods where count > 1 order by rand() limit 1";
    $result = mysqli_query(getConnect(), $sql);
    $randomGood = mysqli_fetch_assoc($result);

    return renderView('views/index.php',  ['randomGood' => $randomGood]);
}
