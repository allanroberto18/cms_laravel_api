<?php

namespace App\Http\Controllers;

class TokenController extends Controller
{
    public function getToken()
    {
        return csrf_token();
    }
}
