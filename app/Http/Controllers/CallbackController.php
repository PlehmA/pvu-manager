<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function index(Request $request)
    {
        return $request->all();
    }
}
