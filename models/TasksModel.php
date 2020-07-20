<?php
class TasksModel
{
    const PAGE_LIMIT = 3;

    public static function getTasks($orderField = 'id', $order = 'ASC', $page = 1)
    {
        $offset = ($page - 1) * self::PAGE_LIMIT;

        $query = "
            SELECT *
            FROM `tasks` ORDER BY `$orderField` $order
            LIMIT " . self::PAGE_LIMIT . " OFFSET $offset
        ";

        return Db::queryAll($query);
    }

    public static function getTasksCount()
    {
        $query = "
            SELECT COUNT(*)
            FROM `tasks`
        ";

        return Db::queryOne($query);
    }

    public static function addTask($params)
    {
        return Db::insert($params);
    }

    public static function editTask($id, $text){
        return Db::update(
            [
                'text' => $text,
                'edition' => 'edited'
            ],
            'WHERE `id` = ?',
            array($id)
        );
    }

    public static function completeTask($id)
    {   
        return Db::update(
            [
                'completion' => 'completed'
            ],
            'WHERE `id` = ?',
            array($id)
        );
    }
}