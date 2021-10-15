<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $response = Http::withToken(Auth::user()->bearer_token)->get('https://backend-farm.plantvsundead.com/farms?limit=10&offset=0');

        return view('dashboard', [
            "plants" => $response->collect()
        ]);
    }
}
