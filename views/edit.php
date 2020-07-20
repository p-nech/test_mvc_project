<?php if ($errorMessage): ?>
    <div class='alert alert-danger'>
        <?= $errorMessage ?>
    </div>
<?php endif ?>
<form method = 'POST'>
    <div class='form-group'>
        <textarea rows = '4' name = 'taskText' class = 'form-control'><?= $_GET['text'] ?></textarea> 
    </div>
    <input type = 'hidden' name = 'id' value = '<?= $_GET['id'] ?>' />
    <button type = 'submit' class = 'btn btn-primary' >Сохранить</button>
</form>
<br/><a class = 'btn btn-secondary' href = '/tasks'>Назад</a>