<?php

namespace App\Http\Controllers;

use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocterController extends Controller
{
    use ResponseAPI;
    protected function guard()
    {
        return Auth::guard('docter');
    }
}