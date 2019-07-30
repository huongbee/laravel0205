<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use Illuminate\Support\Facades\DB;
use DB as Database;

class ModelController extends Controller
{
    function index()
    {
        // select * from `users`
        // $data = User::all(); // [ {}, {}, ... ]
        // foreach ($data as $user) {
        //     echo '<li>' . $user->username . '</li>';
        // }

        // select id, email, username  from `users` WHERE username = 'manager01'
        $data = Database::table('user')
            ->select('id', 'email', 'username')
            ->where('username', 'manager01')
            ->first();
        $data02 = User::select('id', 'email', 'username')
            ->where('username', 'manager01')
            ->first();

        dd($data02);
    }
}
