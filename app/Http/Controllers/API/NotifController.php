<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifController extends Controller
{


    public function push()
    {
        $notification = [
            'title' => 'Coba Notifications',
            'body' => 'Aku mau cokelatos....',
            'sound' => true,
        ];

        $tokens = [];

        $fields = [
            'registration_ids' => $tokens,
            'notification' => $notification,
            'priority' => 'high',
            'time_to_live' => 86400,
        ];

        $headers = [
            'Authorization: key=' . ''
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);

        if (isset($response['error'])) {
            echo 'Error: ' . $response['error'];
        } else {
            echo 'Success: ' . $result;
        }
    }
}
