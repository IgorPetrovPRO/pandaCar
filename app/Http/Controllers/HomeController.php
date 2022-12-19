<?php

namespace App\Http\Controllers;


use DefStudio\Telegraph\Models\TelegraphChat;

class HomeController extends Controller
{

    public function page()
    {
        $countUsers = TelegraphChat::where('name' , 'NOT LIKE', '%[group]%')->count();
        return view('home.index', [
            'countUsers' => $countUsers,
        ]);
    }
}
