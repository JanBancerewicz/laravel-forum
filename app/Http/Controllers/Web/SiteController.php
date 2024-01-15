<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class SiteController extends Controller
{

    // public function index(){
    //     return view('welcome');
    // }

    public function index()
    {
        $allArticles = Article::orderBy('updated_at', 'DESC')->get();

        return view('app.index', [
            'allArticles'       => $allArticles,
        ]);
    }

    public function test(){
        return "test";
    }

    public function testuser(){
        if(Auth::user() == NULL){
            return ':(';
        }
        return dd(Auth::user());
    }


    public function getall(){
        $allUsers = Article::all();
        dd( $allUsers);
    }
}
