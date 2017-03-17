<?php
/**
 * Created by PhpStorm.
 * User: egbrites
 * Date: 17/03/17
 * Time: 02:52
 */

namespace App\OAuth2;


use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}