<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    use ResponseApi;
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $auth = Auth::user();
            $result['token'] = $auth->createToken('auth_token')->plainTextToken;
            $result['email'] = $auth->eamail;
            $result['name'] = $auth->name;

            return $this->requestSuccessData('Success Login!', $result, 200);
        } else {
            return $this->requestUnauthorized('Your password or email wrong');
        }
    }
    public function register(Request $request)
    {
        $validatoion = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:1300'
        ]);
        if ($validatoion->fails()) {
            return $this->badRequest('Failed!', $validatoion->errors());
        }
        $input = $request->all();
        $file = $request->file('photo');
        $path = Storage::disk('public')->put('photos', $file);
        $input['password'] = bcrypt($input['password']);
        $getImageRandomName = pathinfo($path)["basename"];
        $url = url('public/' . $path);
        $input['url_photo'] = $url;
        $input['photo'] = $getImageRandomName;

        try {
            $user = User::create($input);
            $success['token'] = $user->createToken('auth_token')->plainTextToken;
            $success['name'] = $user->name;

            return $this->requestSuccessData('Success Register!', $success, 201);
        } catch (\Throwable $errors) {
            return $this->badRequest('Failed', $errors);
        }
    }
}
