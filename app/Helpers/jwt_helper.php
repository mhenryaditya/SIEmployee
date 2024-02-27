<?php

use App\Models\AuthModel;
use Firebase\JWT\JWT;

function getJWT($auth)
{
    if (is_null($auth)) {
        throw new Exception('Failed Authentication!');
    }

    return explode(' ', $auth)[1];
}

function validateJWT($encode)
{
    $key = getenv('JWT_SECRET_KEY');
    $decode = JWT::decode($encode, $key, ['HS256']);
    $model = new AuthModel();

}