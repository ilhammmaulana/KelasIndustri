<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\TodoRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Validator;
use App\Service\TodoService;

class TodosController extends Controller
{
    use ResponseApi;

    public function getAllTodos()
    {
        $todos = TodoService::getaLL();
        return $this->requestSuccessData('Success!', $todos);
    }
    public function create(Request $request)
    {
        $user = Auth::user();
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validated->fails()) {
            return $this->responseValidation('Failed!', $validated->errors());
        }

        return TodoRepository::createTodo([
            "title" => $request->title,
            "description" => $request->description,
            "created_by" => $user->id,
        ]);
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->responseValidation('Failed!', $validation->errors());
        }

        return TodoRepository::updateTodo($id);
    }
    public function delete($id)
    {
        return TodoRepository::deleteTodo($id);
    }
}
