<?php

namespace App\Http\Controllers;


use DefStudio\Telegraph\Models\TelegraphChat;
use Http;

class HomeController extends Controller
{

    public function page()
    {
        $countUsers = TelegraphChat::where('name' , 'NOT LIKE', '%[group]%')->count();
        $chat = TelegraphChat::find(1);

        $chat->html()->send();
        return view('home.index', [
            'countUsers' => $countUsers,
        ]);
    }
}
