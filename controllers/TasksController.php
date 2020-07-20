<?php
class TasksController extends Controller
{
    public function process($params)
    {
        $this->data['errorMessages'] = [];
        $this->data['messages'] = [];

        if ($_POST) {
            if ($_POST['submit'] === 'addTask') {
                $validated = true;
                
                if ($_POST['user'] === '') {
                    $this->data['errorMessages'][] = 'Пустое поле пользователя!';
                    $validated = false;
                } 

                if ($_POST['e-mail'] === '') {
                    $this->data['errorMessages'][] = "Пустое поле e-mail!";
                    $validated = false;
                } else if (!filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) {
                    $this->data['errorMessages'][] = 'Значение e-mail не валидно!';
                    $validated = false;
                }

                if ($_POST['text'] === '') {
                    $this->data['errorMessages'][] = "Пустое поле с текстом!";
                    $validated = false;
                }
                
                if ($validated) {
                    TasksModel::addTask([
                        'user' => $_POST['user'],
                        'e-mail' => $_POST['e-mail'],
                        'text' => $_POST['text']
                    ]);

                    $this->data['messages'][] = 'Задача успешно добавлена!';
                }
                
            } else if ($_POST['submit'] === 'completeTask') {
                if (!isset($_SESSION['admin'])) {
                    $this->redirect('authorization');
                } 

                $this->data['messages'][] = 'Задача выполнена';

                TasksModel::completeTask($_POST['id']);
                
            }           
        }

        if ($_GET) {   
            if (@$_GET['logout']) 
                unset($_SESSION['admin']);

            $orderField = @$_GET['orderField'] ?: 'id'; 
            $order = @$_GET['order'] ?: 'asc'; 
            $page = @$_GET['page'] ?: 1; 

            $this->data['tasks'] = TasksModel::getTasks($orderField, $order, $page);
        } else {
            $this->data['tasks'] = TasksModel::getTasks();
        }

        $this->data['count'] = TasksModel::getTasksCount()[0];

        $this->title = 'Список заданий';
        $this->view = 'tasks';
    }
}
