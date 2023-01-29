<?php

namespace App\Traits;
use Illuminate\Http\Response;

/**
 * Response API Ilham Maulana
 */
trait ResponseApi
{
    public static function requestSuccessData($message, $data = [], $status = 200)
    {
        return response()->json([
            "code" => $status,
            "message" => $message,
            "data" => $data, 
        ]);
    }
    public static function requestSuccess($message)
    {
        return response()->json([
            "code" => Response::HTTP_OK,
            "message" => $message,
        ]);
    }
    public static function badRequest($message = 'Failed', $error = 'bad_request')
    {
        return response()->json([
            "code" => Response::HTTP_BAD_REQUEST,
            "message" => $message,
            "errors" => $error
        ], Response::HTTP_BAD_REQUEST);
    }
    public static function requestUnauthorized($message, $errors = 'Unauthorized')
    {
        return response()->json([
            "code" =>  Response::HTTP_UNAUTHORIZED,
            "message" => $message,
            "errors" => $errors,
        ], Response::HTTP_UNAUTHORIZED);
    }
    public static function requestNotFound($message){
        return response()->json([
            "code" => Response::HTTP_NOT_FOUND,
            "message" => $message,
        ], Response::HTTP_NOT_FOUND);
    }
    public static function responseValidation($message = 'Failed!', $errors = "validation")
    {
        return response()->json([
            "code" => Response::HTTP_BAD_REQUEST,
            "message" => $message,
            "errors" => $errors
        ], Response::HTTP_BAD_REQUEST);
    }
}
