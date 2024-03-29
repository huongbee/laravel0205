<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueryBuilderController extends Controller
{
    function index()
    {
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

        // $data = DB::table('products as p')
        //         ->select('p.name as pname', 'c.name as cname')
        //         ->join('categories as c','p.id_type','=','c.id')
        //         ->get();

        // $data = DB::table('products')
        //     ->select('name', 'price', 'image')
        // ->whereIn('name', [
        //     'iPhone X 256GB',
        //     'iPhone 8 Plus 256GB',
        //     'iPhone 7 Plus 32GB'
        // ])->get();
        // $data = DB::table('products')
        //     ->select('name', 'price', 'image')
        //     ->where('name', 'iPhone X 256GB')
        //     ->orWhere('name', 'iPhone 8 Plus 256GB')
        //     ->orWhere('name', 'iPhone 7 Plus 32GB')
        //     ->get();
        /**
         * SELECT p.name as sp, c.name as loai, c.id as idType FROM products p RIGHT JOIN `categories` c ON p.id_type = c.id WHERE c.id IN (14,15)
         */
        // $data = DB::table('products as p')
        //     ->select('p.name as tensp', 'c.name as tenloai', 'c.id as idType')
        //     ->rightJoin('categories as c', function ($q) {
        //         $q->on('c.id', '=', 'p.id_type');
        //     })
        //     ->whereIn('c.id', [14, 15])
        // ->join('categories as c', 'c.id', '=', 'p.id_type')
        // ->get();
        /**
         * select c.name as tenloai, c.id as idType, count(p.id) as tongSP from `products` as `p` inner join `categories` as `c` on `c`.`id` = `p`.`id_type` and `c`.`name` in (Phu kien, iMac) group by `c`.`name, c`.`id` having `tongSP` >= 10 order by `tongSP` asc
         */
        // $data = DB::table('products as p')
        //     ->selectRaw('c.name as tenloai, c.id as idType, count(p.id) as tongSP')
        //     ->rightJoin('categories as c', function ($q) {
        //         $q->on('c.id', '=', 'p.id_type');
        //         $q->whereIn('c.name', ['Phu kien', 'iMac']);
        //     })
        //     ->groupBy('c.name', 'c.id')
        //     ->having('tongSP', '>=', 10)
        //     ->orderBy('tongSP', 'ASC')
        //     ->get();

        $data = DB::table('products as p')
            ->join('categories as c', function ($q) {
                $q->on('c.id', '=', 'p.id_type');
            })
            ->selectRaw('c.name as tenloai, sum(p.price) as tongtien, count(p.id) as tongSP')
            ->groupBy('c.name')
            ->whereBetween('price', [50000000, 100000000])
            // ->havingRaw('sum(p.price) >= ?', [100000000])
            // ->having('tongtien', '<=', 200000000)
            ->orderBy('tongSP', 'ASC')
            ->get();
        dd($data);
    }
}
