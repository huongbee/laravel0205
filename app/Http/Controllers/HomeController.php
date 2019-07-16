<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function getDetail($id, $alias){
        echo $id;
        echo '----';
        echo $alias;
    }
    function listProduct($p=1){
        echo $p;
    }
    function testName($page){
        // header('location: ....');

        // return redirect()->route('list-product',['page'=>$page]);
        return redirect("list/$page");
    }
    function index(){
        $arr = ['Iphone', 'Samsung', 'Oppo'];
        $name = 'Huong';
        return view('product.list', [
            'arrName'=>$arr,
            'myName'=>$name
        ]);
    }
    function add(){
        $arr = ['Iphone', 'Samsung', 'Oppo'];
        $name = 'Huong';
        return view('product/add', compact('arr','name'));
    }
    function getRegister(){
        return view('user.register');
    }
}
