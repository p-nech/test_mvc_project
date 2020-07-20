<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title><?= $this->title ?></title>
</head>
<body>
    <div class = "container">
        <div class = "authorization mt-2 mb-5" >
        <?php if (!isset($_SESSION['admin'])): ?>
            <a class = 'btn btn-success' href = '/authorization'>Авторизация</a>
        <?php else: ?>
            <a class = 'btn btn-danger' href = '/tasks?logout=1'>Выйти</a>
        <?php endif ?>
        </div>
        <div class = "content">
            <?= $this->controller->renderView(); ?>
        </div>
    </div>
</body>
</html>