<h1>Новый товар</h1>

<form method="POST" action="?c=goods&a=store" enctype="multipart/form-data">

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Название</label>
                <input class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="col-sm-6 pt-2">
            <label for="img">Изображение</label><br>
            <input type="file" id="img" name="img">
            <small id="passwordHelpBlock" class="form-text text-muted">Допустимые тип: <code>png</code>, <code>jpg</code>, <code>jpeg</code>, допустимый размер до <code>500 килобайт</code>.</small>
        </div>
    </div>

    <div class="form-group">
        <label for="info">Инфо</label>
        <textarea class="form-control" id="info" rows="5" name="info"></textarea>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="price">Стоимость</label>
                <input class="form-control" id="price" name="price" type="number" value="100" min="100" max="100000" step="100">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="count">Количество</label>
                <input class="form-control" id="count" name="count" type="number" value="1" min="1" max="10000">
            </div>
        </div>
    </div>



    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
