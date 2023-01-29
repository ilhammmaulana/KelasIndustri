<?php

namespace App\Service;

use App\Models\Todo;
use App\Repository\TodoRepository;
use App\Traits\ResponseApi;

class TodoService extends Todo{
    use ResponseApi;
    public static function getAllTodo()
    {
        $todos = TodoRepository::getAll();
        foreach($todos as $todo) {
            $todo->new_created_at = date('Y-m-d H:i:s', strtotime($todo->created_at));
            $todo->new_updated_at = date('Y-m-d H:i:s', strtotime($todo->updated_at));
        }
        return $todos;
    }
}