<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
    function postRegister(Request $req){
        // echo $_POST['email'];
        // echo $req->input('email');
        // echo $req->input('username', 'no username');
        // echo $req->email;
        // dd($req->all()); // get all data input
        // dd($req->only('email', 'password'));
        // dd($req->except('email', 'password'));

        $check = Validator::make($req->all(),[
            'email' => 'required|email|min:6',
            'password' => 'required|min:6',
            'repassword' => 'same:password',
            'fullname' => 'required|min:10|max:100',
            'age' => 'numeric|min:18|max:100'
        ]);
        if($check->fails()){
            return redirect()->back()
            ->withErrors($check);
        }
        dd($req->all());



    }
}
