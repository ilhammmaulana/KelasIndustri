<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\UserRepository;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    use ResponseApi;
    public function getAllUser()
    {
        return UserRepository::get();
    }
    public function delete($id)
    {
     return UserRepository::deleteUser($id);
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);
        
        if($validation->fails()){
            return $this->badRequest('Failed!', $validation->errors());
        }
        
        $user = User::find($id);
        if(!$user){
            return $this->requestNotFound("Not Found!",["msg" => "user not found", "params" => "id"]);
        }
        // Validation when user doesnt have photo
        try {
            if($user->photo !== null && $request->file('photo')){
                Storage::delete("/photos/" . $user->photo);
                $file = $request->file('photo');
                $path = Storage::disk('public')->put('photos', $file);
                $getImageRandomName = pathinfo($path)["basename"];
                $url = url('public/'. $path);
                $user->url_photo = $url;
                $user->photo = $getImageRandomName;

            }
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();
            return $this->requestSuccess('Success updated user!');  
        } catch (\Throwable $th) {
            return $this->badRequest('Failed!', $th);
        }
    }
}
