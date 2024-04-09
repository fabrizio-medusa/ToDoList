<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Article;

class LogicBase extends Controller
{
    public function home ()
    {
    return view('auth.login');
    }

}
