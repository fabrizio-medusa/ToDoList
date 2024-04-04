<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Article;

class LogicBase extends Controller
{
    public function home ()
    {
    $title = 'Medusa Blog';
    return view('auth.login', compact('title'));
    }

    public function about_us ()
    {
    $title = 'Chi Sono';
    $description = 'Ciao sono Fabrizio Medusa e sono un Full Stack Developer';
    return view('chi-sono',['title' => $title, 'descr' => $description]);
    }


}
