<?php  

    namespace App\Helpers;

    class ApiFormatter
    {
        protected static $response = [
            'data' => null,
            'code' => null,
            'message' => null
        ];

        public static function createdApi($code = null , $message=null , $data=null){
            self::$response['data'] = $data;
            self::$response['code'] = $code;
            self::$response['message'] = $message;

            return response()->json(self::$response,self::$response['code']);
        }
    }
