<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <ul class="nav mb-3">
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="?c=goods" class="nav-link">Товары</a></li>
        <li class="nav-item">
            <a href="?c=cart" class="nav-link">
                Корзина <span class="badge badge-primary" id="cart"><?= $count; ?></span>
            </a>
        </li>

        <?php if(isGuest()): ?>
            <li class="nav-item"><a href="?c=auth" class="nav-link">Вход</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="?c=orders" class="nav-link">Заказы</a></li>
            <li class="nav-item"><a href="?c=auth&a=logout" class="nav-link">Выход</a></li>
        <?php endif; ?>
    </ul>

    <?php if($msg): ?>
    <div class="alert alert-info"><?= $msg; ?></div>
    <?php endif; ?>

    <?= $content; ?>

</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
