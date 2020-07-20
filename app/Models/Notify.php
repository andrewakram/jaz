<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    public static function send($tokens,$title="jaz",$ar_message,$en_message,$type=null,$order_id=null,$worker_id=null,$worker_third_id=null,$image=null,$user_id=null,$chatBody=null)
    {
        if(request()->header('lang') == "en"){
            $body_message = $en_message;
        }else{
            $body_message = $ar_message;
        }
        $body_message = "$en_message \r\n $ar_message ";
        /*$fields = array
        (
            "registration_ids" => $tokens,
            "priority" => 10,
            'data' => [
                'type' => $type,
                'title' => $title,
                'ar_message' => $ar_message,
                'en_message' => $en_message,
                'order_id' => $order_id,
                'worker_id' => $worker_id,
                'worker_third_id' => $worker_third_id,
                'image' => $image,
                'user_id' => $user_id
            ],
            'notification' => [
                'type' => $type,
                'title' => $title,
                'ar_message' => $ar_message,
                'en_message' => $en_message,
                'order_id' => $order_id,
                'worker_id' => $worker_id,
                'worker_third_id' => $worker_third_id,
                'image' => $image,
                'user_id' => $user_id
            ],
            'vibrate' => 1,
            'sound' => 1
        );*/
        $fields = array
        (
        "registration_ids" => $tokens,
        "priority" => 10,
        'data' => [
            'title' => "Jaz App",
            'ar_message' => $body_message,
            'en_message' => $body_message,
            'body' => $body_message,
            'type' => $type,
            'order_id' => $order_id,
            'worker_id' => $worker_id,
            'worker_third_id' => $worker_third_id,
            'image' => $image,
            'chat_body' =>$chatBody,
            'user_id' => $user_id,
            'sound' => 'default',
        ],
        'notification' => [
            'title' => "Jaz App",
            'ar_message' => $body_message,
            'en_message' => $body_message,
            'body' => $body_message,
            'type' => $type,
            'order_id' => $order_id,
            'worker_id' => $worker_id,
            'worker_third_id' => $worker_third_id,
            'image' => $image,
            'chat_body' =>$chatBody,
            'user_id' => $user_id,
            'sound' => 'default',
        ],
        'vibrate' => 1,
        'sound' => 1
    );

        $headers = array
        (
            'accept: application/json',
            'Content-Type: application/json',
            'Authorization: key=' .
            'AAAAcVW9Tlw:APA91bE4IEGj3V7L1C8zzExxOnaA2pTmz_F1Xqg6kOxmIaNGWLtE9QiaWn3ppXXQQkbFE9vhAla1aat0Nd9MeuOCw_FUg8Tj4OUi9OqnH9_vF94E6gQ-XBTIGgXFGP7gof0ucLmchAwS'

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        //  var_dump($result);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);

        return $result;
    }
}
