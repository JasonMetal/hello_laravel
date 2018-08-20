<?php

//开发者可以利用命名空间来区分归类不同的代码功能，避免引起变量名或函数名的冲突。
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    //
    public function home()
    {
//        return '主页';
        $feed_items=[];
        if (Auth::check()){
            $feed_items=Auth::user()->feed()->paginate(30);
        }
        return view('static_pages/home',compact('feed_items'));

    }

    public function help()
    {
        return view('static_pages/help');

    }

    public function about()
    {
        return view('static_pages/about');

    }

}
