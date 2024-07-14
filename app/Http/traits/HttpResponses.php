<?php

namespace App\Traits;

trait HttpResponses
{


    function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'successful request',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    function error($data, $message = null, $code)
    {
        return response()->json([
            'status' => 'error has occurred',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}