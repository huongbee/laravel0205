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

        $rules = [
            'email' => 'required|email|min:6',
            'password' => 'required|min:6',
            'repassword' => 'same:password',
            'fullname' => 'required|min:10|max:100',
            'age' => 'numeric|min:18|max:100'
        ];
        $mess = [
            'repassword.same' => 'Password và repassword phải giống nhau.',
            'age.min' => 'Tuổi phải lớn hơn hoặc bằng :min'
        ];
        $check = Validator::make($req->all(),$rules,$mess);
        if($check->fails()){
            // return redirect()->back()
            // ->withErrors($check);
            return redirect()->route('get-user-register')
            ->withErrors($check)
            ->withInput($req->all());

        }
        dd($req->all());
    }
    function getUpload(){
        return view('upload-file');
    }
    function postUpload(Request $req){
        if($req->hasFile('avatar')){
            $file = $req->file('avatar');
            // dd($file);
            $check = Validator::make($req->all(),[
                'avatar' => 'file|max:200|mimes:jpeg,png,gif' 
            ]);
            if($check->fails()){
                return redirect()->back()
                ->withErrors($check);
            }
            else{
                // $sizeMax = $file->getMaxFilesize();  // 2mb
                $size = $file->getClientSize();
                if($size> 200*1024){
                    return redirect()->back()
                            ->with('error','Upload Fail!');
                }
                // dd($size);
                // $mimetype = $file->getClientMimeType(); 

                $name = str_random().'-'.$file->getClientOriginalName();
                $f = $file->move('images/users', $name );
                if($f){ // success
                    return redirect()->back()
                            ->with('success','Upload success!');
                }
            }
            /**
             * check file size <= 200 kb
             * check file type (png, gif, jpeg)
             * rename file
             */
            

        }
        else echo 'Vui long chon file';
    }
}
