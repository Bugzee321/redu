<?php

namespace App\Http\Controllers;

use App\Models\Pin;

class PinsController extends Controller
{
    public function index()
    {
        $pin = Pin::generate();
        return view('welcome')->with([
            'random' => $pin
        ]);
    }
}
