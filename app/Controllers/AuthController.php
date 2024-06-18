<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Middleware\Middleware;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        Middleware::forGuest();
        $this->view('auth/signin');
    }

    public function auth($data)
    {
        Middleware::forGuest();
        session_start();
        $user = (new User())->auth($data);
        if (!$user) {
            $_SESSION['error'] = [
                'title' => "Invalid credential.",
                'message' => "The credential that you have provided didn't match any data in our system."
            ];
            return header('Location: /auth/signin');
        }
        $_SESSION['id']         = $user->id;
        $_SESSION['username']   = $user->username;

        return header('Location: /');
    }

    public function logout()
    {
        Middleware::forAuth();
        session_start();
        session_destroy();
        header('Location: /auth/signin');
    }
}
