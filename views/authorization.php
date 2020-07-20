<?php if ($errorMessage): ?>
    <div class='alert alert-danger'>
        <?= $errorMessage ?>
    </div>
<?php endif ?>
<form method = 'POST'>
    <div class='form-group'>
        <label for = 'login'>Логин</label>
        <input type = 'text' class = 'form-control' name = 'login' />
    </div>
    <div class='form-group'>
        <label for='password'>Пароль</label>
        <input type = 'password' class = 'form-control' name = 'password' />
    </div>
    <button type = 'submit' class = 'btn btn-primary' >Отправить</button>
</form>
<br/><a class = 'btn btn-secondary' href = '/tasks'>Назад</a>