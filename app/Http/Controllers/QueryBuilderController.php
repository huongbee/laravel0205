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
        // $data = DB::table('products')
        //     ->select('id', 'name', 'price')
        //     ->where('price', '>=', 20000000)
        //     ->where('new', 1)
        //     ->get();

        // SELECT id, name, price
        // FROM products
        // WHERE id = 12 OR id = 10 OR id <= 2
        // ORDER BY id DESC
        // LIMIT 1,2
        // $data = DB::table('products')
        //     ->select('id', 'name', 'price')
        //     ->where('id', 12)
        //     ->orWhere('id', 10)
        //     ->orWhere('id', '<=', 2)
        //     ->orderBy('id','DESC')
        //     ->skip(1)
        //     ->take(2)
        //     // ->offset(1) //vitri
        //     // ->limit(2) // soluong
        //     ->get();
        // dd($data);

        // SELECT id, name, price
        // FROM products
        // WHERE price BETWEEN 20000000 AND 50000000 
        // $data = DB::table('products')
        //     ->select('id', 'name', 'price')
        //     ->whereBetween('price', [20000000, 50000000])
        //     ->get();
        // dd($data);

        // SELECT id, name, price
        // FROM products
        // WHERE promotion IS NULL
        // $data = DB::table('products')
        //     ->select('id', 'name', 'price')
        //     ->where('promotion', '=', null)
        //     ->get();
        // $data = DB::table('products')
        //     ->select('id', 'name', 'price')
        //     ->whereNull('promotion')
        //     ->get();
        // $data = DB::table('products')
        //     ->select('id', 'name', 'update_at')
        //     // ->whereDay('update_at',5)
        //     ->whereDate('update_at','2018-09-04')
        //     ->get();

        // $data = DB::table('products')
        //     ->select('id', 'price', 'promotion_price')
        //     ->whereColumn('price','<>','promotion_price')
        //     ->get();
        // dd($data);

        // SELECT id, name, price
        // FROM products
        // WHERE price < 10000000 
        //      AND (id_type = 6 OR id <= 2)
        // $data = DB::table('products')
        //     ->select('id', 'price', 'promotion_price')
        //     ->where('price', '<', 10000000 )
        //     ->where(function($q){
        //         $q->where('id_type', 6)
        //         ->orWhere('id', '<=', 2);
        //     })
        //     ->get(); 

        // $data = DB::table('products')
        //     ->selectRaw("avg(price) as tb")
        //     ->first(); 
        // dd($data);  

        // $sql = "SELECT * FROM users";
        // $data = DB::select($sql); 
        // dd($data);

        // SELECT p.name as pname , c.name as cname
        // FROM products p
        // INNER JOIN categories c
        // ON p.id_type = c.id

        $data = DB::table('products as p')
                ->select('p.name as pname', 'c.name as cname')
                ->join('categories as c','p.id_type','=','c.id')
                ->get();
        dd($data);
    }
}
