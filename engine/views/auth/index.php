<div class="row">
    <div class="col-sm-4 offset-sm-4">

        <div class="alert alert-secondary">
            Демо доступы:<br>
            <ul>
                <li>логин: <code>admin</code>, пароль: <code>secret</code></li>
                <li>логин: <code>user1</code>, пароль: <code>secret</code></li>
                <li>логин: <code>user2</code>, пароль: <code>secret</code></li>
            </ul>
        </div>

        <form method="post" action="?c=auth&a=login">
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" id="login" name="login" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Вход</button>
        </form>
    </div>
</div>


