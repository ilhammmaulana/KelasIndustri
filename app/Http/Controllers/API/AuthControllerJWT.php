<?php

namespace App\Http\Controllers\API;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AuthControllerJWT extends Controller
{
    use ResponseApi;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->requestSuccessData('Success', [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
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
            $success['name'] = $user->name;
            $success['email'] = $user->email;
            $success['phone'] = $user->phone;


            return $this->requestSuccessData('Success Register!', $success, 201);
        } catch (\Throwable $errors) {
            return $this->badRequest('Failed', $errors);
        }
    }
}
