<?php
class AuthorizationController extends Controller
{
    public function process($params)
    {
        $this->data['errorMessage'] = '';

        if ($_POST) {
            if ($_POST['login'] === 'admin'
                && $_POST['password'] === '123') {
                    $_SESSION['admin'] = 'on';
                    $this->redirect('tasks');
                } else {
                    $this->data['errorMessage'] = 'Неверный логин/пароль!';
                }
        }

        $this->title = 'Авторизация';
        $this->view = 'authorization';
    }
}
