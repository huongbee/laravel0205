<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueryBuilderController extends Controller
{
    function index(){
        // SELECT * FROM users
        // $data = DB::table('users')
        //          ->get(); // [ {}, {}, ... ]
        // foreach($data as $user){
        //     echo '<li>'.$user->username.'</li>';
        // }

        // SELECT username, password 
        // FROM users
        // WHERE id=5
        // $data = DB::table('users')
        //         ->select('username', 'password')
        //         ->where('id',5)
        //         ->first(); // return only 1 {}
        // echo $data->username;
        // dd($data);

        // // SELECT username, password 
        // // FROM users
        // // WHERE id <= 5
        // $data = DB::table('users')
        //         ->select('id', 'username', 'password')
        //         ->where('id', '<=', 5)
        //         ->get(); 
        // dd($data);

        // SELECT id, name, price
        // FROM products
        // WHERE id IN (5,6,1,77)
        // $data = DB::table('products')
        //         ->select('id', 'name', 'price')
        //         ->whereIn('id', [5,6,1,77])
        //         ->get(); 

        // SELECT id, name, price
        // FROM products
        // WHERE name LIKE '%Macbook Pro%'
        // $data = DB::table('products')
        //         ->select('id', 'name', 'price')
        //         ->where('name', 'like', '%Macbook Pro%')
        //         ->get(); 

        // SELECT id, name, price
        // FROM products
        // WHERE price >= 20000000 AND new = 1
        // c1
        // $data = DB::table('products')
        //     ->select('id', 'name', 'price')
        //     ->where([
        //         ['price', '>=', 20000000],
        //         ['new', '=', 1]
        //     ])->get(); 
        // c2
        $data = DB::table('products')
            ->select('id', 'name', 'price')
            ->where('price', '>=', 20000000)
            ->where('new', '=', 1)
            ->get();
        dd($data);
    }
}
