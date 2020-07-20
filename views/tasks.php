<?php 
    $order = '';
    $orderField = '';
    if (isset($_GET['order']))
        $order = 'order=' . $_GET['order'] . '&';
    if (isset($_GET['orderField']))
        $orderField = 'orderField=' . $_GET['orderField'] . '&';    
?>

<?php foreach ($errorMessages as $errorMessage): ?>
    <div class="alert alert-danger">
        <?= $errorMessage ?>
    </div>
<?php endforeach ?>

<?php foreach ($messages as $message): ?>
    <div class="alert alert-success">
        <?= $message ?>
    </div>
<?php endforeach ?>

<table class = "table">
    <thead>
    <tr>
        <th>
            Пользователь
            <a href='/tasks?orderField=user&amp;order=asc'>&#8593;</a>
            <a href='/tasks?orderField=user&amp;order=desc'>&#8595;</a>
        </th>
        <th>
            e-mail
            <a href='/tasks?orderField=e-mail&amp;order=asc'>&#8593;</a>
            <a href='/tasks?orderField=e-mail&amp;order=desc'>&#8595;</a>
        </th>
        <th>
            Текст
        </th>
        <?php if (@$_SESSION['admin']): ?>
            <th></th>
        <?php endif ?>
        <th>
            Статус задачи
            <a href='/tasks?orderField=completion&amp;order=asc'>&#8593;</a>
            <a href='/tasks?orderField=completion&amp;order=desc'>&#8595;</a>
        </th>
        <?php if (@$_SESSION['admin']): ?>
            <th></th>
        <?php endif ?>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>     
        <tr>
            <td><?= $task['user'] ?></td>
            <td><?= $task['e-mail'] ?></td>
            <td><?= $task['text'] ?></td>
            <?php if (@$_SESSION['admin']): ?>
                <td>
                    <a href = '/edit?id=<?= $task['id'] ?>&amp;text=<?= $task['text'] ?>' >&#9998;</a>
                </td>
            <?php endif ?>
            <td>
            <?php if ($task['completion']): ?>
                Выполнена
            <?php endif ?>
            </td>
            <?php if (@$_SESSION['admin'] && ($task['completion'] !== 'completed')): ?>
            <td>
                <form method = 'POST'>
                    <input type = 'hidden' name = 'id' value = '<?= $task['id'] ?>' />
                    <input type = 'hidden' name = 'submit' value = 'completeTask' />
                    <input type = 'submit' value = '&#9989;' />
                </form>
            </td>
            <?php else: ?>
                <td></td>
            <?php endif ?>
            <td>
            <?php if ($task['edition'] === 'edited'): ?>
                (Отредактировано администратором)
            <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>  
    </tbody>
</table>

<div class="btn-toolbar" role = "toolbar">
<div class="btn-group mr-2" role="group">
<?php if (ceil($count / TasksModel::PAGE_LIMIT) > 1): ?>
<?php for ($i = 1; $i <= ceil($count / TasksModel::PAGE_LIMIT); $i++): ?>
<a class="btn btn-secondary" href="/tasks?<?=$order?><?=$orderField?>page=<?= $i ?>"><?= $i ?></a>
<?php endfor ?>
<?php endif ?>
</div>
</div>

<form method = 'POST'>
    <div class='form-group'>
        <label for = 'user'>Пользователь</label>
        <input type = 'text' class = 'form-control' name = 'user' />
    </div>
    <div class='form-group'>
        <label for = 'e-mail'>e-mail</label>
        <input type = 'email' class = 'form-control' name = 'e-mail' />
    </div>
    <div class='form-group'>
        <label for = 'text'>Текст</label>
        <textarea rows='4' class = 'form-control' name = 'text' ></textarea>
    </div>
    <input type = 'hidden' name = 'submit' value = 'addTask' />
    <button type = 'submit' class = 'btn btn-primary'> Отправить</button>
</form>
</div>