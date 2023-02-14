<?php

namespace App\Libraries\Api\Helpers\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class GenerateToken
{

    /**
     * Generates JWT for API auth
     *
     * @return mixed
     */
    public static function generate_jwt($user)
    {
        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;

        $payload = array(
            "iss" => $user->id,
            "aud" => $user->role,
            "sub" => json_encode($user),
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => 'test@test.com',
        );

        $token = JWT::encode($payload, $key, 'HS256');

        return $token;
    }

    /**
     * Decode JWT to get the loggedin user details
     *
     * @return mixed
     */
    public static function decode_jwt($token)
    {
        try{
            $key = getenv('JWT_SECRET');
            $token = str_replace('Bearer ','',$token);
            $decoded = JWT::decode($token,new Key($key, 'HS256'));
            return $decoded;

        }catch(Exception $ex){
            return false;
        }
    }

}