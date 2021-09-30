<?php
namespace App\Traits;

trait SetResponse
{
    public function prepareResponse($error, $message, Array $data, Array $meta)
    {
        return [
            'error' => $error,
            'message' => $message,
            'data' => $data,
            'meta' => $meta
        ];
    }
}


//USES
// use Encrypt;
//    protected $encryptable = [
//        'name',
//        'company_code',
//        'email',
//    ];
