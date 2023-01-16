<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeOutController extends Controller
{
    public function index()
    {
        return view('timeout.index');
    }
}
