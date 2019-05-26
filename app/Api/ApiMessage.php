<?php

namespace App\Api;

class ApiMessage{

    public static function message($message, $code){
        return [
            'data' => [
                'msg' => $message,
                'code' => $code
            ]
        ];
    }

    public static function data($data, $code){
        return [
            'data' => [
                'data' => $data,
                'code' => $code
            ]
        ];
    }

}