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
}
