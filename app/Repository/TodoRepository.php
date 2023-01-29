<?php
namespace App\Repository;

use App\Models\Todo;
use App\Traits\ResponseApi;

class TodoRepository {
    use ResponseApi;
    public static function findTodo($id)
    {
        $data = Todo::find($id);
        if(!$data){
            return ResponseApi::requestNotFound('Not Found');
        }
        return ResponseApi::requestSuccessData('Success!', $data);
    } 
    public static function getAll()
    {
        $data = Todo::get();
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
        if(!$todo){
            return ResponseAPI::requestNotFound("Failed!",["msg" => "Todo not found", "params" => "id"]);
        }
        $todo->title = $input['title'];
        $todo->description = $input['description'];
        $todo->save();
        return ResponseAPI::requestSuccess('Success!, todos updated');
    }
    public static function deleteTodo($id)
    {
     $todo = Todo::find($id);
     if(!$todo){
        return ResponseApi::requestNotFound('Not Found');
     }   
     $todo->delete();
     return ResponseApi::requestSuccess('Success Deleted');
    }
}
