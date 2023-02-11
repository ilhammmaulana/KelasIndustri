<?php

namespace App\Repository;

use App\Models\Todo;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Auth;

class TodoRepository
{
    use ResponseApi;
    public static function findTodo($id)
    {
        $data = Todo::find($id);
        if (!$data || $data->created_by !== Auth::user()->id) {
            return ResponseApi::requestNotFound('Not Found');
        }
        return ResponseApi::requestSuccessData('Success!', $data);
    }
    public static function getAllTodoByUserId($idUser)
    {
        $data = Todo::where('created_by', $idUser)->get();
        return $data;
    }
    public static function createTodo($data)
    {
        Todo::create($data);
        return ResponseApi::requestSuccess('Success');
    }
    public static function updateTodo($id)
    {
        global $request;
        $input = $request->only('title', 'description');
        $todo = Todo::find($id);
        if (!$todo || $todo->created_by !== Auth::user()->id) {
            return ResponseAPI::requestNotFound("Not Found!");
        }
        $todo->title = $input['title'];
        $todo->description = $input['description'];
        $todo->save();
        return ResponseAPI::requestSuccess('Success!, todos updated');
    }
    public static function deleteTodo($id)
    {
        $todo = Todo::find($id);
        if (!$todo || $todo->created_by !== Auth::user()->id) {
            return ResponseAPI::requestNotFound("Not Found!");
        }
        $todo->delete();
        return ResponseApi::requestSuccess('Success Deleted');
    }
}
