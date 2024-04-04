<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function form()
    {

        return view('pages.contatti');

    }

    public function send(Request $request)
    {
        \Illuminate\Support\Facades\Mail::to('admin@example.com')
        ->send(new \App\Mail\Contact($request->name, $request->email, $request->message));
        return redirect()->back()->with(['success' => 'Messaggio inviato con successo!']);
    }
    
}
