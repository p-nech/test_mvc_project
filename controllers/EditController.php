<?php
class EditController extends Controller
{
    public function process($params)
    {
        $this->data['errorMessage'] = '';

        if ($_POST) {
            if (!isset($_SESSION['admin'])) {
                $this->redirect('authorization');
            } 
            
            TasksModel::editTask($_POST['id'], $_POST['taskText']);
            $this->redirect('tasks');
        }

        $this->title = 'Редактирование текста';
        $this->view = 'edit';
    }
}