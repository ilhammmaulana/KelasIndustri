<?php

namespace App\Repository;

use App\Models\User;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Storage;

class UserRepository extends User
{
    public static function get()
    {
        $data = User::get(['id', 'name', 'email', 'photo', 'url_photo']);
        return ResponseApi::requestSuccessData('Success', $data);
    }
    public static function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return ResponseApi::requestNotFound("Not Found!", ["msg" => "user not found", "params" => "id"]);
        }
        if ($user->photo !== null) {
            Storage::delete("/photos/" . $user->photo);
        }
        $user->delete();
        return ResponseApi::requestSuccess('Success deleted user!');
    }
    // public static function updateUser($id, $data)
    // {

    //     $user = User::find($id);
    //     if(!$user){
    //         return ResponseApi::requestNotFound("Not Found!",["msg" => "user not found", "params" => "id"]);
    //     }
    //     // Validation when user doesnt have photo
    //     if($user->photo !== null){
    //         Storage::delete("/photos/" . $user->photo);
    //     }

    //     Storage::delete("/photos/" + $user->photo);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->save();
    //     return ResponseApi::requestSuccess('Success updated user!');  
    // }
}
